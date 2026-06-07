<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    /**
     * Menampilkan daftar obat
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $obats = Obat::when($search, function ($query) use ($search) {
            $query->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
        })
        ->latest()
        ->paginate(10);

        return view('obat.index', compact('obats'));
    }

    /**
     * Simpan obat baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
            'harga'      => 'required|numeric|min:0',
            'stok'       => 'required|integer|min:0',
            'gambar'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request
                ->file('gambar')
                ->store('obat', 'public');
        }

        Obat::create($data);

        return redirect()
            ->route('obat.index')
            ->with('success', 'Obat berhasil ditambahkan');
    }

    /**
     * Update data obat
     */
    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $request->validate([
            'nama'       => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
            'harga'      => 'required|numeric|min:0',
            'stok'       => 'required|integer|min:0',
            'gambar'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($obat->gambar &&
                Storage::disk('public')->exists($obat->gambar)) {

                Storage::disk('public')->delete($obat->gambar);
            }

            $data['gambar'] = $request
                ->file('gambar')
                ->store('obat', 'public');
        }

        $obat->update($data);

        return redirect()
            ->route('obat.index')
            ->with('success', 'Obat berhasil diperbarui');
    }

    /**
     * Hapus obat
     */
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);

        // Hapus file gambar
        if ($obat->gambar &&
            Storage::disk('public')->exists($obat->gambar)) {

            Storage::disk('public')->delete($obat->gambar);
        }

        $obat->delete();

        return redirect()
            ->route('obat.index')
            ->with('success', 'Obat berhasil dihapus');
    }

    /**
     * Tambah stok
     */
    public function tambahStok($id)
    {
        $obat = Obat::findOrFail($id);

        $obat->increment('stok', 1);

        return redirect()
            ->back()
            ->with('success', 'Stok berhasil ditambah');
    }

    /**
     * Kurangi stok
     */
    public function kurangiStok($id)
    {
        $obat = Obat::findOrFail($id);

        if ($obat->stok > 0) {
            $obat->decrement('stok', 1);
        }

        return redirect()
            ->back()
            ->with('success', 'Stok berhasil dikurangi');
    }

    /**
     * Form edit (opsional)
     */
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);

        return view('obat.edit', compact('obat'));
    }

    /**
     * Detail obat (opsional)
     */
    public function show($id)
    {
        $obat = Obat::findOrFail($id);

        return view('obat.show', compact('obat'));
    }
}