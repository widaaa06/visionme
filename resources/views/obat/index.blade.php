<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionMe - Apotek</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body{
            font-family:'Plus Jakarta Sans',sans-serif;
            background:#f5f7fb;
        }

        .active-menu{
            background:linear-gradient(135deg,#4f46e5 0%,#4338ca 100%);
            color:white !important;
            box-shadow:0 10px 30px rgba(79,70,229,.25);
        }

        [x-cloak]{
            display:none !important;
        }
    </style>
</head>

<body x-data="{sidebarOpen:false,openModal:false}" class="antialiased">

<div class="flex h-screen overflow-hidden">

    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col overflow-hidden bg-[#f5f7fb]">

        {{-- Header --}}
        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8">

            <div class="relative">
                <input
                    type="text"
                    placeholder="Cari data pasien, rekam medis..."
                    class="w-80 h-11 rounded-2xl border border-slate-200 bg-slate-50 pl-12 pr-4 outline-none focus:border-indigo-500">

                <svg class="w-5 h-5 text-slate-400 absolute left-4 top-3"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"/>
                </svg>
            </div>

            <div class="flex items-center gap-4">
                <div class="text-right">
                    <h3 class="font-bold text-slate-800">
                        Admin User
                    </h3>
                    <p class="text-sm text-slate-400">
                        id: admin@gmail.com
                    </p>
                </div>

                <div class="w-11 h-11 rounded-2xl bg-indigo-100 text-indigo-600 font-bold flex items-center justify-center">
                    AU
                </div>
            </div>
        </header>

        {{-- Content --}}
        <main class="flex-1 overflow-y-auto p-8">

            @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl">
                {{ session('success') }}
            </div>
            @endif

            {{-- Heading --}}
            <div class="flex items-center justify-between mb-8">

                <div>
                    <h1 class="text-5xl font-extrabold text-slate-800">
                        Data Obat
                    </h1>

                    <p class="text-slate-500 mt-2">
                        Kelola seluruh data obat pada sistem VisionMe.
                    </p>
                </div>

                <button
                    @click="openModal=true"
                    class="px-6 py-4 rounded-2xl text-white font-semibold bg-gradient-to-r from-indigo-600 to-blue-500 shadow-lg hover:scale-105 transition">

                    + Tambah Obat
                </button>

            </div>

            {{-- Card --}}
            <div class="bg-white rounded-[30px] border border-slate-100 shadow-sm overflow-hidden">

                <div class="px-8 py-6 border-b border-slate-100">
                    <h3 class="text-xl font-bold text-slate-800">
                        Daftar Obat
                    </h3>
                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-slate-50">

                            <tr>
                                <th class="px-6 py-5 text-left text-sm font-bold text-slate-500">
                                    Gambar
                                </th>

                                <th class="px-6 py-5 text-left text-sm font-bold text-slate-500">
                                    Nama Obat
                                </th>

                                <th class="px-6 py-5 text-left text-sm font-bold text-slate-500">
                                    Deskripsi
                                </th>

                                <th class="px-6 py-5 text-left text-sm font-bold text-slate-500">
                                    Harga
                                </th>

                                <th class="px-6 py-5 text-left text-sm font-bold text-slate-500">
                                    Stok
                                </th>

                                <th class="px-6 py-5 text-left text-sm font-bold text-slate-500">
                                    Aksi
                                </th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($obats as $obat)

                            <tr class="border-t border-slate-100 hover:bg-slate-50 transition">

                                <td class="px-6 py-5">

                                    @if($obat->gambar)

                                    <img
                                        src="{{ asset('storage/'.$obat->gambar) }}"
                                        class="w-16 h-16 rounded-2xl object-cover border border-slate-200">

                                    @else

                                    <div class="w-16 h-16 rounded-2xl bg-slate-100 flex items-center justify-center text-xs text-slate-400">
                                        No Image
                                    </div>

                                    @endif

                                </td>

                                <td class="px-6 py-5 font-bold text-slate-800">
                                    {{ $obat->nama }}
                                </td>

                                <td class="px-6 py-5 text-slate-500 max-w-xs truncate">
                                    {{ $obat->deskripsi }}
                                </td>

                                <td class="px-6 py-5 font-bold text-emerald-600">
                                    Rp {{ number_format($obat->harga,0,',','.') }}
                                </td>

                                <td class="px-6 py-5">

                                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700">
                                        {{ $obat->stok }}
                                    </span>

                                </td>

                                <td class="px-6 py-5">
                                    <div class="flex gap-2">

                                        <form action="{{ route('obat.kurangiStok',$obat->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button
                                                class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-slate-200 font-bold">
                                                -
                                            </button>
                                        </form>

                                        <form action="{{ route('obat.tambahStok',$obat->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button
                                                class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-slate-200 font-bold">
                                                +
                                            </button>
                                        </form>

                                        <form action="{{ route('obat.destroy',$obat->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="w-9 h-9 rounded-xl bg-red-50 hover:bg-red-100 text-red-600">

                                                🗑

                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="6" class="text-center py-20 text-slate-400">
                                    Belum ada data obat
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