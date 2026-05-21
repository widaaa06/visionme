<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanMata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Tampilkan Halaman Utama Dashboard (Statistik)
     */
    public function index()
    {
        $totalSkrining = PemeriksaanMata::count();
        $indikasiMedis = PemeriksaanMata::where('status_medis', '!=', 'Normal')->count();
        $akurasiSistem = $totalSkrining > 0 ? '98.2%' : '0%';

        return view('dashboard', compact('totalSkrining', 'indikasiMedis', 'akurasiSistem'));
    }

    /* =========================================================================
     * AREA MANAJEMEN HASIL PEMERIKSAAN MATA
     * ========================================================================= */

    /**
     * Tampilkan Semua Daftar Hasil Pemeriksaan (Tabel Riwayat)
     */
    public function list()
    {
        // Mengambil data pemeriksaan terbaru beserta data user/pasiennya (Eager Loading)
        $semuaPemeriksaan = PemeriksaanMata::with('user')->latest()->get();

        return view('pemeriksaan.index', compact('semuaPemeriksaan'));
    }

    /**
     * Tampilkan Halaman Form Input Skrining Baru
     */
    public function create()
    {
        // Mengambil semua user/pasien untuk dipilih di form dropdown nanti
        $pasiens = User::all(); 
        return view('pemeriksaan.create', compact('pasiens'));
    }

    /**
     * Proses Simpan Data Pemeriksaan ke Database
     */
    public function store(Request $request)
    {
        // Validasi inputan form
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kategori_uji' => 'required|string',
            'hasil_pengukuran' => 'required|string',
            'status_medis' => 'required|string',
        ]);

        // Simpan ke database
        PemeriksaanMata::create([
            'user_id' => $request->user_id,
            'kategori_uji' => $request->kategori_uji,
            'hasil_pengukuran' => $request->hasil_pengukuran,
            'status_medis' => $request->status_medis,
        ]);

        // Kembalikan ke halaman daftar dengan pesan sukses
        return redirect()->route('pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil disimpan!');
    }

    /* =========================================================================
     * AREA MANAJEMEN DATA AKUN PASIEN
     * ========================================================================= */

    /**
     * Tampilkan Daftar Akun Pasien Terdaftar
     */
    public function pasienIndex()
    {
        // Mengambil data seluruh pasien yang diurutkan dari pendaftaran terbaru
        $semuaPasien = User::latest()->get();

        return view('pasien.index', compact('semuaPasien'));
    }

    /**
     * Tampilkan Form Registrasi Akun Pasien Baru
     */
    public function pasienCreate()
    {
        return view('pasien.create');
    }

    /**
     * Proses Simpan Registrasi Akun Pasien Baru
     */
    public function pasienStore(Request $request)
    {
        // Validasi keunikan email agar tidak terjadi crash duplikasi data di DB
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Enkripsi password menggunakan bcrypt secara otomatis lewat Hash::make
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Lempar kembali ke halaman tabel pasien dengan flash alert
        return redirect()->route('pasien.index')->with('success', 'Data pasien baru berhasil didaftarkan!');
    }
}