<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{

    // ==========================
    // ADMIN - GALERI FOTO
    // ==========================
    public function index()
    {
        $galeri = Galeri::where('jenis', 'foto')
            ->latest()
            ->get();

        return view('admin.galeri.index', compact('galeri'));
    }



    // ==========================
    // FORM TAMBAH GALERI
    // ==========================
    public function create()
    {
        return view('admin.galeri.create');
    }



    // ==========================
    // SIMPAN GALERI FOTO
    // ==========================
    public function store(Request $request)
    {

        $request->validate([

            'judul' => 'required',

            'gambar' => 'required|
            image|
            mimes:jpg,jpeg,png|
            max:2048',

            'keterangan' => 'nullable'

        ]);



        $gambar = $request
            ->file('gambar')
            ->store('galeri', 'public');



        Galeri::create([

            'judul' => $request->judul,

            'jenis' => 'foto',

            'gambar' => $gambar,

            'keterangan' => $request->keterangan

        ]);



        return redirect()
            ->route('galeri.index')
            ->with(
                'success',
                'Foto berhasil ditambahkan'
            );
    }




    // ==========================
    // FORM EDIT
    // ==========================
    public function edit($id)
    {

        $galeri = Galeri::findOrFail($id);


        return view(
            'admin.galeri.edit',
            compact('galeri')
        );
    }




    // ==========================
    // UPDATE GALERI FOTO
    // ==========================
    public function update(Request $request, $id)
    {

        $galeri = Galeri::findOrFail($id);


        $request->validate([

            'judul' => 'required',

            'gambar' => 'nullable|
            image|
            mimes:jpg,jpeg,png|
            max:2048',

            'keterangan' => 'nullable'

        ]);



        $data = [

            'judul' => $request->judul,

            'jenis' => 'foto',

            'keterangan' => $request->keterangan

        ];



        if ($request->hasFile('gambar')) {


            if ($galeri->gambar) {

                Storage::disk('public')
                    ->delete($galeri->gambar);
            }



            $data['gambar'] =
                $request->file('gambar')
                ->store('galeri', 'public');
        }



        $galeri->update($data);



        return redirect()
            ->route('galeri.index')
            ->with(
                'success',
                'Foto berhasil diperbarui'
            );
    }





    // ==========================
    // HAPUS GALERI
    // ==========================
    public function destroy($id)
    {

        $galeri = Galeri::findOrFail($id);



        if ($galeri->gambar) {

            Storage::disk('public')
                ->delete($galeri->gambar);
        }



        $galeri->delete();



        return redirect()
            ->route('galeri.index')
            ->with(
                'success',
                'Foto berhasil dihapus'
            );
    }





    // ==========================
    // WEBSITE GALERI FOTO
    // ==========================
    public function foto()
    {
        $galeri = Galeri::where('jenis', 'foto')
            ->latest()
            ->paginate(6);

        return view('galeri.foto', compact('galeri'));
    }
}
