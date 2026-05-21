<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PemeriksaanApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Endpoint untuk menyimpan data pemeriksaan mata hasil tes dari aplikasi mobile Flutter
Route::post('/pemeriksaan/store', [PemeriksaanApiController::class, 'store']);

Route::post('/login', [PemeriksaanApiController::class, 'login']);