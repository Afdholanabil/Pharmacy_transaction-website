<?php

?>
@extends('layout.admin')
@section('title', 'Tambah Supplier Baru')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Supplier Baru</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.supplier.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="KdSuplier" class="form-label">Kode Supplier (Otomatis)</label>
                    <input type="text" id="KdSuplier" class="form-control" value="{{ $newKodeSupplier }}" disabled>
                </div>
                <div class="mb-3"><label for="NmSuplier" class="form-label">Nama Supplier</label><input type="text" name="NmSuplier" id="NmSuplier" class="form-control" required></div>
                <div class="mb-3"><label for="Alamat" class="form-label">Alamat</label><textarea name="Alamat" id="Alamat" class="form-control" required></textarea></div>
                <div class="mb-3"><label for="Kota" class="form-label">Kota</label><input type="text" name="Kota" id="Kota" class="form-control" required></div>
                <div class="mb-3"><label for="Telpon" class="form-label">Telepon</label><input type="text" name="Telpon" id="Telpon" class="form-control" required></div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection
