<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::post('/logout',[UserController::class,'logout']);


//Public Route
Route::get('/', [DashboardController::class, 'index'])->name('welcome');
Route::get('/obat/{obat}', [ObatController::class, 'showPublic'])->name('obat.showPublic');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Customer Route
Route::middleware(['auth', 'role:pelanggan'])->prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'pelanggan'])->name('dashboard');
    Route::get('/obat', [ObatController::class, 'indexPublic'])->name('obat.index');
});


// pharmacist Route
Route::middleware(['auth', 'role:apoteker'])->prefix('apoteker')->name('apoteker.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'apoteker'])->name('dashboard');
    
    // g, h) Resource untuk CRUD Obat (menambah, menghapus, dll)
    Route::resource('/obat', ObatController::class);

    // j) Halaman untuk menghapus data obat yang kadaluarsa
    Route::delete('/obat-kadaluarsa', [ObatController::class, 'destroyExpired'])->name('obat.destroyExpired');

    // i) Halaman untuk melihat histori penjualan obat
    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('/penjualan/{penjualan}', [PenjualanController::class, 'show'])->name('penjualan.show');
});


// Admin Route
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    
    // n) Halaman untuk mendaftar apoteker baru maupun mengedit
    Route::resource('/apoteker', ApotekerController::class)->except(['show']);

    // m) Halaman untuk daftar supplier (CRUD)
    Route::resource('/supplier', SupplierController::class);
    
    // l) Halaman untuk melihat daftar pembelian obat
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('/pembelian/{pembelian}', [PembelianController::class, 'show'])->name('pembelian.show');
});
