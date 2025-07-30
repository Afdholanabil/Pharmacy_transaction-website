<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index()
    {
        // Ambil 8 obat terbaru dari database
        $obats = Obat::latest()->take(8)->get();

        // Ambil semua user dengan role 'apoteker' yang aktif
        $apotekers = User::where('role', 'apoteker')->where('status_aktif', true)->get();

        return view('welcome', compact('obats', 'apotekers'));
    }
    
}
