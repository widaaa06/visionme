@extends('dashboard')

@section('content')
<div class="p-8">
    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-800">Overview Dashboard</h1>
        <p class="text-slate-500 mt-1">Pantau statistik skrining klinis VisionMe secara real-time.</p>
    </div>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-4 gap-6 mb-8">
        {{-- Total Skrining --}}
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-xs font-bold text-slate-400 tracking-widest mb-2">TOTAL SKRINING</p>
            <h2 class="text-4xl font-extrabold text-slate-800 mb-3">{{ $totalSkrining }}</h2>
            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-green-50 text-green-600">Data Tersimpan</span>
        </div>
        {{-- Indikasi Medis --}}
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-xs font-bold text-slate-400 tracking-widest mb-2">INDIKASI MEDIS</p>
            <h2 class="text-4xl font-extrabold text-slate-800 mb-3">{{ $indikasiMedis }}</h2>
            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-rose-50 text-rose-600">Perlu Tindak Lanjut</span>
        </div>
        {{-- Total Pasien --}}
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-xs font-bold text-slate-400 tracking-widest mb-2">TOTAL PASIEN</p>
            <h2 class="text-4xl font-extrabold text-slate-800 mb-3">{{ $totalPasien }}</h2>
            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-indigo-50 text-indigo-600">Akun Terdaftar</span>
        </div>
        {{-- Akurasi --}}
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-xs font-bold text-slate-400 tracking-widest mb-2">AKURASI SISTEM</p>
            <h2 class="text-4xl font-extrabold text-slate-800 mb-3">{{ $akurasiSistem }}%</h2>
            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-600">Validasi Terakhir</span>
        </div>
    </div>

    {{-- Charts Placeholder --}}
    <div class="grid grid-cols-3 gap-6">
        <div class="col-span-2 bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-lg mb-6">Skrining Statistic</h3>
            <div class="h-64 flex items-center justify-center border-2 border-dashed border-slate-100 rounded-2xl text-slate-400">
                Area Grafik (Integrasikan dengan ApexCharts/Chart.js di sini)
            </div>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-lg mb-6">Status Pasien</h3>
            <div class="h-64 flex items-center justify-center border-2 border-dashed border-slate-100 rounded-2xl text-slate-400">
                Area Donut Chart
            </div>
        </div>
    </div>
</div>
@endsection