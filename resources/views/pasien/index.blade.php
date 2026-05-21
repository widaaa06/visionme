<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionMe - Manajemen Pasien</title>
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
                <div class="text-sm font-medium text-slate-400 hidden sm:block">VisionMe &bull; Manajemen Pasien</div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-8 lg:p-12">
                
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center justify-between shadow-sm">
                        <span class="text-sm font-semibold">{{ session('success') }}</span>
                        <button @click="show = false" class="text-emerald-400 hover:text-emerald-600 text-sm font-bold">&times;</button>
                    </div>
                @endif

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Daftar Pasien Terdaftar</h1>
                        <p class="text-slate-500 text-sm mt-1">Kelola data akun pasien yang menggunakan aplikasi mobile VisionMe.</p>
                    </div>
                    <a href="{{ route('pasien.create') }}" class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white font-bold px-6 py-3 rounded-xl shadow-md shadow-indigo-500/20 hover:opacity-95 transition text-sm">
                        + Tambah Pasien Baru
                    </a>
                </div>

                <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-900 text-white text-xs font-bold uppercase tracking-wider">
                                    <th class="px-6 py-4 rounded-tl-[2rem]">ID</th>
                                    <th class="px-6 py-4">Nama Lengkap</th>
                                    <th class="px-6 py-4">Alamat Email</th>
                                    <th class="px-6 py-4 rounded-tr-[2rem]">Terdaftar Pada</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                                @forelse($semuaPasien as $pasien)
                                    <tr class="hover:bg-slate-50/80 transition">
                                        <td class="px-6 py-4 font-mono text-xs text-slate-400">#{{ $pasien->id }}</td>
                                        <td class="px-6 py-4 font-bold text-slate-900">{{ $pasien->name }}</td>
                                        <td class="px-6 py-4 text-slate-600">{{ $pasien->email }}</td>
                                        <td class="px-6 py-4 text-slate-400 text-xs">{{ $pasien->created_at->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-12 text-center text-slate-400">Belum ada pasien terdaftar.</td>
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