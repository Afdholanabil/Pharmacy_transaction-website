<?php
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Apotek Sehat')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        html, body { height: 100%; }
        body { display: flex; flex-direction: column; }
        main { flex: 1 0 auto; }
        footer { flex-shrink: 0; }
        #scrollToTopBtn { display: none; position: fixed; bottom: 20px; right: 30px; z-index: 99; border: none; outline: none; background-color: #198754; color: white; cursor: pointer; padding: 10px 15px; border-radius: 50%; font-size: 18px; transition: opacity 0.3s, visibility 0.3s; box-shadow: 0 2px 5px rgba(0,0,0,0.3); }
        #scrollToTopBtn:hover { background-color: #157347; }
        .status-dot { height: 10px; width: 10px; background-color: #6c757d; border-radius: 50%; display: inline-block; margin-right: 8px; }
        .status-dot.active { background-color: #198754; }
        .card-hover:hover { transform: translateY(-5px); transition: transform 0.2s ease-in-out; box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
        
        .apoteker-carousel-container {
            position: relative;
            padding: 0 60px; 
        }
        .apoteker-carousel .swiper-slide {
            transition: transform 0.4s ease, opacity 0.4s ease;
        }
        .swiper-button-next, .swiper-button-prev {
            background-color: white;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
            color: #198754 !important;
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .swiper-button-next:hover, .swiper-button-prev:hover {
            background-color: #198754;
            color: white !important;
        }
        .swiper-button-next::after, .swiper-button-prev::after {
            font-size: 20px !important;
            font-weight: bold;
        }
        .swiper-button-disabled {
            opacity: 0.35 !important;
            cursor: auto !important;
            pointer-events: none !important;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="{{ route('welcome') }}">Apotek Sehat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('welcome') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#produk">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#apoteker">Apoteker</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-success ms-lg-2" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-success text-white ms-lg-2 mt-2 mt-lg-0" href="{{ route('register') }}">Daftar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <button onclick="topFunction()" id="scrollToTopBtn" title="Go to top">↑</button>

    <footer class="bg-dark text-white text-center p-4">
        <p class="mb-0">&copy; {{ date('Y') }} Apotek Sehat. All Rights Reserved.</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>

        let mybutton = document.getElementById("scrollToTopBtn");
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (mybutton && (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20)) {
                mybutton.style.display = "block";
            } else if (mybutton) {
                mybutton.style.display = "none";
            }
        }
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    @stack('scripts')
</body>
</html>