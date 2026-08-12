<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;

class ProfilController extends Controller
{
    public function sambutan()
    {
        $profil = ProfilSekolah::first();

        return view('profil.sambutan', compact('profil'));
    }

    public function index()
    {
        $profil = ProfilSekolah::first();

        return view('admin.profil.index', compact('profil'));
    }
}
