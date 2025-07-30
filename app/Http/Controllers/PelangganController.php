<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    public function showDashboard()
    {
        // Data dummy
        $summary = [
            'total_pesanan' => Penjualan::where('KdPelanggan', Auth::id())->count(), // Contoh
            'diproses' => Penjualan::where('KdPelanggan', Auth::id())->where('status', 'diproses')->count(),
        ];
        return view('pelanggan.dashboard', compact('summary'));
    }
    
    public function showObatList() {
        $obats = Obat::orderBy('NmObat', 'desc')->get();
        return view('pelanggan.obat.index', compact('obats'));
    }

    public function showKeranjang(){
        $keranjangItems = [
            ['id' => 1, 'nama' => 'Paracetamol 500mg', 'harga' => 8000, 'jumlah' => 2, 'gambar' => 'https://placehold.co/100x100/28a745/white?text=Obat'],
            ['id' => 2, 'nama' => 'Vitamin C 500mg', 'harga' => 25000, 'jumlah' => 1, 'gambar' => 'https://placehold.co/100x100/ffc107/white?text=Obat'],
        ];
        return view('pelanggan.keranjang.index', compact('keranjangItems'));
    }

    public function showHistory(Request $request){
        $status = $request -> query('status', 'belum_diproses');
        // Data dummy. Ganti dengan query ke database sesuai status dan user yang login.
        // $userId = auth()->id();
        // $history = Penjualan::where('user_id', $userId)->where('status', $status)->get();    
        // $history = Penjualan::where('KdPelanggan', Auth::id()) 
        //                      ->where('status', $status)
        //                      ->get();
        $allHistory = [
            'belum_diproses' => [
                ['nota' => 'INV-001', 'tanggal' => '2024-07-28', 'total' => 41000, 'items' => 2],
            ],
            'diproses' => [
                ['nota' => 'INV-002', 'tanggal' => '2024-07-27', 'total' => 50000, 'items' => 1],
            ],
            'dikirim' => [
                ['nota' => 'INV-003', 'tanggal' => '2024-07-26', 'total' => 120000, 'items' => 3],
            ],
            'diterima' => [
                ['nota' => 'INV-004', 'tanggal' => '2024-07-25', 'total' => 75000, 'items' => 1],
            ],
        ];
        $history = $allHistory[$status] ?? [];
        return view('pelanggan.history.index', compact('history', 'status'));
    }
}
