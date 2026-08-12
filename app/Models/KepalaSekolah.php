<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepalaSekolah extends Model
{
    protected $table = 'kepala_sekolahs';

    protected $fillable = [
        'nama_kepala_sekolah',
        'foto',
        'sambutan',
    ];
}
