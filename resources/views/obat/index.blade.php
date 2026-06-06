<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionMe - Apotek</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }

        .active-menu {
            background: linear-gradient(135deg,#4f46e5 0%,#3b82f6 100%);
            color:white !important;
        }
    </style>
</head>

<body
    class="antialiased"
    x-data="{
        sidebarOpen:false,
        openModal:false
    }">

<div class="flex h-screen overflow-hidden">

    @include('components.sidebar')

    <div class="flex-1 flex flex-col overflow-hidden bg-slate-50">

        <header class="flex h-20 items-center justify-between bg-white px-8 border-b border-slate-200">
            <h1 class="text-xl font-bold text-slate-800">
                Manajemen Apotek
            </h1>
        </header>

        <main class="flex-1 overflow-y-auto p-8">

            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-900">
                        Data Obat
                    </h2>

                    <p class="text-slate-500 mt-1">
                        Kelola daftar obat yang tersedia di aplikasi VisionMe.
                    </p>
                </div>

                <button
                    @click="openModal = true"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-2xl font-semibold">
                    + Tambah Obat
                </button>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">

                <table class="w-full">

                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-left">Nama Obat</th>
                            <th class="px-6 py-4 text-left">Deskripsi</th>
                            <th class="px-6 py-4 text-left">Harga</th>
                            <th class="px-6 py-4 text-left">Stok</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($obats as $obat)

                        <tr class="border-t border-slate-100">
                            <td class="px-6 py-4 font-semibold">
                                {{ $obat->nama }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $obat->deskripsi }}
                            </td>

                            <td class="px-6 py-4">
                                Rp {{ number_format($obat->harga,0,',','.') }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $obat->stok }}
                            </td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="4" class="text-center py-10 text-slate-400">
                                Belum ada data obat
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </main>

    </div>

</div>

<!-- MODAL TAMBAH OBAT -->
<div
    x-show="openModal"
    x-transition
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div
        @click.away="openModal = false"
        class="bg-white w-full max-w-lg rounded-3xl p-8 shadow-xl">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">
                Tambah Obat
            </h2>

            <button
                @click="openModal = false"
                class="text-slate-500 text-2xl">
                ×
            </button>
        </div>

        <form action="{{ route('obat.store') }}" method="POST">

            @csrf

            <div class="space-y-4">

                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Nama Obat
                    </label>

                    <input
                        type="text"
                        name="nama"
                        required
                        class="w-full border border-slate-300 rounded-xl px-4 py-3">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="3"
                        class="w-full border border-slate-300 rounded-xl px-4 py-3"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Harga
                    </label>

                    <input
                        type="number"
                        name="harga"
                        required
                        class="w-full border border-slate-300 rounded-xl px-4 py-3">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Stok
                    </label>

                    <input
                        type="number"
                        name="stok"
                        required
                        class="w-full border border-slate-300 rounded-xl px-4 py-3">
                </div>

            </div>

            <div class="flex justify-end gap-3 mt-8">

                <button
                    type="button"
                    @click="openModal = false"
                    class="px-5 py-3 rounded-xl border border-slate-300">
                    Batal
                </button>

                <button
                    type="submit"
                    class="px-5 py-3 rounded-xl bg-indigo-600 text-white font-semibold">
                    Simpan Obat
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>