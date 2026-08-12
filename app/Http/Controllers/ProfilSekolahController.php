<?php

namespace App\Http\Controllers;

use App\Models\KepalaSekolah;
use App\Models\Ppdb;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | WEBSITE PUBLIC
    |--------------------------------------------------------------------------
    */

    /**
     * Halaman profil sekolah
     */
    public function tampil()
    {
        $profil = ProfilSekolah::first();

        return view('profil.index', compact('profil'));
    }


    /**
     * Halaman sambutan kepala sekolah
     */
    public function sambutan()
    {
        $profil = ProfilSekolah::first();
        $kepalaSekolah = KepalaSekolah::first();
        $ppdb = Ppdb::first();

        return view(
            'profil.sambutan',
            compact('profil', 'kepalaSekolah', 'ppdb')
        );
    }


    /**
     * Halaman sejarah sekolah
     */
    public function sejarah()
    {
        $profil = ProfilSekolah::first();

        return view(
            'profil.sejarah',
            compact('profil')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - PROFIL SEKOLAH
    |--------------------------------------------------------------------------
    */

    /**
     * Menampilkan profil sekolah di admin
     */
    public function index()
    {
        $profil = ProfilSekolah::first();

        return view(
            'admin.profil.index',
            compact('profil')
        );
    }


    /**
     * Form tambah profil sekolah
     */
    public function create()
    {
        return view('admin.profil.create');
    }


    /**
     * Simpan profil sekolah
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',

            'alamat' => 'required|string|max:255',

            'telepon' => 'required|string|max:50',

            'email' => 'required|email|max:255',

            'sejarah' => 'required|string',

            'foto_sejarah' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'logo' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'foto_kepala_sekolah' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'sambutan_kepala_sekolah' =>
            'nullable|string',
        ]);


        /*
        |--------------------------------------------------------------------------
        | DATA TEXT
        |--------------------------------------------------------------------------
        */

        $data = $request->except([
            'logo',
            'foto_sejarah',
            'foto_kepala_sekolah',
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPLOAD LOGO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            $data['logo'] = $request
                ->file('logo')
                ->store('profil', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO SEJARAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto_sejarah')) {

            $data['foto_sejarah'] = $request
                ->file('foto_sejarah')
                ->store('profil/sejarah', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO KEPALA SEKOLAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto_kepala_sekolah')) {

            $data['foto_kepala_sekolah'] = $request
                ->file('foto_kepala_sekolah')
                ->store('profil/kepala-sekolah', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        ProfilSekolah::create($data);


        return redirect()
            ->route('profil.index')
            ->with(
                'success',
                'Profil sekolah berhasil ditambahkan.'
            );
    }


    /**
     * Form edit profil sekolah
     */
    public function edit($id)
    {
        $profil = ProfilSekolah::findOrFail($id);

        return view(
            'admin.profil.edit',
            compact('profil')
        );
    }


    /**
     * Update profil sekolah
     */
    public function update(Request $request, $id)
    {
        $profil = ProfilSekolah::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'nama_sekolah' =>
            'required|string|max:255',

            'alamat' =>
            'required|string|max:255',

            'telepon' =>
            'required|string|max:50',

            'email' =>
            'required|email|max:255',

            'sejarah' =>
            'required|string',

            'foto_sejarah' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'logo' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'foto_kepala_sekolah' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'sambutan_kepala_sekolah' =>
            'nullable|string',
        ]);


        /*
        |--------------------------------------------------------------------------
        | DATA TEXT
        |--------------------------------------------------------------------------
        */

        $data = $request->except([
            'logo',
            'foto_sejarah',
            'foto_kepala_sekolah',
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE LOGO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            if (
                $profil->logo &&
                Storage::disk('public')->exists($profil->logo)
            ) {
                Storage::disk('public')->delete(
                    $profil->logo
                );
            }

            $data['logo'] = $request
                ->file('logo')
                ->store('profil', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE FOTO SEJARAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto_sejarah')) {

            if (
                $profil->foto_sejarah &&
                Storage::disk('public')->exists(
                    $profil->foto_sejarah
                )
            ) {
                Storage::disk('public')->delete(
                    $profil->foto_sejarah
                );
            }

            $data['foto_sejarah'] = $request
                ->file('foto_sejarah')
                ->store(
                    'profil/sejarah',
                    'public'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE FOTO KEPALA SEKOLAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto_kepala_sekolah')) {

            if (
                $profil->foto_kepala_sekolah &&
                Storage::disk('public')->exists(
                    $profil->foto_kepala_sekolah
                )
            ) {
                Storage::disk('public')->delete(
                    $profil->foto_kepala_sekolah
                );
            }

            $data['foto_kepala_sekolah'] =
                $request
                ->file('foto_kepala_sekolah')
                ->store(
                    'profil/kepala-sekolah',
                    'public'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATABASE
        |--------------------------------------------------------------------------
        */

        $profil->update($data);


        return redirect()
            ->route('profil.index')
            ->with(
                'success',
                'Profil sekolah berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - SEJARAH SEKOLAH
    |--------------------------------------------------------------------------
    */

    /**
     * Halaman utama sejarah sekolah di admin
     */
    public function sejarahAdmin()
    {
        $profil = ProfilSekolah::first();

        return view(
            'admin.sejarah-sekolah.index',
            compact('profil')
        );
    }


    /**
     * Form edit sejarah sekolah
     */
    public function editSejarah()
    {
        $profil = ProfilSekolah::first();

        /*
        |--------------------------------------------------------------------------
        | CEK DATA
        |--------------------------------------------------------------------------
        */

        if (!$profil) {

            return redirect()
                ->route('profil.create')
                ->with(
                    'error',
                    'Data profil sekolah belum tersedia. Silakan tambahkan profil sekolah terlebih dahulu.'
                );
        }


        return view(
            'admin.sejarah-sekolah.edit',
            compact('profil')
        );
    }


    /**
     * Update sejarah sekolah
     */
    public function updateSejarah(Request $request)
    {
        $profil = ProfilSekolah::first();


        /*
        |--------------------------------------------------------------------------
        | CEK DATA
        |--------------------------------------------------------------------------
        */

        if (!$profil) {

            return redirect()
                ->route('profil.create')
                ->with(
                    'error',
                    'Data profil sekolah belum tersedia.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate(
            [
                'sejarah' => [
                    'required',
                    'string',
                ],

                'foto_sejarah' => [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'max:2048',
                ],
            ],
            [
                'sejarah.required' =>
                'Sejarah sekolah wajib diisi.',

                'foto_sejarah.image' =>
                'File harus berupa gambar.',

                'foto_sejarah.mimes' =>
                'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',

                'foto_sejarah.max' =>
                'Ukuran foto maksimal 2 MB.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | UPDATE TEKS SEJARAH
        |--------------------------------------------------------------------------
        */

        $profil->sejarah = $request->sejarah;


        /*
        |--------------------------------------------------------------------------
        | UPDATE FOTO SEJARAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto_sejarah')) {

            /*
            | Hapus foto lama
            */

            if (
                $profil->foto_sejarah &&
                Storage::disk('public')->exists(
                    $profil->foto_sejarah
                )
            ) {
                Storage::disk('public')->delete(
                    $profil->foto_sejarah
                );
            }


            /*
            | Simpan foto baru
            */

            $profil->foto_sejarah = $request
                ->file('foto_sejarah')
                ->store(
                    'profil/sejarah',
                    'public'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        $profil->save();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.sejarah-sekolah.index')
            ->with(
                'success',
                'Sejarah sekolah berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS PROFIL SEKOLAH
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $profil = ProfilSekolah::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | HAPUS LOGO
        |--------------------------------------------------------------------------
        */

        if (
            $profil->logo &&
            Storage::disk('public')->exists(
                $profil->logo
            )
        ) {
            Storage::disk('public')->delete(
                $profil->logo
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS FOTO SEJARAH
        |--------------------------------------------------------------------------
        */

        if (
            $profil->foto_sejarah &&
            Storage::disk('public')->exists(
                $profil->foto_sejarah
            )
        ) {
            Storage::disk('public')->delete(
                $profil->foto_sejarah
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS FOTO KEPALA SEKOLAH
        |--------------------------------------------------------------------------
        */

        if (
            $profil->foto_kepala_sekolah &&
            Storage::disk('public')->exists(
                $profil->foto_kepala_sekolah
            )
        ) {
            Storage::disk('public')->delete(
                $profil->foto_kepala_sekolah
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA
        |--------------------------------------------------------------------------
        */

        $profil->delete();


        return redirect()
            ->route('profil.index')
            ->with(
                'success',
                'Profil sekolah berhasil dihapus.'
            );
    }
}
