@extends('dashboard')

@section('content')

@if(session('success'))
<div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl">
    {{ session('success') }}
</div>
@endif

<div class="flex items-center justify-between mb-8">

    <div>
        <h1 class="text-3xl font-bold text-slate-800">
            Data Obat
        </h1>

        <p class="text-slate-500 mt-1">
            Kelola seluruh data obat pada sistem VisionMe.
        </p>
    </div>

    <button
        @click="openModal=true"
        class="px-5 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition">
        + Tambah Obat
    </button>

</div>

<div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">

    <div class="px-6 py-4 border-b border-slate-100">
        <h3 class="font-bold text-slate-800">
            Daftar Obat
        </h3>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Gambar
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Nama Obat
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Deskripsi
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Harga
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">
                        Stok
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase">
                        Aksi
                    </th>
                </tr>
            </thead>

            <tbody>

                @forelse($obats as $obat)

                <tr class="border-t border-slate-100 hover:bg-slate-50 transition">

                    <td class="px-6 py-4">

                        @if($obat->gambar)

                        <img
                            src="{{ asset('storage/'.$obat->gambar) }}"
                            class="w-14 h-14 rounded-xl object-cover border border-slate-200">

                        @else

                        <div class="w-14 h-14 rounded-xl bg-slate-100 flex items-center justify-center text-xs text-slate-400">
                            No Image
                        </div>

                        @endif

                    </td>

                    <td class="px-6 py-4 font-semibold text-slate-800">
                        {{ $obat->nama }}
                    </td>

                    <td class="px-6 py-4 text-slate-500 max-w-xs truncate">
                        {{ $obat->deskripsi }}
                    </td>

                    <td class="px-6 py-4 font-semibold text-emerald-600">
                        Rp {{ number_format($obat->harga,0,',','.') }}
                    </td>

                    <td class="px-6 py-4">

                        <span class="bg-blue-50 text-blue-600 border border-blue-100 text-[10px] font-bold px-3 py-1 rounded-full">
                            {{ $obat->stok }}
                        </span>

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <form action="{{ route('obat.kurangiStok',$obat->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button
                                    class="px-3 py-1 bg-slate-100 hover:bg-slate-200 rounded-lg font-bold">
                                    -
                                </button>
                            </form>

                            <form action="{{ route('obat.tambahStok',$obat->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button
                                    class="px-3 py-1 bg-slate-100 hover:bg-slate-200 rounded-lg font-bold">
                                    +
                                </button>
                            </form>

                            <form action="{{ route('obat.destroy',$obat->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Hapus obat ini?')"
                                    class="px-3 py-1 bg-rose-50 text-rose-600 border border-rose-100 rounded-lg">
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center py-10 text-slate-500">
                        Belum ada data obat.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection