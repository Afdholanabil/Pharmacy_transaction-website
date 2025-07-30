<?php
// resources/views/admin/apoteker/create.blade.php (BARU)
?>
@extends('layout.admin')
@section('title', 'Tambah Apoteker Baru')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Apoteker Baru</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.apoteker.store') }}" method="POST">
                @csrf
                <div class="mb-3"><label for="name" class="form-label">Nama Lengkap</label><input type="text" name="name" id="name" class="form-control" required></div>
                <div class="mb-3"><label for="email" class="form-label">Email</label><input type="email" name="email" id="email" class="form-control" required></div>
                <div class="mb-3"><label for="jabatan_id" class="form-label">Jabatan</label>
                    <select name="jabatan_id" id="jabatan_id" class="form-select" required>
                        @foreach($jabatans as $jabatan)<option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>@endforeach
                    </select>
                </div>
                <div class="mb-3"><label for="alamat" class="form-label">Alamat</label><textarea name="alamat" id="alamat" class="form-control"></textarea></div>
                <div class="mb-3"><label for="password" class="form-label">Password</label><input type="password" name="password" id="password" class="form-control" required></div>
                <div class="mb-3"><label for="password_confirmation" class="form-label">Konfirmasi Password</label><input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required></div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection