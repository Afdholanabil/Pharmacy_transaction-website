<?php

?>

@extends('layout.app')

@section('title','Selamat Datang di Apotek Sehat Diponegoro')
@section('content')
    <!-- Hero Section -->
    <header class="py-5 bg-white">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-dark mb-2">Apotek Sehat</h1>
                        <p class="lead fw-normal text-dark-50 mb-4">Menyediakan solusi kesehatan lengkap dan terpercaya untuk Anda dan keluarga. Cepat, mudah, dan profesional.</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-success btn-lg px-4 me-sm-3" href="#produk">Lihat Produk</a>
                            <a class="btn btn-outline-dark btn-lg px-4" href="#apoteker">Temui Apoteker Kami</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                    <img class="img-fluid rounded-3 my-5" src="https://placehold.co/600x400/198754/FFFFFF?text=Apotek+Sehat" alt="[Gambar Ilustrasi Apotek]" />
                </div>
            </div>
        </div>
    </header>

    <!-- Produk Terbaru Section -->
    <section class="py-5" id="produk">
        <div class="container px-5 my-5">
            <div class="text-center mb-5"><h2 class="fw-bolder">Produk Terbaru Kami</h2></div>
            <div class="row gx-5">
                @forelse($obats as $obat)
                <div class="col-lg-3 mb-5">
                    <div class="card h-100 shadow border-0 card-hover">
                        <img class="card-img-top" src="https://placehold.co/500x325/28a745/white?text={{ urlencode($obat->NmObat) }}" alt="{{ $obat->NmObat }}" />
                        <div class="card-body p-4">
                            <!-- DIUBAH: Link sekarang mengarah ke halaman detail -->
                            <a class="text-decoration-none link-dark stretched-link" href="{{ route('obat.public.show', $obat) }}">
                                <h5 class="card-title mb-3">{{ $obat->NmObat }}</h5>
                            </a>
                            <p class="card-text mb-0">Rp {{ number_format($obat->HargaJual, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center"><p class="text-muted">Belum ada produk.</p></div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Apoteker Section (DIUBAH TOTAL) -->
    <section class="py-5 bg-white" id="apoteker">
        <div class="container px-5 my-5">
            <div class="text-center mb-5"><h2 class="fw-bolder">Tim Apoteker Profesional Kami</h2></div>
            
            <!-- Container baru untuk Carousel dan Tombol Navigasi -->
            <div class="apoteker-carousel-container">
                <!-- Swiper Carousel -->
                <div class="swiper apoteker-carousel">
                    <div class="swiper-wrapper">
                        @forelse($apotekers as $apoteker)
                        <div class="swiper-slide">
                            <a href="{{ route('apoteker.public.show', $apoteker) }}" class="text-decoration-none">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top" src="{{ $apoteker->foto_profil ? asset('storage/' . $apoteker->foto_profil) : 'https://placehold.co/500x350/6c757d/FFFFFF?text=Foto' }}" alt="Foto {{ $apoteker->name }}" />
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <h5 class="fw-bolder mb-0 text-dark">{{ $apoteker->name }}</h5>
                                            <span class="mx-2 text-muted">|</span>
                                            <span class="status-dot {{ $apoteker->status_aktif ? 'active' : '' }}"></span>
                                            <span class="text-muted">{{ $apoteker->status_aktif ? 'Aktif' : 'Tidak Aktif' }}</span>
                                        </div>
                                        <div class="fst-italic text-muted">{{ $apoteker->jabatan ?? 'Apoteker' }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @empty
                        <div class="swiper-slide">
                            <p class="text-center text-muted">Belum ada data apoteker.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
                <!-- Tombol Navigasi dipindahkan ke luar container swiper -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    const swiper = new Swiper('.apoteker-carousel', {
        // Konfigurasi yang Diperbarui
        loop: false, // Tidak looping agar tombol bisa disable
        slidesPerView: 1.5, // Tampilkan 1.5 slide di mobile agar terlihat ada slide lain
        spaceBetween: 20,
        centeredSlides: false, // Tidak lagi center, agar mepet ke kiri
        slidesPerGroup: 3, // Geser satu per satu

        // Tombol Navigasi
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // Breakpoints untuk layar yang lebih besar
        breakpoints: {
            768: {
                slidesPerView: 2.5,
                spaceBetween: 30,
            },
            992: {
                slidesPerView: 3, // Tampilkan 3 slide penuh
                spaceBetween: 40,
            }
        },
        // Fungsi 'on' dan 'applyFocusEffect' dihapus karena tidak lagi diperlukan
    });
</script>
@endpush
