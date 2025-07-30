<?php

?>
@extends('layout.app')

@section('title', 'Katalog Produk')

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bolder">Katalog Produk</h1>
        <p class="lead fw-normal text-muted">Temukan semua produk kesehatan yang Anda butuhkan di sini.</p>
    </div>
    <div class="row gx-5">
        @forelse($obats as $obat)
        <div class="col-lg-3 col-md-4 mb-5">
            <div class="card h-100 shadow border-0 card-hover">
                <img class="card-img-top" src="https://placehold.co/500x325/28a745/white?text={{ urlencode($obat->NmObat) }}" alt="{{ $obat->NmObat }}" />
                <div class="card-body p-4">
                    <a class="text-decoration-none link-dark stretched-link" href="{{ route('obat.public.show', $obat) }}">
                        <h5 class="card-title mb-3">{{ $obat->NmObat }}</h5>
                    </a>
                    <p class="card-text mb-0">Rp {{ number_format($obat->HargaJual, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center"><p class="text-muted">Belum ada produk yang tersedia.</p></div>
        @endforelse
    </div>

    <!-- Paginasi -->
    <div class="d-flex justify-content-center">
        {{ $obats->links() }}
    </div>
</div>
@endsection