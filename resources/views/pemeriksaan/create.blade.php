<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionMe - Input Hasil Pemeriksaan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body class="antialiased">

    <div class="max-w-2xl mx-auto my-12 p-8 bg-white rounded-[2rem] border border-slate-100 shadow-xl">
        <div class="mb-8">
            <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 flex items-center gap-1 mb-2">
                &larr; Kembali ke Dashboard
            </a>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Input Hasil Pemeriksaan Mata</h1>
            <p class="text-slate-500 text-sm mt-1">Masukkan data hasil tes diagnostik mata pasien secara akurat.</p>
        </div>

        <form action="{{ route('pemeriksaan.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Pasien/User</label>
                <select name="user_id" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-500 outline-none text-sm transition" required>
                    <option value="">-- Pilih Pasien --</option>
                    @foreach($pasiens as $pasien)
                        <option value="{{ $pasien->id }}">{{ $pasien->name }} ({{ $pasien->email }})</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Kategori Pemeriksaan</label>
                <select name="kategori_uji" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-500 outline-none text-sm transition" required>
                    <option value="Snellen Chart">Snellen Chart (Ketajaman Penglihatan)</option>
                    <option value="Buta Warna">Tes Ishihara (Buta Warna)</option>
                    <option value="Astigmatisme">Tes Astigmatisme (Silinder)</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Hasil Pengukuran</label>
                <input type="text" name="hasil_pengukuran" placeholder="Contoh: OD: 20/20, OS: 20/40 atau Skor: 13/14" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-500 outline-none text-sm transition" required>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Status Medis</label>
                <select name="status_medis" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-500 outline-none text-sm transition" required>
                    <option value="Normal">Normal</option>
                    <option value="Miopi (Rabun Jauh)">Miopi (Rabun Jauh)</option>
                    <option value="Hipermetropi (Rabun Dekat)">Hipermetropi (Rabun Dekat)</option>
                    <option value="Astigmatisme (Silinder)">Astigmatisme (Silinder)</option>
                    <option value="Buta Warna Parsial">Buta Warna Parsial</option>
                    <option value="Buta Warna Total">Buta Warna Total</option>
                </select>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-blue-500 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-500/20 hover:opacity-95 transition cursor-pointer text-sm">
                    Simpan Hasil Pemeriksaan
                </button>
            </div>
        </form>
    </div>

</body>
</html>