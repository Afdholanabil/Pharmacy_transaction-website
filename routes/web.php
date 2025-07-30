<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Halaman utama
Route::get('/', [DashboardController::class, 'index'])->name('welcome');

Route::get('/obat/{obat}', [ObatController::class, 'showPublic'])->name('obat.showPublic');

Route::get('/obat/{obat}', [ObatController::class, 'showPublic'])->name('obat.public.show');
Route::get('/apoteker/{user}', [ApotekerController::class, 'showPublic'])->name('apoteker.public.show');
Route::get('/produk', [ObatController::class, 'indexPublic'])->name('obat.public.index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:pelanggan'])->prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/dashboard', [PelangganController::class, 'showDashboard'])->name('dashboard');
    Route::get('/obat', [PelangganController::class, 'showObatList'])->name('obat.list');
    Route::get('/keranjang', [PelangganController::class, 'showKeranjang'])->name('keranjang.index');
    Route::get('/history', [PelangganController::class, 'showHistory'])->name('history.index');

    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/add', [KeranjangController::class, 'add'])->name('keranjang.add');
    Route::post('/keranjang/update', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::post('/keranjang/remove', [KeranjangController::class, 'remove'])->name('keranjang.remove');
});

Route::middleware(['auth', 'role:apoteker'])->prefix('apoteker')->name('apoteker.')->group(function () {
    Route::get('/dashboard', [ApotekerDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/obat', ObatController::class);
    Route::delete('/obat-kadaluarsa', [ObatController::class, 'destroyExpired'])->name('obat.destroyExpired');
    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('/penjualan/{penjualan}', [PenjualanController::class, 'show'])->name('penjualan.show');
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    Route::resource('/apoteker', ApotekerController::class)->except(['show']);
    Route::resource('/supplier', SupplierController::class);
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('/pembelian/{pembelian}', [PembelianController::class, 'show'])->name('pembelian.show');
});
