<?php

?>
@extends('layout.app')

@section('title', 'Daftar Akun Baru')

@section('content')
<div class="container px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Bergabung dengan Apotek Sehat</h1>
            <p class="col-lg-10 fs-4">Buat akun baru untuk mulai berbelanja, melihat riwayat pesanan, dan menikmati layanan kami sepenuhnya.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <div class="card shadow-sm">
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" action="{{ route('register') }}">
                    @csrf
                     @if ($errors->any())
                    <div class="alert alert-danger pb-0"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                    @endif
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                        <label for="name">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="nama@contoh.com" required>
                        <label for="email">Alamat Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                     <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                        <label for="password_confirmation">Konfirmasi Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-success" type="submit">Daftar Sekarang</button>
                    <hr class="my-4">
                    <small class="text-muted">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>.</small>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
