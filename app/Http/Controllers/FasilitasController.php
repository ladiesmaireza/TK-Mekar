<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Menampilkan daftar fasilitas di halaman admin
     */
    public function index()
    {
        $fasilitas = Fasilitas::latest()->get();

        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Menampilkan fasilitas di halaman pengunjung
     */
    public function tampilFasilitas()
    {
        $fasilitas = Fasilitas::latest()->get();

        return view('fasilitas', compact('fasilitas'));
    }

    /**
     * Form tambah fasilitas
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    /**
     * Simpan data fasilitas
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'gambar'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_fasilitas.required' => 'Nama fasilitas wajib diisi.',
            'deskripsi.required'      => 'Deskripsi fasilitas wajib diisi.',
            'gambar.required'         => 'Gambar fasilitas wajib diupload.',
            'gambar.image'            => 'File harus berupa gambar.',
            'gambar.mimes'            => 'Format gambar harus JPG, JPEG, atau PNG.',
            'gambar.max'              => 'Ukuran gambar maksimal 2 MB.',
        ]);

        // Upload gambar ke storage/app/public/fasilitas
        $gambar = $request->file('gambar')->store('fasilitas', 'public');

        // Simpan data ke database
        Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'deskripsi'      => $request->deskripsi,
            'gambar'         => $gambar,
        ]);

        return redirect()
            ->route('fasilitas.index')
            ->with('success', 'Data fasilitas berhasil ditambahkan.');
    }
    /**
     * Form edit fasilitas
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update data fasilitas
     */
    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {

            if ($fasilitas->gambar && Storage::disk('public')->exists($fasilitas->gambar)) {
                Storage::disk('public')->delete($fasilitas->gambar);
            }

            $gambar = $request->file('gambar')->store('fasilitas', 'public');
        } else {
            $gambar = $fasilitas->gambar;
        }

        $fasilitas->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'deskripsi'      => $request->deskripsi,
            'gambar'         => $gambar,
        ]);

        return redirect()->route('fasilitas.index')
            ->with('success', 'Data fasilitas berhasil diperbarui.');
    }

    /**
     * Hapus fasilitas
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        if ($fasilitas->gambar && Storage::disk('public')->exists($fasilitas->gambar)) {
            Storage::disk('public')->delete($fasilitas->gambar);
        }

        $fasilitas->delete();

        return redirect()->route('fasilitas.index')
            ->with('success', 'Data fasilitas berhasil dihapus.');
    }
}
