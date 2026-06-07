<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan; 
use App\Models\User;

class PemeriksaanController extends Controller
{
    // === TAMPILKAN HALAMAN INDEX WEB ===
    public function index()
{
    $semuaPemeriksaan = Pemeriksaan::with('user')
        ->latest()
        ->paginate(10);

    return view('pemeriksaan.index', compact('semuaPemeriksaan'));
}

    // 1. Dipanggil saat Admin klik "Simpan Hasil Pemeriksaan" di Web
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'          => 'required|exists:users,id',
            'kategori_uji'     => 'required|string',
            'hasil_pengukuran' => 'required|string',
            'status_medis'     => 'required|string',
        ]);

        Pemeriksaan::create($validated);

        return redirect()->route('pemeriksaan.index')->with('success', 'Hasil pemeriksaan berhasil disinkronkan!');
    }

    // 2. Endpoint API yang akan dipanggil oleh FLUTTER secara otomatis
    public function getRiwayatApi(Request $request)
    {
        $userId = $request->user()->id; 

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