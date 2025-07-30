<?php
?>
@extends('layout.app')

@section('title', 'Detail Produk - ' . $obat->NmObat)
@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0">
        <div class="card-body p-5">
            <div class="row">
                <div class="col-md-5">
                    <img src="https://placehold.co/600x400/28a745/white?text={{ urlencode($obat->NmObat) }}" class="img-fluid rounded">
                </div>
                <div class="col-md-7">
                    <h1 class="display-5 fw-bolder">{{ $obat->NmObat }}</h1>
                    <p class="lead text-muted">{{ $obat->Jenis }} - {{ $obat->Satuan }}</p>
                    <hr>
                    <h2 class="text-success fw-bold">Rp {{ number_format($obat->HargaJual, 0, ',', '.') }}</h2>
                    <p class="mt-3"><strong>Stok Tersedia:</strong> <span class="badge bg-success">{{ $obat->Stok }}</span></p>
                    <p><strong>Deskripsi:</strong><br>
                        {{ $obat->deskripsi ?? 'Deskripsi produk tidak tersedia.' }}
                    </p>
                    <div class="d-flex mt-4">
                        <form action="{{ route('pelanggan.keranjang.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="obat_id" value="{{ $obat->KdObat }}">
                            <button type="submit" class="btn btn-success btn-lg flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill me-2" viewBox="0 0 16 16"><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 4 0h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 13.5 3H-2.54l.4-1.607A.5.5 0 0 0 3 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/></svg>
                                Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection