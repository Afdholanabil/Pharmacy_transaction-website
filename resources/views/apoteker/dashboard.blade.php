<?php
// resources/views/apoteker/dashboard.blade.php
?>
@extends('layout.apoteker')
@section('title', 'Apoteker Dashboard')
@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <p class="mb-4">Selamat datang kembali, {{ Auth::user()->name }}!</p>
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="{{ route('apoteker.obat.index') }}" class="text-decoration-none">
                <div class="card text-white bg-primary shadow-sm h-100 card-hover">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-capsule-pill fs-1 mb-3 d-block"></i>
                        <h4 class="card-title">Manajemen Obat</h4>
                        <p class="card-text">Tambah, edit, dan kelola semua data obat.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="#" class="text-decoration-none">
                <div class="card text-white bg-success shadow-sm h-100 card-hover">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-cart-check-fill fs-1 mb-3 d-block"></i>
                        <h4 class="card-title">Riwayat Penjualan</h4>
                        <p class="card-text">Lihat semua transaksi penjualan yang tercatat.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="#" class="text-decoration-none">
                <div class="card text-dark bg-warning shadow-sm h-100 card-hover">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-exclamation-triangle-fill fs-1 mb-3 d-block"></i>
                        <h4 class="card-title">Stok Kritis</h4>
                        <p class="card-text">Periksa obat yang stoknya perlu segera diisi ulang.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection