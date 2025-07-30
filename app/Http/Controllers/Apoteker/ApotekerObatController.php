<?php

namespace App\Http\Controllers\Apoteker;

use App\Models\Obat;
use App\Models\Suplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApotekerObatController extends Controller
{
    public function index() {
        $obats = Obat::latest('created_at')->paginate(10);
        return view('apoteker.obat.index', compact('obats'));
    }

    public function create() {
        $supliers = Suplier::all();
        // Logika untuk membuat kode obat otomatis
        $latestObat = Obat::orderBy('KdObat', 'desc')->first();
        $newKode = 'OB001';
        if ($latestObat) {
            $lastNumber = (int) substr($latestObat->KdObat, 2);
            $newNumber = $lastNumber + 1;
            $newKode = 'OB' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        }
        return view('apoteker.obat.create', compact('supliers', 'newKode'));
    }

    public function store(Request $request) {
        $request->validate([
            'NmObat' => ['required', 'string', 'max:255'],
            'Jenis' => ['required', 'string', 'max:100'],
            'Satuan' => ['required', 'string', 'max:100'],
            'HargaBeli' => ['required', 'numeric', 'min:0'],
            'HargaJual' => ['required', 'numeric', 'min:0'],
            'Stok' => ['required', 'integer', 'min:0'],
            'tanggal_kadaluarsa' => ['nullable', 'date'],
            'KdSuplier' => ['required', 'exists:supliers,KdSuplier'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $latestObat = Obat::orderBy('KdObat', 'desc')->first();
        $newKode = 'OB001';
        if ($latestObat) {
            $lastNumber = (int) substr($latestObat->KdObat, 2);
            $newNumber = $lastNumber + 1;
            $newKode = 'OB' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        }

        $data = $request->all();
        $data['KdObat'] = $newKode;

        Obat::create($data);
        return redirect()->route('apoteker.obat.index')->with('success', 'Obat baru berhasil ditambahkan.');
    }

    public function show(Obat $obat) {
        return view('apoteker.obat.show', compact('obat'));
    }

    public function edit(Obat $obat) {
        return view('apoteker.obat.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat) {
        $request->validate([
            'NmObat' => ['required', 'string', 'max:255'],
            'Jenis' => ['required', 'string', 'max:100'],
            'Stok' => ['required', 'integer', 'min:0'],
            'HargaJual' => ['required', 'numeric', 'min:0'],
            'tanggal_kadaluarsa' => ['nullable', 'date'],
        ]);

        $obat->update($request->only(['NmObat', 'Jenis', 'Stok', 'HargaJual', 'tanggal_kadaluarsa']));
        return redirect()->route('apoteker.obat.index')->with('success', 'Data obat berhasil diperbarui.');
    }

    public function destroy(Obat $obat) {
        if ($obat->penjualanDetails()->exists()) {
            return redirect()->route('apoteker.obat.index')->with('error', 'Gagal menghapus! Obat ini sudah tercatat dalam transaksi penjualan.');
        }
        $obat->delete();
        return redirect()->route('apoteker.obat.index')->with('success', 'Data obat berhasil dihapus.');
    }
}
