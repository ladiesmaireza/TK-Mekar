<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Guru;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\StrukturOrganisasi;


class DashboardController extends Controller
{

    public function index()
    {


        return view('admin.dashboard',[

            'jumlahGuru' => Guru::count(),


            'jumlahFoto' => Galeri::where('jenis','foto')->count(),


            'jumlahBerita' => Berita::count(),


            'jumlahStruktur' => StrukturOrganisasi::count(),


        ]);


    }

}
