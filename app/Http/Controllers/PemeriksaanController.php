<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan; // Pastikan nama Model kamu sesuai (misal: Pemeriksaan atau Skrining)
use App\Models\User;

class PemeriksaanController extends Controller
{
    // 1. Dipanggil saat Admin klik "Simpan Hasil Pemeriksaan" di Web
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'          => 'required|exists:users,id',
            'kategori_uji'     => 'required|string',
            'hasil_pengukuran' => 'required|string',
            'status_medis'     => 'required|string',
        ]);

        // Menyimpan data ke database
        Pemeriksaan::create($validated);

        // Kembali ke halaman dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Hasil pemeriksaan berhasil disinkronkan!');
    }

    // 2. Endpoint API yang akan dipanggil oleh FLUTTER secara otomatis
    public function getRiwayatApi(Request $request)
    {
        // Mengambil id user yang sedang login di Flutter
        $userId = $request->user()->id; 

        // Ambil riwayat pemeriksaan milik user tersebut
        $riwayat = Pemeriksaan::where('user_id', $userId)
                              ->latest()
                              ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil sinkron dengan admin',
            'data' => $riwayat
        ], 200);
    }
}