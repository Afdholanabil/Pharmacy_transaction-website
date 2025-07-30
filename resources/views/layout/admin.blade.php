<?php
// 2. Layout Admin yang Diperbarui: resources/views/layouts/admin.blade.php
// Warna diubah menjadi hijau dan logout diperbaiki.
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Panel Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .main-wrapper { display: flex; min-height: 100vh; }
        .sidebar { width: 280px; background-color: #212529; }
        .content { flex: 1; padding: 30px; background-color: #f8f9fa; }
        .sidebar .nav-link { color: #adb5bd; font-size: 1rem; padding: 0.75rem 1.25rem; }
        .sidebar .nav-link:hover { color: #fff; background-color: #343a40; }
        .sidebar .nav-link.active { color: #fff; background-color: #198754; } /* Warna diubah */
        .sidebar .nav-link .bi { margin-right: 10px; }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 text-white text-decoration-none">
                <span class="fs-4">Panel Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li><a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2"></i>Dashboard</a></li>
                <li><a href="{{ route('admin.apoteker.index') }}" class="nav-link {{ request()->routeIs('admin.apoteker.*') ? 'active' : '' }}"><i class="bi bi-person-badge"></i>Manajemen Apoteker</a></li>
                <li><a href="{{ route('admin.supplier.index') }}" class="nav-link {{ request()->routeIs('admin.supplier.*') ? 'active' : '' }}"><i class="bi bi-truck"></i>Manajemen Supplier</a></li>
                <li><a href="{{ route('admin.penjualan.index') }}" class="nav-link {{ request()->routeIs('admin.penjualan.*') ? 'active' : '' }}"><i class="bi bi-cart-check"></i>Riwayat Penjualan</a></li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <strong>{{ Auth::user()->name }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="{{ route('welcome') }}">Lihat Situs Publik</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>
    <!-- Modal Notifikasi Error BARU -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="errorModalLabel"><i class="bi bi-exclamation-triangle-fill me-2"></i>Terjadi Kesalahan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="errorModalBody">
                    <!-- Pesan error akan muncul di sini -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Baik</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Skrip untuk memicu Modal Error BARU -->
    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            const errorModalBody = document.getElementById('errorModalBody');
            
            errorModalBody.textContent = "{{ session('error') }}";
            errorModal.show();
        });
    </script>
    @endif
</body>
</html>