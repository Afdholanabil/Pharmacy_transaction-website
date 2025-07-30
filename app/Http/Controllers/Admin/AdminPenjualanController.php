<?php

namespace App\Http\Controllers\Admin;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPenjualanController extends Controller
{
    public function index(Request $request) {
        $status = $request->query('status', 'belum_diproses');
        $penjualans = Penjualan::with('pelanggan', 'detail_transaksis.obat')
                                ->where('status', $status)
                                ->latest('TglNota')
                                ->paginate(10);
        return view('admin.penjualan.index', compact('penjualans', 'status'));
    }

    public function show(Penjualan $penjualan) {
        $penjualan->load('pelanggan', 'detail_transaksis.obat');
        return view('admin.penjualan.show', compact('penjualan'));
    }

    public function updateStatus(Request $request, Penjualan $penjualan) {
        $request->validate(['status' => 'required|in:diproses,dikirim,diterima,dibatalkan']);
        
        $newStatus = $request->status;
        $currentStatus = $penjualan->status;
        
        // Logika untuk mencegah loncat status
        $allowedTransitions = [
            'belum_diproses' => ['diproses', 'dibatalkan'],
            'diproses' => ['dikirim', 'dibatalkan'],
            'dikirim' => ['diterima', 'dibatalkan'],
        ];

        if (isset($allowedTransitions[$currentStatus]) && in_array($newStatus, $allowedTransitions[$currentStatus])) {
            $penjualan->status = $newStatus;
            $penjualan->save();
            return redirect()->route('admin.penjualan.show', $penjualan)->with('success', 'Status penjualan berhasil diperbarui.');
        }

        return redirect()->route('admin.penjualan.show', $penjualan)->with('error', 'Perubahan status tidak diizinkan.');
    }
}
