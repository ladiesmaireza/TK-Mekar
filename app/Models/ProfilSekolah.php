<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    use HasFactory;

    protected $table = 'profil_sekolah';

    protected $fillable = [
        'nama_sekolah',
        'alamat',
        'telepon',
        'email',
        'sejarah',
        'foto_sejarah',
        'logo',
        'foto_kepala_sekolah',
        'sambutan_kepala_sekolah',
    ];
}
