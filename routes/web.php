<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\ObatController;

// 1. Halaman Login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::resource('users', UserController::class);

// 2. Halaman Dashboard Overview setelah sukses login
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// 3. AREA HASIL PEMERIKSAAN MATA
// Halaman DAFTAR/TABEL hasil pemeriksaan (INI YANG TADI HILANG/BELUM ADA)
Route::get('/pemeriksaan', [DashboardController::class, 'list'])
    ->middleware('auth')
    ->name('pemeriksaan.index');

// Halaman form tambah pemeriksaan
Route::get('/pemeriksaan/create', [DashboardController::class, 'create'])
    ->middleware('auth')
    ->name('pemeriksaan.create');

Route::post('/pemeriksaan/store', [PemeriksaanController::class, 'store'])->name('pemeriksaan.store');

// Proses simpan data pemeriksaan ke database
Route::post('/pemeriksaan', [DashboardController::class, 'store'])
    ->middleware('auth')
    ->name('pemeriksaan.store');

// 4. AREA MANAJEMEN DATA AKUN PASIEN
// Halaman daftar pasien
Route::get('/pasien', [DashboardController::class, 'pasienIndex'])
    ->middleware('auth')
    ->name('pasien.index');

// Halaman form tambah pasien baru
Route::get('/pasien/create', [DashboardController::class, 'pasienCreate'])
    ->middleware('auth')
    ->name('pasien.create');

// Proses simpan data pasien baru ke database
Route::post('/pasien', [DashboardController::class, 'pasienStore'])
    ->middleware('auth')
    ->name('pasien.store');

// 5. Proses Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('obat', ObatController::class);