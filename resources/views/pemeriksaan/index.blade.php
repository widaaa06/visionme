<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionMe - Riwayat Pemeriksaan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
                    VisionMe &bull; Riwayat Pemeriksaan
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-8 lg:p-12">
                
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center justify-between shadow-sm">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="text-sm font-semibold">{{ session('success') }}</span>
                        </div>
                        <button @click="show = false" class="text-emerald-400 hover:text-emerald-600 text-sm font-bold cursor-pointer">&times;</button>
                    </div>
                @endif

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Riwayat Hasil Skrining</h1>
                        <p class="text-slate-500 text-sm mt-1">Daftar rekam medis hasil tes mata pasien VisionMe.</p>
                    </div>
                    <a href="{{ route('pemeriksaan.create') }}" class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white font-bold px-6 py-3 rounded-xl shadow-md shadow-indigo-500/20 hover:opacity-95 transition text-sm">
                        + Input Tes Baru
                    </a>
                </div>

                <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-900 text-white text-xs font-bold uppercase tracking-wider">
                                    <th class="px-6 py-4">Nama Pasien</th>
                                    <th class="px-6 py-4">Kategori Uji</th>
                                    <th class="px-6 py-4">Hasil Pengukuran</th>
                                    <th class="px-6 py-4">Status Medis</th>
                                    <th class="px-6 py-4">Tanggal Periksa</th>
                                    <th class="px-6 py-4 rounded-tr-[2rem]">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                                @forelse($semuaPemeriksaan as $item)
                                    <tr class="hover:bg-slate-50/80 transition">
                                        <td class="px-6 py-4 font-bold text-slate-900">
                                            {{ $item->user->name ?? 'User Terhapus' }}
                                            <span class="block text-xs font-normal text-slate-400 mt-0.5">{{ $item->user->email ?? '-' }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-xs font-semibold">
                                                {{ $item->kategori_uji }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 font-mono font-medium text-slate-600">
                                            {{ $item->hasil_pengukuran }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($item->status_medis == 'Normal')
                                                <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-bold">Normal</span>
                                            @else
                                                <span class="px-3 py-1 bg-amber-50 text-amber-700 rounded-full text-xs font-bold">{{ $item->status_medis }}</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-slate-400 text-xs">
                                            {{ $item->created_at->format('d M Y, H:i') }} WIB
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('pemeriksaan.pdf', $item->id) }}" target="_blank" class="inline-flex items-center gap-1.5 bg-slate-100 hover:bg-indigo-50 hover:text-indigo-600 text-slate-700 font-bold px-3 py-1.5 rounded-lg text-xs transition cursor-pointer">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                                </svg>
                                                Cetak PDF
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center text-slate-400 font-medium">
                                            Belum ada data pemeriksaan yang terekam.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>
</html>