<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{

    // HALAMAN PUBLIK
    public function tampil()
    {
        $visi = VisiMisi::first();

        return view('visi-misi', compact('visi'));
    }



    // HALAMAN ADMIN
    public function index()
    {
        $visi = VisiMisi::all();

        return view('admin.visi_misi.index', compact('visi'));
    }


    public function create()
    {
        return view('admin.visi_misi.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'visi' => 'required',
            'misi' => 'required'
        ]);


        VisiMisi::create($request->all());


        return redirect()
            ->route('visi-misi.index')
            ->with('success','Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        $visi = VisiMisi::findOrFail($id);

        return view('admin.visi_misi.edit', compact('visi'));
    }



    public function update(Request $request,$id)
    {

        $visi = VisiMisi::findOrFail($id);


        $visi->update($request->all());


        return redirect()
            ->route('visi-misi.index')
            ->with('success','Data berhasil diperbarui');

    }



    public function destroy($id)
    {

        VisiMisi::destroy($id);


        return redirect()
            ->route('visi-misi.index')
            ->with('success','Data berhasil dihapus');

    }

}
