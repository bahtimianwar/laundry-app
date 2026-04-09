<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Menampilkan form login (Method GET)
// middleware('guest') artinya halaman ini cuma bisa dibuka kalau user BELUM login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');

// Memproses form login saat disubmit (Method POST)
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

// Memproses logout (Method POST)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('layanan', LayananController::class);
    Route::resource('transaksi', TransaksiController::class);
});


 