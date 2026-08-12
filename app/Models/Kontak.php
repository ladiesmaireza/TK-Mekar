<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak';

    protected $fillable = [
        'alamat',
        'nomor_telepon',
        'email',
        'media_sosial',
    ];

    protected $casts = [
        'media_sosial' => 'array',
    ];
}
