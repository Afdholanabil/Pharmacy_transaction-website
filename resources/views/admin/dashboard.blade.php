<?php
// resources/views/admin/dashboard.blade.php
?>
@extends('layout.admin')
@section('title', 'Admin Dashboard')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Obat Terjual (Hari Ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $penjualanHariIni }}</div>
                        </div>
                        <div class="col-auto"><i class="bi bi-calendar-day fs-2 text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Obat Terjual (Bulan Ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $penjualanBulanIni }}</div>
                        </div>
                        <div class="col-auto"><i class="bi bi-calendar-month fs-2 text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Penjualan Masuk (Belum Diproses)</h6></div>
                <div class="card-body">
                    <div class="list-group">
                        @forelse($penjualanBaru as $penjualan)
                            <a href="{{ route('admin.penjualan.show', $penjualan) }}" class="list-group-item list-group-item-action">
                                <strong>Nota: {{ $penjualan->Nota }}</strong> - {{ $penjualan->pelanggan->NmPelanggan ?? 'N/A' }}
                            </a>
                        @empty
                            <p class="text-center text-muted">Tidak ada penjualan baru.</p>
                        @endforelse
                    </div>
                    <a href="{{ route('admin.penjualan.index') }}" class="btn btn-primary btn-sm mt-3">Lihat Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">Absensi Apoteker Hari Ini</h6>
                    <a href="{{ route('admin.apoteker.index') }}" class="btn btn-sm btn-outline-success">Lihat Semua</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead><tr><th>Nama</th><th>Jabatan</th><th>Status Kehadiran</th></tr></thead>
                            <tbody>
                                @forelse($absensiHariIni as $absensi)
                                    <tr>
                                        <td>{{ $absensi->user->name }}</td>
                                        <td>{{ $absensi->user->jabatan->nama_jabatan ?? 'N/A' }}</td>
                                        <td><span class="badge bg-{{ $absensi->status == 'hadir' ? 'success' : 'warning' }}">{{ ucfirst(str_replace('_', ' ', $absensi->status)) }}</span></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="3" class="text-center text-muted">Data absensi belum tersedia.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection