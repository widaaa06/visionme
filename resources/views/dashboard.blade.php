<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionMe - Dashboard Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .active-menu {
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
            box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.5);
            color: white !important;
        }
    </style>
</head>
<body class="antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        @include('components.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden bg-slate-50">
            <header class="flex h-20 items-center justify-between bg-white px-8 border-b border-slate-200/60 sticky top-0 z-40">
                <button @click="sidebarOpen = !sidebarOpen" class="text-slate-500 md:hidden cursor-pointer">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div class="text-sm font-medium text-slate-400 hidden sm:block">
                    Selamat Datang, <span class="text-slate-700 font-bold">{{ Auth::user()->name }}</span> &bull; Panel Admin VisionMe
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-8 lg:p-12">
                
                <div class="mb-8">
                    <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Ringkasan Sistem</h1>
                    <p class="text-slate-500 text-sm mt-1">Pantau statistik skrining aplikasi mata bergerak secara real-time.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    
                    <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm flex items-center gap-5">
                        <div class="p-4 bg-indigo-50 text-indigo-600 rounded-2xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Pemeriksaan</p>
                            <h3 class="text-2xl font-black text-slate-900 mt-1">{{ $totalSkrining }} <span class="text-xs font-normal text-slate-400">kali tes</span></h3>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm flex items-center gap-5">
                        <div class="p-4 bg-rose-50 text-rose-600 rounded-2xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Indikasi Gangguan</p>
                            <h3 class="text-2xl font-black text-slate-900 mt-1">{{ $indikasiMedis }} <span class="text-xs font-normal text-slate-400">pasien</span></h3>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm flex items-center gap-5">
                        <div class="p-4 bg-emerald-50 text-emerald-600 rounded-2xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Akurasi Validasi</p>
                            <h3 class="text-2xl font-black text-slate-900 mt-1">{{ $akurasiSistem }}</h3>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    
                    <div class="bg-white p-6 sm:p-8 rounded-[2rem] border border-slate-100 shadow-sm">
                        <h3 class="text-md font-bold text-slate-900 mb-4">Metode Pemeriksaan Populer</h3>
                        <div class="h-64 flex items-center justify-center">
                            <canvas id="chartKategori"></canvas>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-slate-900 to-indigo-950 p-8 rounded-[2rem] text-white flex flex-col justify-between shadow-xl relative overflow-hidden">
                        <div class="absolute right-0 bottom-0 opacity-10 translate-x-10 translate-y-10">
                            <svg class="w-80 h-80" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                        </div>
                        <div class="z-10">
                            <span class="bg-white/10 px-3 py-1 rounded-full text-xs font-semibold text-indigo-300">Panduan Admin</span>
                            <h2 class="text-xl font-extrabold mt-4 leading-snug">Butuh sinkronisasi data pemeriksaan dari perangkat eksternal?</h2>
                            <p class="text-slate-400 text-sm mt-2">Semua data hasil tes tajam penglihatan (Snellen Chart) dan analisis buta warna ter-update otomatis begitu pasien menyelesaikan tes di aplikasi mobile mereka.</p>
                        </div>
                        <div class="pt-6 border-t border-white/10 mt-6 z-10 flex gap-4">
                            <a href="{{ route('pemeriksaan.create') }}" class="bg-white text-slate-950 font-bold px-5 py-2.5 rounded-xl text-xs hover:bg-slate-100 transition">Input Manual</a>
                            <a href="{{ route('pasien.index') }}" class="text-white/80 hover:text-white font-semibold text-xs flex items-center gap-1">Lihat Pasien &rarr;</a>
                        </div>
                    </div>

                </div>

            </main>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('chartKategori').getContext('2d');
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Snellen Chart', 'Astigmatisme', 'Buta Warna'],
                    datasets: [{
                        label: 'Jumlah Pengujian',
                        data: [65, 32, 48], // Dummy insight data awal, bisa dibuat dinamis nanti
                        backgroundColor: [
                            'rgba(79, 70, 229, 0.85)',
                            'rgba(59, 130, 246, 0.85)',
                            'rgba(16, 185, 129, 0.85)'
                        ],
                        borderRadius: 12,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: '#f1f5f9' },
                            ticks: { color: '#94a3b8', font: { family: 'Plus Jakarta Sans' } }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: '#475569', font: { family: 'Plus Jakarta Sans', weight: '600' } }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>