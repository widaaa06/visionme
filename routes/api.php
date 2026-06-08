<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\API\PemeriksaanApiController;
use App\Http\Controllers\Api\ObatController;

// AUTH
Route::post('/login', [PemeriksaanApiController::class, 'login']);
Route::post('/register', [PemeriksaanApiController::class, 'register']);

// APOTEK (PUBLIC)
Route::get('/obat', [ObatController::class, 'index']);
Route::get('/obat/{id}', [ObatController::class, 'show']);

// PROTECTED ROUTES
Route::middleware('auth:sanctum')->group(function () {

    // Menyimpan data hasil skrining dari mobile (Memanggil method store)
    Route::post('/pemeriksaan/store', [PemeriksaanApiController::class, 'store']);

    // 👈 TAMBAHKAN ROUTE CETAK PDF INI DI DALAM SANCTUM GROUP
    Route::get('/pemeriksaan/export-pdf/{id}', [PemeriksaanApiController::class, 'exportPdf']);

    // Mengambil riwayat pemeriksaan untuk mobile
    Route::get('/riwayat-pemeriksaan', [PemeriksaanController::class, 'getRiwayatApi']);

    // Logout mobile
    Route::post('/logout', [PemeriksaanApiController::class, 'logout']);
});