<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PUBLIC
    |--------------------------------------------------------------------------
    */

    public function tampilKontak()
    {
        $kontak = Kontak::first();

        return view('kontak', compact('kontak'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $kontak = Kontak::first();

        return view('admin.kontak.index', compact('kontak'));
    }

    public function create()
    {
        return view('admin.kontak.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        $mediaSosial = [
            'facebook' => $validated['facebook'] ?? null,
            'instagram' => $validated['instagram'] ?? null,
        ];

        Kontak::create([
            'alamat' => $validated['alamat'],
            'nomor_telepon' => $validated['nomor_telepon'],
            'email' => $validated['email'],
            'media_sosial' => $mediaSosial,
        ]);

        return redirect()
            ->route('kontak.index')
            ->with('success', 'Data kontak berhasil ditambahkan.');
    }

    public function show(Kontak $kontak)
    {
        return view('admin.kontak.show', compact('kontak'));
    }

    public function edit(Kontak $kontak)
    {
        /*
        | media_sosial sudah berupa array karena
        | model Kontak menggunakan cast array.
        */
        $mediaSosial = $kontak->media_sosial ?? [];

        return view(
            'admin.kontak.edit',
            compact('kontak', 'mediaSosial')
        );
    }

    public function update(Request $request, Kontak $kontak)
    {
        $validated = $request->validate([
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        $mediaSosial = [
            'facebook' => $validated['facebook'] ?? null,
            'instagram' => $validated['instagram'] ?? null,
        ];

        $kontak->update([
            'alamat' => $validated['alamat'],
            'nomor_telepon' => $validated['nomor_telepon'],
            'email' => $validated['email'],
            'media_sosial' => $mediaSosial,
        ]);

        return redirect()
            ->route('kontak.index')
            ->with('success', 'Data kontak berhasil diperbarui.');
    }

    public function destroy(Kontak $kontak)
    {
        $kontak->delete();

        return redirect()
            ->route('kontak.index')
            ->with('success', 'Data kontak berhasil dihapus.');
    }
}
