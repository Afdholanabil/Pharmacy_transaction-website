<?php
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard Pelanggan') - Apotek Sehat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> body { background-color: #f8f9fa; } </style>
</head>
<body>
    
    <!-- Navbar KHUSUS Pelanggan -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('welcome') }}">Apotek Sehat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#pelangganNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="pelangganNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('pelanggan.dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pelanggan.obat.list') }}">Katalog Obat</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pelanggan.keranjang.index') }}">Keranjang</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pelanggan.history.index') }}">Histori</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profil Saya</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Toast Notification Container (DIPINDAHKAN KE SINI) -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11">
      <div id="notificationToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
          <strong class="me-auto">Sukses</strong>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          {{-- Pesan notifikasi akan muncul di sini --}}
        </div>
      </div>
    </div>

    <!-- Skrip untuk memicu Toast Notification (DIPINDAHKAN KE SINI) -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            const toastElement = document.getElementById('notificationToast');
            if (toastElement) {
                const toastBody = toastElement.querySelector('.toast-body');
                toastBody.textContent = "{{ session('success') }}";
                
                const toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        @endif
    });
    </script>
</body>
</html>