<?php

?>
@extends('layout.admin')
@section('title', 'Manajemen Supplier')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Supplier</h1>
        <a href="{{ route('admin.supplier.create') }}" class="btn btn-success"><i class="bi bi-plus-circle me-2"></i>Tambah Supplier Baru</a>
    </div>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead><tr><th>Kode</th><th>Nama Supplier</th><th>Kota</th><th>Telepon</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @foreach($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->KdSuplier }}</td>
                            <td>{{ $supplier->NmSuplier }}</td>
                            <td>{{ $supplier->Kota }}</td>
                            <td>{{ $supplier->Telpon }}</td>
                            <td>
                                <a href="{{ route('admin.supplier.edit', $supplier) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.supplier.destroy', $supplier) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus supplier ini?');">
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