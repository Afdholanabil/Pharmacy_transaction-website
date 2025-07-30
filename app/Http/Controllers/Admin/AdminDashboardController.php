<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Absensi;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\PenjualanDetail;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index() {
        $penjualanHariIni = PenjualanDetail::whereDate('created_at', Carbon::today())->sum('Jumlah');
        $penjualanBulanIni = PenjualanDetail::whereMonth('created_at', Carbon::now()->month)->sum('Jumlah');
        $absensiHariIni = Absensi::with('user')->whereDate('tanggal', Carbon::today())->get();
        $penjualanBaru = Penjualan::where('status', 'belum_diproses')->latest()->take(5)->get();

        return view('admin.dashboard', compact('penjualanHariIni', 'penjualanBulanIni', 'absensiHariIni', 'penjualanBaru'));
    }
}
