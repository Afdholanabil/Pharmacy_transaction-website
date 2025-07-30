<?php

?>
@extends('layout.apoteker')
@section('title', 'Edit Data Obat')
@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Edit Data: {{ $obat->NmObat }}</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('apoteker.obat.update', $obat) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3"><label class="form-label">Kode Obat</label><input type="text" class="form-control" value="{{ $obat->KdObat }}" disabled></div>
                    <div class="col-md-6 mb-3"><label for="NmObat" class="form-label">Nama Obat</label><input type="text" name="NmObat" id="NmObat" class="form-control" value="{{ $obat->NmObat }}" required></div>
                    <div class="col-md-6 mb-3"><label for="Jenis" class="form-label">Jenis</label><input type="text" name="Jenis" id="Jenis" class="form-control" value="{{ $obat->Jenis }}" required></div>
                    <div class="col-md-6 mb-3"><label for="Stok" class="form-label">Stok</label><input type="number" name="Stok" id="Stok" class="form-control" value="{{ $obat->Stok }}" required></div>
                    <div class="col-md-6 mb-3"><label for="HargaJual" class="form-label">Harga Jual</label><input type="number" name="HargaJual" id="HargaJual" class="form-control" value="{{ $obat->HargaJual }}" required></div>
                    <div class="col-md-6 mb-3"><label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label><input type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" class="form-control" value="{{ $obat->tanggal_kadaluarsa }}"></div>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </form>
        </div>
    </div>
</div>
@endsection