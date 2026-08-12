<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Fasilitas;
use App\Models\ProfilSekolah;
use App\Models\VisiMisi;
use App\Models\StrukturOrganisasi;

class HomeController extends Controller
{
    public function index()
    {
        $ppdb = Ppdb::first();

        $profil = ProfilSekolah::first();

        $visiMisi = VisiMisi::first();

        $guru = Guru::all();

        $fasilitas = Fasilitas::all();

        $galeri = Galeri::latest()->take(6)->get();

        $berita = Berita::latest()->take(3)->get();

        $struktur = StrukturOrganisasi::first();

        return view('home', compact(
            'ppdb',
            'profil',
            'visiMisi',								
            'guru',
            'fasilitas',
            'galeri',
            'berita',
            'struktur'
        ));
    }
}
