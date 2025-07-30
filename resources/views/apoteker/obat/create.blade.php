<?php

?>
@extends('layout.apoteker')
@section('title', 'Tambah Obat Baru')
@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Tambah Obat Baru</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('apoteker.obat.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3"><label for="KdObat" class="form-label">Kode Obat (Otomatis)</label><input type="text" id="KdObat" class="form-control" value="{{ $newKode }}" disabled></div>
                    <div class="col-md-6 mb-3"><label for="NmObat" class="form-label">Nama Obat</label><input type="text" name="NmObat" id="NmObat" class="form-control" required></div>
                    <div class="col-md-6 mb-3"><label for="Jenis" class="form-label">Jenis</label><input type="text" name="Jenis" id="Jenis" class="form-control" required></div>
                    <div class="col-md-6 mb-3"><label for="Satuan" class="form-label">Satuan</label><input type="text" name="Satuan" id="Satuan" class="form-control" required></div>
                    <div class="col-md-6 mb-3"><label for="HargaBeli" class="form-label">Harga Beli</label><input type="number" name="HargaBeli" id="HargaBeli" class="form-control" required></div>
                    <div class="col-md-6 mb-3"><label for="HargaJual" class="form-label">Harga Jual</label><input type="number" name="HargaJual" id="HargaJual" class="form-control" required></div>
                    <div class="col-md-6 mb-3"><label for="Stok" class="form-label">Stok</label><input type="number" name="Stok" id="Stok" class="form-control" required></div>
                    <div class="col-md-6 mb-3"><label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label><input type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" class="form-control"></div>
                    <div class="col-md-12 mb-3"><label for="KdSuplier" class="form-label">Supplier</label>
                        <select name="KdSuplier" id="KdSuplier" class="form-select" required>
                            <option value="">Pilih Supplier</option>
                            @foreach($supliers as $suplier)<option value="{{ $suplier->KdSuplier }}">{{ $suplier->NmSuplier }}</option>@endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3"><label for="deskripsi" class="form-label">Deskripsi</label><textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea></div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection