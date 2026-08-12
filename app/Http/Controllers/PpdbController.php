<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    // ===========================
    // ADMIN
    // ===========================

    public function index()
    {
        $ppdb = Ppdb::all();

        return view('admin.ppdb.index', compact('ppdb'));
    }

    public function create()
    {
        return view('admin.ppdb.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'judul' => 'required',
            'deskripsi' => 'required',
            'jadwal' => 'required',
            'persyaratan' => 'required',
            'alur' => 'required',
            'kontak' => 'required',
            'email' => 'required',
            'status' => 'required',

        ]);


        Ppdb::create([

            'judul' => $request->judul,

            'deskripsi' => $request->deskripsi,

            'jadwal' => $request->jadwal,

            'persyaratan' => $request->persyaratan,

            'alur' => $request->alur,

            'kontak' => $request->kontak,

            'email' => $request->email,

            'status' => $request->status,

        ]);


        return redirect()
            ->route('ppdb.index')
            ->with('success', 'Data PPDB berhasil ditambahkan');
    }
    public function show($id)
    {
        $ppdb = Ppdb::findOrFail($id);

        return view('admin.ppdb.show', compact('ppdb'));
    }

    public function edit($id)
    {
        $ppdb = Ppdb::findOrFail($id);

        return view('admin.ppdb.edit', compact('ppdb'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $ppdb = Ppdb::findOrFail($id);

        $ppdb->update($request->all());

        return redirect()
            ->route('ppdb.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        Ppdb::destroy($id);

        return redirect()
            ->route('ppdb.index')
            ->with('success', 'Data berhasil dihapus');
    }

    // ===========================
    // WEBSITE
    // ===========================

    public function tampil()
    {
        $ppdb = Ppdb::first();

        return view('ppdb', compact('ppdb'));
    }
}
