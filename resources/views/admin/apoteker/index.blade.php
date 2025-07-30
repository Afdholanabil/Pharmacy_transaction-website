<?php
// resources/views/admin/apoteker/index.blade.php
?>
@extends('layout.admin')
@section('title', 'Manajemen Apoteker')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Apoteker</h1>
        <a href="{{ route('admin.apoteker.create') }}" class="btn btn-success"><i class="bi bi-plus-circle me-2"></i>Tambah Apoteker Baru</a>
    </div>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead><tr><th>Nama</th><th>Jabatan</th><th>Status Aktif</th><th>Absensi Hari Ini</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @foreach($apotekers as $apoteker)
                        <tr>
                            <td>{{ $apoteker->name }}</td>
                            <td>{{ $apoteker->jabatan->nama_jabatan ?? 'N/A' }}</td>
                            <td><span class="badge bg-{{ $apoteker->status_aktif ? 'success' : 'secondary' }}">{{ $apoteker->status_aktif ? 'Aktif' : 'Non-Aktif' }}</span></td>
                            <td>
                                @if($apoteker->absensiHariIni)
                                    <span class="badge bg-{{ $apoteker->absensiHariIni->status == 'hadir' ? 'success' : 'warning' }}">{{ ucfirst(str_replace('_', ' ', $apoteker->absensiHariIni->status)) }}</span>
                                @else
                                    <span class="badge bg-secondary">Belum ada data</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.apoteker.edit', $apoteker) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.apoteker.destroy', $apoteker) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus apoteker ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection