<?php

?>
@extends('layout.admin')
@section('title', 'Detail Penjualan ' . $penjualan->Nota)
@section('content')
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Penjualan: {{ $penjualan->Nota }}</h1>
        <a href="{{ route('admin.penjualan.index', ['status' => $penjualan->status]) }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header"><h6 class="m-0 font-weight-bold text-success">Item yang Dibeli</h6></div>
                <div class="card-body">
                    <table class="table">
                        <thead><tr><th>Produk</th><th>Jumlah</th><th>Harga Satuan</th><th>Subtotal</th></tr></thead>
                        <tbody>
                            @foreach($penjualan->detail_transaksis as $detail)
                            <tr>
                                <td>{{ $detail->obat->NmObat }}</td>
                                <td>{{ $detail->Jumlah }}</td>
                                <td>Rp {{ number_format($detail->obat->HargaJual, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($detail->Jumlah * $detail->obat->HargaJual, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header"><h6 class="m-0 font-weight-bold text-success">Informasi & Aksi</h6></div>
                <div class="card-body">
                    <p><strong>Pelanggan:</strong> {{ $penjualan->pelanggan->NmPelanggan ?? 'N/A' }}</p>
                    <p><strong>Tanggal Pesan:</strong> {{ \Carbon\Carbon::parse($penjualan->TglNota)->format('d F Y') }}</p>
                    <p><strong>Status Saat Ini:</strong> <span class="badge bg-primary">{{ ucfirst(str_replace('_', ' ', $penjualan->status)) }}</span></p>
                    <hr>
                    @php
                        $nextStatus = [
                            'belum_diproses' => 'diproses',
                            'diproses' => 'dikirim',
                            'dikirim' => 'diterima',
                        ];
                    @endphp
                    @if(isset($nextStatus[$penjualan->status]))
                        <form action="{{ route('admin.penjualan.updateStatus', $penjualan) }}" method="POST">
                            @csrf
                            <label class="form-label">Ubah Status:</label>
                            <div class="btn-group w-100">
                                <button type="submit" name="status" value="{{ $nextStatus[$penjualan->status] }}" class="btn btn-primary">
                                    <i class="bi bi-arrow-right-circle-fill me-2"></i> {{ ucfirst($nextStatus[$penjualan->status]) }}
                                </button>
                                <button type="submit" name="status" value="dibatalkan" class="btn btn-danger">
                                    <i class="bi bi-x-circle-fill me-2"></i> Batalkan
                                </button>
                            </div>
                        </form>
                    @else
                        <p class="text-muted">Pesanan ini sudah selesai atau dibatalkan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection