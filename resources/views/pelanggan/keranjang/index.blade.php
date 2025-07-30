<?php
?>
@extends('layout.pelanggan')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 fw-bold">Keranjang Belanja Anda</h2>
    <div class="row">
        <div class="col-lg-8">
            @if(!empty($keranjang))
                @foreach($keranjang as $id => $details)
                    <div class="card mb-3 shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input class="form-check-input item-checkbox" type="checkbox" value="{{ $id }}" 
                                           data-harga="{{ $details['harga'] }}" data-jumlah="{{ $details['jumlah'] }}" checked>
                                </div>
                                <img src="{{ $details['gambar'] }}" alt="{{ $details['nama'] }}" class="rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                <div class="ms-3 flex-grow-1">
                                    <h5 class="mb-1">{{ $details['nama'] }}</h5>
                                    
                                    <!-- Tombol +/- Jumlah BARU -->
                                    <div class="d-flex align-items-center my-2">
                                        <form action="{{ route('pelanggan.keranjang.update') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="obat_id" value="{{ $id }}">
                                            <input type="hidden" name="jumlah" value="{{ $details['jumlah'] - 1 }}">
                                            <button type="submit" class="btn btn-sm btn-secondary" {{ $details['jumlah'] <= 1 ? 'disabled' : '' }}>-</button>
                                        </form>
                                        <span class="mx-2 fw-bold">{{ $details['jumlah'] }}</span>
                                        <form action="{{ route('pelanggan.keranjang.update') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="obat_id" value="{{ $id }}">
                                            <input type="hidden" name="jumlah" value="{{ $details['jumlah'] + 1 }}">
                                            <button type="submit" class="btn btn-sm btn-secondary">+</button>
                                        </form>
                                    </div>

                                    <h6 class="text-primary fw-bold">Rp {{ number_format($details['harga'] * $details['jumlah'], 0, ',', '.') }}</h6>
                                </div>
                                <form action="{{ route('pelanggan.keranjang.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="obat_id" value="{{ $id }}">
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info">Keranjang belanja Anda kosong.</div>
            @endif
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="card-title fw-bold">Ringkasan Belanja</h4>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Total Harga (<span id="jumlah-item-terpilih">0</span> item)</p>
                        <p class="mb-2 fw-bold" id="total-harga">Rp 0</p>
                    </div>
                    <div class="d-grid mt-3">
                        <a href="#" class="btn btn-primary btn-lg">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const itemCheckboxes = document.querySelectorAll('.item-checkbox');
    const totalHargaEl = document.getElementById('total-harga');
    const jumlahItemEl = document.getElementById('jumlah-item-terpilih');

    function hitungTotal() {
        let total = 0;
        let jumlahItem = 0;
        itemCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const harga = parseFloat(checkbox.dataset.harga);
                const jumlah = parseInt(checkbox.dataset.jumlah);
                total += harga * jumlah;
                jumlahItem++;
            }
        });
        
        totalHargaEl.textContent = 'Rp ' + total.toLocaleString('id-ID');
        jumlahItemEl.textContent = jumlahItem;
    }

    itemCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', hitungTotal);
    });

    hitungTotal();

    // Skrip untuk memicu Toast Notification
    @if(session('success'))
        const toastElement = document.getElementById('notificationToast');
        const toastBody = toastElement.querySelector('.toast-body');
        
        toastBody.textContent = "{{ session('success') }}";
        
        const toast = new bootstrap.Toast(toastElement);
        toast.show();
    @endif
});
</script>
@endsection