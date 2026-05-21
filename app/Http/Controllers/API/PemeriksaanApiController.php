<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PemeriksaanMata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PemeriksaanApiController extends Controller
{
    /**
     * Menyimpan data hasil skrining mata dari Aplikasi Mobile VisionMe.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input Data API
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'kategori_uji' => 'required|string|in:Snellen Chart,Astigmatisme,Buta Warna',
            'hasil_pengukuran' => 'required|string',
            'status_medis' => 'required|string',
        ]);

        // Jika validasi gagal (misal: user_id tidak terdaftar di DB)
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi data gagal.',
                'errors'  => $validator->errors()
            ], 422); // 422: Unprocessable Entity
        }

        try {
            // 2. Simpan Data ke Database Terpusat
            $pemeriksaan = PemeriksaanMata::create([
                'user_id'          => $request->user_id,
                'kategori_uji'     => $request->kategori_uji,
                'hasil_pengukuran' => $request->hasil_pengukuran,
                'status_medis'     => $request->status_medis,
            ]);

            // 3. Kembalikan Response Sukses ke Aplikasi Flutter
            return response()->json([
                'success' => true,
                'message' => 'Data rekam medis VisionMe berhasil disinkronkan ke server!',
                'data'    => $pemeriksaan
            ], 201); // 201: Created

        } catch (\Exception $e) {
            // Mengatasi jika ada error internal server/database crash
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem internal server.',
                'error'   => $e->getMessage()
            ], 500); // 500: Internal Server Error
        }
    }

    /**
     * Proses Autentikasi Login Pasien dari Aplikasi Mobile.
     */
    public function login(Request $request)
    {
        // 1. Validasi format input dari Flutter
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Format email atau password tidak valid.',
                'errors' => $validator->errors()
            ], 422);
        }

        // 2. Cari user berdasarkan email di database
        $user = User::where('email', $request->email)->first();

        // 3. Validasi kecocokan user dan password biner lewat Hash::check
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Kombinasi email atau password salah.'
            ], 401); // 401: Unauthorized
        }

        // 4. Kirim response sukses beserta data profil pasien ke Flutter
        return response()->json([
            'success' => true,
            'message' => 'Autentikasi berhasil! Selamat datang di VisionMe.',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->format('Y-m-d H:i:s')
            ]
        ], 200); // 200: OK
    }
}