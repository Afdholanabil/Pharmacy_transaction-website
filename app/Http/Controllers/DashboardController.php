<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $obats=[
            [
                'nama' => 'Paracetamol 500mg',
                'deskripsi' => 'Meredakan sakit kepala, sakit gigi, dan demam.',
                'harga' => 8000,
                'gambar' => 'https://placehold.co/600x400/28a745/white?text=Paracetamol'
            ],
            [
                'nama' => 'Amoxicillin 500mg',
                'deskripsi' => 'Antibiotik untuk mengatasi infeksi bakteri. Membutuhkan resep dokter.',
                'harga' => 15000,
                'gambar' => 'https://placehold.co/600x400/007bff/white?text=Amoxicillin'
            ],
            [
                'nama' => 'Vitamin C 500mg',
                'deskripsi' => 'Membantu menjaga daya tahan tubuh dan kesehatan kulit.',
                'harga' => 25000,
                'gambar' => 'https://placehold.co/600x400/ffc107/white?text=Vitamin+C'
            ],
        ];

        return view('welcome',compact('obats'));
    }
}
