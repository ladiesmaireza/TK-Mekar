<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{

    public function index()
    {
        $berita = Berita::all();

        return view(
            'admin.berita.index',
            compact('berita')
        );
    }

    public function tampilBerita()
    {
        $berita = Berita::latest()
            ->paginate(6);

        return view('berita', compact('berita'));
    }


    public function create()
    {
        return view('admin.berita.create');
    }


    public function store(Request $request)
    {
        Berita::create($request->all());

        return redirect()->route('berita.index');
    }


    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view(
            'admin.berita.edit',
            compact('berita')
        );
    }


    public function update(Request $request, $id)
    {
        Berita::findOrFail($id)
            ->update($request->all());

        return redirect()->route('berita.index');
    }


    public function destroy($id)
    {
        Berita::destroy($id);

        return redirect()->route('berita.index');
    }
}
