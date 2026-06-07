<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObatController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| AUTH MIDDLEWARE
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------
    | DASHBOARD
    |--------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |--------------------------
    | PEMERIKSAAN (FIXED)
    |--------------------------
    */
    Route::get('/pemeriksaan', [PemeriksaanController::class, 'index'])
        ->name('pemeriksaan.index');

    Route::get('/pemeriksaan/create', [PemeriksaanController::class, 'create'])
        ->name('pemeriksaan.create');

    Route::post('/pemeriksaan', [PemeriksaanController::class, 'store'])
        ->name('pemeriksaan.store');

    /*
    |--------------------------
    | PASIEN (CLEAN RESOURCE)
    |--------------------------
    */
    Route::resource('pasien', PasienController::class);

    /*
    |--------------------------
    | USER
    |--------------------------
    */
    Route::resource('users', UserController::class);

    /*
    |--------------------------
    | OBAT
    |--------------------------
    */
    Route::resource('obat', ObatController::class);

    Route::patch('/obat/{id}/tambah-stok', [ObatController::class, 'tambahStok'])
        ->name('obat.tambahStok');

    Route::patch('/obat/{id}/kurangi-stok', [ObatController::class, 'kurangiStok'])
        ->name('obat.kurangiStok');
});