<?php
// resources/views/apoteker/obat/show.blade.php (BARU)
?>
@extends('layout.apoteker')
@section('title', 'Detail Obat')
@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Detail: {{ $obat->NmObat }}</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>Kode Obat</th><td>{{ $obat->KdObat }}</td></tr>
                <tr><th>Nama Obat</th><td>{{ $obat->NmObat }}</td></tr>
                <tr><th>Jenis</th><td>{{ $obat->Jenis }}</td></tr>
                <tr><th>Satuan</th><td>{{ $obat->Satuan }}</td></tr>
                <tr><th>Harga Beli</th><td>Rp {{ number_format($obat->HargaBeli, 0, ',', '.') }}</td></tr>
                <tr><th>Harga Jual</th><td>Rp {{ number_format($obat->HargaJual, 0, ',', '.') }}</td></tr>
                <tr><th>Stok</th><td>{{ $obat->Stok }}</td></tr>
                <tr><th>Tanggal Kadaluarsa</th><td>{{ $obat->tanggal_kadaluarsa ? \Carbon\Carbon::parse($obat->tanggal_kadaluarsa)->format('d F Y') : 'N/A' }}</td></tr>
                <tr><th>Deskripsi</th><td>{{ $obat->deskripsi ?? 'Tidak ada deskripsi.' }}</td></tr>
            </table>
            <a href="{{ route('apoteker.obat.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection