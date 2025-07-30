<?php
?>
@extends('layout.admin')
@section('title', 'Riwayat Penjualan')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Riwayat Penjualan</h1>
    <div class="card shadow mb-4">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                @foreach(['belum_diproses', 'diproses', 'dikirim', 'diterima', 'dibatalkan'] as $s)
                <li class="nav-item">
                    <a class="nav-link {{ $status == $s ? 'active' : '' }}" href="{{ route('admin.penjualan.index', ['status' => $s]) }}">{{ ucfirst(str_replace('_', ' ', $s)) }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead><tr><th>Nota</th><th>Pelanggan</th><th>Tanggal</th><th>Total Harga</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @forelse($penjualans as $penjualan)
                        <tr>
                            <td>{{ $penjualan->Nota }}</td>
                            <td>{{ $penjualan->pelanggan->NmPelanggan ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($penjualan->TglNota)->format('d F Y') }}</td>
                            <td>Rp {{ number_format($penjualan->detail_transaksis->sum(function($d){ return $d->Jumlah * $d->obat->HargaJual; }), 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('admin.penjualan.show', $penjualan) }}" class="btn btn-sm btn-info text-white">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center">Tidak ada data penjualan dengan status ini.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $penjualans->links() }}
            </div>
        </div>
    </div>
@endsection