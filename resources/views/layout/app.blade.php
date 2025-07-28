<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Apotek Sehat')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Vite untuk CSS dan JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('welcome') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-inline-block align-text-top me-2"><path d="M14.5 2.5a2.5 2.5 0 0 0-5 0v.59a2.5 2.5 0 0 0 5 0V2.5Z"/><path d="M12 22v-7"/><path d="M9.5 7.5a2.5 2.5 0 0 1 5 0v.59a2.5 2.5 0 0 1-5 0V7.5Z"/><path d="M12 15h.01"/><path d="M4.2 8.5 12 15l7.8-6.5"/></svg>
                Apotek Sehat Diponegoro
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Katalog Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light ms-lg-2" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-light text-primary ms-lg-2 mt-2 mt-lg-0" href="{{ route('register') }}">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->
    <main>
        @yield('content')
    </main>
    <!-- Footer -->
    <footer class="bg-white text-center text-lg-start mt-5 border-top">
        <div class="container p-4">
            <p class="text-center text-muted">&copy; {{ date('Y') }} Apotek Sehat Mbak Fanny. All Rights Reserved.</p>
        </div>
    </footer>
    
</body>
</html>