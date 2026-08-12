<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{

    // ADMIN - tampil data struktur organisasi
    public function index()
    {
        $struktur = StrukturOrganisasi::all();

        return view('admin.struktur-organisasi.index', compact('struktur'));
    }


    // HALAMAN PUBLIK
    public function tampil()
    {
        $struktur = StrukturOrganisasi::all();

        return view('struktur', compact('struktur'));
    }


    // FORM TAMBAH ADMIN
    public function create()
    {
        return view('admin.struktur-organisasi.create');
    }


    // SIMPAN DATA
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);


        $foto = null;


        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')
                ->store('struktur', 'public');

        }


        StrukturOrganisasi::create([

            'nama' => $request->nama,

            'jabatan' => $request->jabatan,

            'foto' => $foto

        ]);


        return redirect()
            ->route('struktur-organisasi.index')
            ->with('success','Data struktur berhasil ditambahkan');

    }



    // FORM EDIT
    public function edit($id)
    {

        $struktur = StrukturOrganisasi::findOrFail($id);


        return view(
            'admin.struktur-organisasi.edit',
            compact('struktur')
        );

    }




    // UPDATE DATA
    public function update(Request $request, $id)
    {

        $struktur = StrukturOrganisasi::findOrFail($id);


        $request->validate([

            'nama' => 'required',

            'jabatan' => 'required',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);



        $data = [

            'nama' => $request->nama,

            'jabatan' => $request->jabatan

        ];



        if ($request->hasFile('foto')) {


            // hapus foto lama
            if ($struktur->foto && Storage::disk('public')->exists($struktur->foto)) {

                Storage::disk('public')->delete($struktur->foto);

            }


            $data['foto'] = $request->file('foto')
                ->store('struktur','public');

        }



        $struktur->update($data);



        return redirect()
            ->route('struktur-organisasi.index')
            ->with('success','Data struktur berhasil diperbarui');

    }





    // HAPUS DATA
    public function destroy($id)
    {

        $struktur = StrukturOrganisasi::findOrFail($id);



        if ($struktur->foto && Storage::disk('public')->exists($struktur->foto)) {

            Storage::disk('public')->delete($struktur->foto);

        }



        $struktur->delete();



        return redirect()
            ->route('struktur-organisasi.index')
            ->with('success','Data struktur berhasil dihapus');

    }

}
