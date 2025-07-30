<?php

?>
@extends('layout.admin')
@section('title', 'Edit Data Supplier')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Data: {{ $supplier->NmSuplier }}</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.supplier.update', $supplier) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3"><label for="KdSuplier" class="form-label">Kode Supplier</label><input type="text" id="KdSuplier" class="form-control" value="{{ $supplier->KdSuplier }}" disabled></div>
                <div class="mb-3"><label for="NmSuplier" class="form-label">Nama Supplier</label><input type="text" id="NmSuplier" class="form-control" value="{{ $supplier->NmSuplier }}" disabled></div>
                <div class="mb-3"><label for="Alamat" class="form-label">Alamat</label><textarea name="Alamat" id="Alamat" class="form-control" required>{{ $supplier->Alamat }}</textarea></div>
                <div class="mb-3"><label for="Kota" class="form-label">Kota</label><input type="text" name="Kota" id="Kota" class="form-control" value="{{ $supplier->Kota }}" required></div>
                <div class="mb-3"><label for="Telpon" class="form-label">Telepon</label><input type="text" name="Telpon" id="Telpon" class="form-control" value="{{ $supplier->Telpon }}" required></div>
                <button type="submit" class="btn btn-success">Perbarui</button>
            </form>
        </div>
    </div>
@endsection