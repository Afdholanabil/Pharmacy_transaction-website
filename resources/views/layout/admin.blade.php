<?php

// 1. Layout Utama untuk Admin & Apoteker: resources/views/layouts/admin.blade.php
// BUAT FILE BARU INI. Ini adalah template utama untuk semua halaman backend.
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Apotek Sehat Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        .main-wrapper {
            display: flex;
            flex: 1;
        }
        .sidebar {
            width: 280px;
            min-height: 100vh;
            position: sticky;
            top: 0;
            background-color: #212529;
        }
        .content {
            flex: 1;
            padding: 30px;
            background-color: #f8f9fa;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            font-size: 1rem;
            padding: 0.75rem 1.25rem;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: #343a40;
        }
        .sidebar .nav-link.active {
            color: #fff;
            background-color: #0d6efd;
        }
        .sidebar .nav-link .bi {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Apotek Panel</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                @if(Auth::user()->role === 'admin')
                    {{-- MENU UNTUK ADMIN --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link active"><i class="bi bi-speedometer2"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link"><i class="bi bi-person-badge"></i>Manajemen Apoteker</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link"><i class="bi bi-truck"></i>Manajemen Supplier</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link"><i class="bi bi-receipt"></i>Riwayat Pembelian</a>
                    </li>
                @elseif(Auth::user()->role === 'apoteker')
                    {{-- MENU UNTUK APOTEKER --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link active"><i class="bi bi-speedometer2"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link"><i class="bi bi-capsule-pill"></i>Manajemen Obat</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link"><i class="bi bi-cart-check"></i>Riwayat Penjualan</a>
                    </li>
                @endif
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>{{ Auth::user()->name }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>