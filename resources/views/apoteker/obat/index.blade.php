<?php
// resources/views/apoteker/obat/index.blade.php (Perbarui)
?>
@extends('layout.apoteker')
@section('title', 'Manajemen Obat')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Obat</h1>
        <a href="{{ route('apoteker.obat.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Obat Baru</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr><th>Kode</th><th>Nama Obat</th><th>Stok</th><th>Tgl Kadaluarsa</th><th>Harga Jual</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                        @forelse($obats as $obat)
                        <tr>
                            <td>{{ $obat->KdObat }}</td>
                            <td>{{ $obat->NmObat }}</td>
                            <td>{{ $obat->Stok }}</td>
                            <td>{{ $obat->tanggal_kadaluarsa ? \Carbon\Carbon::parse($obat->tanggal_kadaluarsa)->format('d M Y') : 'N/A' }}</td>
                            <td>Rp {{ number_format($obat->HargaJual, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('apoteker.obat.show', $obat) }}" class="btn btn-sm btn-info text-white">Detail</a>
                                <a href="{{ route('apoteker.obat.edit', $obat) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('apoteker.obat.destroy', $obat) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus obat ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center">Belum ada data obat.</td></tr>
                        @endforelse
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