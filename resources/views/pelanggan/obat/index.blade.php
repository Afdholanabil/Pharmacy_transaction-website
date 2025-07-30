<?php
?>
@extends('layout.pelanggan')

@section('title', 'Katalog Obat')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 fw-bold">Katalog Obat Kami</h2>

    <div class="row">
        @forelse ($obats as $obat)
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <img src="https://placehold.co/600x400/28a745/white?text={{ urlencode($obat->NmObat) }}" class="card-img-top" alt="{{ $obat->NmObat }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $obat->NmObat }}</h5>
                        <p class="card-text text-muted flex-grow-1">Stok: {{ $obat->Stok }}</p>
                        <h4 class="text-primary fw-bold">Rp {{ number_format($obat->HargaJual, 0, ',', '.') }}</h4>
                        <form action="{{ route('pelanggan.keranjang.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="obat_id" value="{{ $obat->KdObat }}">
                            <button type="submit" class="btn btn-primary w-100 mt-3">
                                Tambah Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12"><p class="text-center text-muted">Tidak ada obat yang tersedia.</p></div>
        @endforelse
    </div>
</div>

<!-- Toast Notification Container -->
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

<script>
// Skrip untuk memicu Toast Notification
document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
        const toastElement = document.getElementById('notificationToast');
        const toastBody = toastElement.querySelector('.toast-body');
        
        // Mengisi pesan dari session flash
        toastBody.textContent = "{{ session('success') }}";
        
        const toast = new bootstrap.Toast(toastElement);
        toast.show();
    @endif
});
</script>
@endsection