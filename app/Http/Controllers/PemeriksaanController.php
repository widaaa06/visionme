<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan; 
use App\Models\User;
use Illuminate\Support\Facades\Validator; // Tambahkan ini di atas

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

    // ===================================================================
    // KONTROLLER BARU: Endpoint API untuk MENYIMPAN hasil pemeriksaan dari FLUTTER
    // ===================================================================
    public function storeApi(Request $request)
    {
        // Kita validasi manual agar tidak dilempar acak oleh Laravel
        $validator = Validator::make($request->all(), [
            'user_id'          => 'required|exists:users,id',
            'kategori_uji'     => 'required|string',
            'hasil_pengukuran' => 'required|string',
            'status_medis'     => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi API gagal.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Simpan data ke database
        $pemeriksaan = Pemeriksaan::create([
            'user_id'          => $request->user_id,
            'kategori_uji'     => $request->kategori_uji,
            'hasil_pengukuran' => $request->hasil_pengukuran,
            'status_medis'     => $request->status_medis,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data pemeriksaan berhasil disimpan via API',
            'data' => $pemeriksaan
        ], 201);
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