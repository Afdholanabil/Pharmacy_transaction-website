<?php
// resources/views/apoteker/obat/index.blade.php
?>
@extends('layout.apoteker')
@section('title', 'Manajemen Obat')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Obat</h1>
        <a href="#" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Obat Baru</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Obat</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            <th>Harga Jual</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obats as $obat)
                        <tr>
                            <td>{{ $obat->KdObat }}</td>
                            <td>{{ $obat->NmObat }}</td>
                            <td>{{ $obat->Jenis }}</td>
                            <td>{{ $obat->Stok }}</td>
                            <td>Rp {{ number_format($obat->HargaJual, 0, ',', '.') }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info text-white">Detail</a>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $obats->links() }}
            </div>
        </div>
    </div>
</div>
@endsection