<?php

?>

@extends('layout.app')

@section('title','Selamat Datang di Apotek Sehat Diponegoro')

@section('content')
    <div class="container-fluid bg-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold text-primary">Selamat Datang di Apotek Sehat Diponegoro</h1>
            <p class="lead text-muted">Solusi kesehatan terpercaya untuk Anda dan keluarga.</p>
            <a href="#" class="btn btn-primary btn-lg mt-3">Lihat Semua Obat</a>
        </div>
    </div>
<div class="container my-5">
        <h2 class="text-center mb-4 fw-bold">Produk Terlaris</h2>
        <div class="row">
            {{-- Loop untuk menampilkan data obat dari controller --}}
            @forelse ($obats as $obat)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3">
                        <img src="{{ $obat['gambar'] }}" class="card-img-top" alt="{{ $obat['nama'] }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $obat['nama'] }}</h5>
                            <p class="card-text text-muted flex-grow-1">{{ $obat['deskripsi'] }}</p>
                            <h4 class="text-primary fw-bold">Rp {{ number_format($obat['harga'], 0, ',', '.') }}</h4>
                            <a href="#" class="btn btn-outline-primary mt-3">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Pesan jika tidak ada data obat --}}
                <div class="col-12">
                    <p class="text-center text-muted">Saat ini belum ada produk terlaris.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
