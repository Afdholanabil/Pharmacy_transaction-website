<?php
// resources/views/admin/apoteker/edit.blade.php (BARU)
?>
@extends('layout.admin')
@section('title', 'Edit Data Apoteker')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Data: {{ $apoteker->name }}</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.apoteker.update', $apoteker) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3"><label for="name" class="form-label">Nama Lengkap</label><input type="text" name="name" id="name" class="form-control" value="{{ $apoteker->name }}" required></div>
                <div class="mb-3"><label for="email" class="form-label">Email</label><input type="email" name="email" id="email" class="form-control" value="{{ $apoteker->email }}" disabled></div>
                <div class="mb-3"><label for="jabatan_id" class="form-label">Jabatan</label>
                    <select name="jabatan_id" id="jabatan_id" class="form-select" required>
                        @foreach($jabatans as $jabatan)<option value="{{ $jabatan->id }}" {{ $apoteker->jabatan_id == $jabatan->id ? 'selected' : '' }}>{{ $jabatan->nama_jabatan }}</option>@endforeach
                    </select>
                </div>
                <div class="mb-3"><label for="alamat" class="form-label">Alamat</label><textarea name="alamat" id="alamat" class="form-control">{{ $apoteker->alamat }}</textarea></div>
                <button type="submit" class="btn btn-success">Perbarui</button>
            </form>
        </div>
    </div>
@endsection