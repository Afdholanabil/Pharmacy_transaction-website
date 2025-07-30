<?php
// 2. Pembaruan Halaman Dashboard Pelanggan: resources/views/pelanggan/dashboard.blade.php
// UBAH baris @extends untuk menggunakan layout baru.
?>
@extends('layout.pelanggan') {{-- <-- DIUBAH KE LAYOUT BARU --}}

@section('title', 'Dashboard')
@section('title', 'Dashboard')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 fw-bold">Selamat Datang, {{ Auth::user()->name }}!</h2>
    
    <!-- Ringkasan Pesanan -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card text-white bg-primary shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Pesanan</h5>
                    <p class="display-4 fw-bold">{{ $summary['total_pesanan'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card text-dark bg-warning shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Pesanan Diproses</h5>
                    <p class="display-4 fw-bold">{{ $summary['diproses'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Navigasi -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <a href="{{ route('pelanggan.obat.list') }}" class="text-decoration-none">
                <div class="card card-hover shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <h3 class="fw-bold">Katalog Obat</h3>
                        <p class="text-muted">Lihat dan cari obat yang Anda butuhkan.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('pelanggan.keranjang.index') }}" class="text-decoration-none">
                <div class="card card-hover shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <h3 class="fw-bold">Keranjang</h3>
                        <p class="text-muted">Lihat item di keranjang belanja Anda.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('pelanggan.history.index') }}" class="text-decoration-none">
                <div class="card card-hover shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <h3 class="fw-bold">Histori Pembelian</h3>
                        <p class="text-muted">Lacak status pesanan Anda di sini.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<style>
    .card-hover:hover {
        transform: translateY(-5px);
        transition: transform 0.2s ease-in-out;
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
</style>
@endsection