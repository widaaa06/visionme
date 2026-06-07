<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanMata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Dashboard Overview (Statistik)
     */
    public function index()
    {
        $totalSkrining   = PemeriksaanMata::count();
        $indikasiMedis   = PemeriksaanMata::where('status_medis', 'Positif')->count();
        $totalPasien     = User::count();
        $akurasiSistem   = 98; 

        return view('dashboard.index', compact('totalSkrining', 'indikasiMedis', 'totalPasien', 'akurasiSistem'));
    }

    /**
     * Menampilkan daftar pemeriksaan (Metode yang dipanggil route)
     */
    public function list()
    {
        $semuaPemeriksaan = PemeriksaanMata::with('user')->latest()->get();
        return view('pemeriksaan.index', compact('semuaPemeriksaan'));
    }

    public function create()
    {
        $pasiens = User::all(); 
        return view('pemeriksaan.create', compact('pasiens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kategori_uji' => 'required|string',
            'hasil_pengukuran' => 'required|string',
            'status_medis' => 'required|string',
        ]);

        PemeriksaanMata::create($request->all());

        return redirect()->route('pemeriksaan.index')->with('success', 'Data berhasil disimpan!');
    }

    public function pasienIndex()
    {
        $semuaPasien = User::latest()->get();
        return view('pasien.index', compact('semuaPasien'));
    }

    public function pasienCreate()
    {
        return view('pasien.create');
    }

    public function pasienStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil didaftarkan!');
    }
}