<?php
?>
@extends('layout.pelanggan')

@section('title', 'Histori Pembelian')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 fw-bold">Histori Pembelian</h2>

    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a class="nav-link {{ $status == 'belum_diproses' ? 'active' : '' }}" href="{{ url()->current() }}?status=belum_diproses">Belum Diproses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $status == 'diproses' ? 'active' : '' }}" href="{{ url()->current() }}?status=diproses">Diproses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $status == 'dikirim' ? 'active' : '' }}" href="{{ url()->current() }}?status=dikirim">Dikirim</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $status == 'diterima' ? 'active' : '' }}" href="{{ url()->current() }}?status=diterima">Diterima</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active">
            @forelse ($history as $item)
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1">Nota: {{ $item['nota'] }}</h5>
                                <p class="card-text text-muted mb-1">Tanggal: {{ \Carbon\Carbon::parse($item['tanggal'])->format('d F Y') }}</p>
                                <p class="card-text text-muted">Jumlah Item: {{ $item['items'] }}</p>
                            </div>
                            <div class="text-end">
                                <h6 class="fw-bold">Total: Rp {{ number_format($item['total'], 0, ',', '.') }}</h6>
                                <a href="#" class="btn btn-sm btn-outline-primary mt-2">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">Tidak ada riwayat pembelian dengan status ini.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection