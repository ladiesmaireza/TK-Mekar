<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class OrangTua extends Authenticatable
{
    use Notifiable;

    protected $table = 'orang_tua';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_hp',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function pendaftaran()
    {
        return $this->hasMany(
            Pendaftaran::class,
            'orang_tua_id'
        );
    }
}
