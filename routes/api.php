<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\API\PemeriksaanApiController;
use App\Http\Controllers\Api\ObatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// =====================
// AUTH
// =====================

Route::post('/login', [PemeriksaanApiController::class, 'login']);


// =====================
// PEMERIKSAAN MATA
// =====================

// Simpan hasil pemeriksaan dari Flutter
Route::post('/pemeriksaan/store', [PemeriksaanApiController::class, 'store']);

// Riwayat pemeriksaan
Route::middleware('auth:sanctum')->group(function () {
    Route::get(
        '/riwayat-pemeriksaan',
        [PemeriksaanController::class, 'getRiwayatApi']
    );
});


// =====================
// APOTEK
// =====================

// Semua obat
Route::get('/obat', [ObatController::class, 'index']);

// Detail obat
Route::get('/obat/{id}', [ObatController::class, 'show']);