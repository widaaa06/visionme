<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionMe - Tambah Pasien</title>
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
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-8 lg:p-12">
                <div class="max-w-xl mx-auto bg-white p-8 rounded-[2rem] border border-slate-100 shadow-xl mt-10">
                    <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight mb-2">Registrasi Pasien Baru</h1>
                    <p class="text-slate-500 text-sm mb-6">Buat akun agar pasien bisa masuk ke aplikasi mobile VisionMe.</p>

                    <form action="{{ route('pasien.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nama Lengkap</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 transition text-sm text-slate-800">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Alamat Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 transition text-sm text-slate-800">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Password Akun</label>
                            <input type="password" name="password" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 transition text-sm text-slate-800" placeholder="Minimal 6 karakter">
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                            <a href="{{ route('pasien.index') }}" class="text-sm font-semibold text-slate-400 hover:text-slate-600 px-4 py-2">Batal</a>
                            <button type="submit" class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white font-bold px-6 py-3 rounded-xl shadow-md hover:opacity-95 transition text-sm">Simpan Pasien</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>