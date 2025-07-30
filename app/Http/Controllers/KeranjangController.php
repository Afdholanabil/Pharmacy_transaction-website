<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
// Menampilkan halaman keranjang
    public function index()
    {
        $keranjang = session()->get('keranjang', []);
        return view('pelanggan.keranjang.index', compact('keranjang'));
    }

    // Menambah item ke keranjang
    public function add(Request $request)
    {
        $request->validate(['obat_id' => 'required|exists:obats,KdObat']);
        
        $obat = Obat::find($request->obat_id);
        $keranjang = session()->get('keranjang', []);

        // Jika obat sudah ada di keranjang, tambahkan jumlahnya
        if(isset($keranjang[$obat->KdObat])) {
            $keranjang[$obat->KdObat]['jumlah']++;
        } else {
            // Jika belum ada, tambahkan sebagai item baru
            $keranjang[$obat->KdObat] = [
                "nama" => $obat->NmObat,
                "jumlah" => 1,
                "harga" => $obat->HargaJual,
                "gambar" => "https://placehold.co/100x100/28a745/white?text=Obat" // Ganti dengan path gambar jika ada
            ];
        }

        session()->put('keranjang', $keranjang);
        return redirect()->route('pelanggan.keranjang.index')->with('success', 'Obat berhasil ditambahkan!');
    }
    public function update(Request $request)
    {
        $request->validate([
            'obat_id' => 'required',
            'jumlah' => 'required|integer|min:1'
        ]);

        $keranjang = session()->get('keranjang');

        if(isset($keranjang[$request->obat_id])) {
            $keranjang[$request->obat_id]['jumlah'] = $request->jumlah;
            session()->put('keranjang', $keranjang);
            return redirect()->back()->with('success', 'Jumlah obat berhasil diperbarui!');
        }
        return redirect()->back()->with('error', 'Obat tidak ditemukan di keranjang.');
    }

    // Menghapus item dari keranjang
    public function remove(Request $request)
    {
        $request->validate(['obat_id' => 'required']);

        $keranjang = session()->get('keranjang');
        if(isset($keranjang[$request->obat_id])) {
            unset($keranjang[$request->obat_id]);
            session()->put('keranjang', $keranjang);
        }

        return redirect()->back()->with('success', 'Obat berhasil dihapus dari keranjang!');
    }
}
