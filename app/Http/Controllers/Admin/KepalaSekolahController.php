<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KepalaSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KepalaSekolahController extends Controller
{
    /**
     * Menampilkan data Kepala Sekolah
     */
    public function index()
    {
        $kepalaSekolah = KepalaSekolah::first();

        return view(
            'admin.kepala-sekolah.index',
            compact('kepalaSekolah')
        );
    }

    /**
     * Menampilkan form edit
     */
    public function edit()
    {
        $kepalaSekolah = KepalaSekolah::first();

        if (!$kepalaSekolah) {
            $kepalaSekolah = KepalaSekolah::create([
                'nama_kepala_sekolah' => null,
                'foto' => null,
                'sambutan' => null,
            ]);
        }

        return view(
            'admin.kepala-sekolah.edit',
            compact('kepalaSekolah')
        );
    }

    /**
     * Menyimpan perubahan data Kepala Sekolah
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_kepala_sekolah' => 'required|string|max:255',

            'foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'sambutan' => 'nullable|string',
        ], [
            'nama_kepala_sekolah.required' =>
            'Nama kepala sekolah wajib diisi.',

            'foto.image' =>
            'File yang dipilih harus berupa gambar.',

            'foto.mimes' =>
            'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',

            'foto.max' =>
            'Ukuran foto maksimal 2 MB.',
        ]);

        $kepalaSekolah = KepalaSekolah::first();

        if (!$kepalaSekolah) {
            $kepalaSekolah = new KepalaSekolah();
        }

        /*
        |--------------------------------------------------------------------------
        | DATA TEXT
        |--------------------------------------------------------------------------
        */

        $kepalaSekolah->nama_kepala_sekolah =
            $request->nama_kepala_sekolah;

        $kepalaSekolah->sambutan =
            $request->sambutan;

        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if (
                $kepalaSekolah->foto &&
                Storage::disk('public')->exists(
                    $kepalaSekolah->foto
                )
            ) {
                Storage::disk('public')->delete(
                    $kepalaSekolah->foto
                );
            }

            // Simpan foto baru
            $kepalaSekolah->foto =
                $request->file('foto')->store(
                    'kepala-sekolah',
                    'public'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        $kepalaSekolah->save();

        return redirect()
            ->route('admin.kepala-sekolah.index')
            ->with(
                'success',
                'Data kepala sekolah berhasil diperbarui.'
            );
    }
}
