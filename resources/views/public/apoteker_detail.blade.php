<?php

?>
@extends('layout.app')

@section('title', 'Profil Apoteker - ' . $user->name)

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0">
        <div class="card-body p-5">
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    <img src="{{ $user->foto_profil ? asset('storage/' . $user->foto_profil) : 'https://placehold.co/250x250/6c757d/FFFFFF?text=Foto' }}" class="img-fluid rounded-circle mb-4" style="width: 200px; height: 200px; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <h1 class="display-5 fw-bolder">{{ $user->name }}</h1>
                    <p class="lead text-muted">{{ $user->jabatan ?? 'Apoteker' }}</p>
                    <hr>
                    <p><strong>Status:</strong> <span class="status-dot {{ $user->status_aktif ? 'active' : '' }}"></span> {{ $user->status_aktif ? 'Aktif' : 'Tidak Aktif' }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Mulai Bertugas:</strong> {{ $user->tanggal_mulai_tugas ? \Carbon\Carbon::parse($user->tanggal_mulai_tugas)->format('d F Y') : 'N/A' }}</p>
                    <p><strong>Alamat:</strong> {{ $user->alamat ?? 'Informasi alamat tidak tersedia.' }}</p>
                    <p><strong>Tentang:</strong><br>
                        {{ $user->tentang ?? 'Informasi tentang apoteker tidak tersedia.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection