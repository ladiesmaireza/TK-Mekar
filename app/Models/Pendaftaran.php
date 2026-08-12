<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran_ppdb';

    protected $fillable = [
        'orang_tua_id',
        'nomor_pendaftaran',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_ayah',
        'nama_ibu',
        'nomor_hp',
        'alamat',
        'akta_kelahiran',
        'kartu_keluarga',
        'ktp_orang_tua',
        'ijazah_paud',
        'pas_foto',
        'status',
    ];

    /**
     * Relasi ke data orang tua.
     */
    public function orangTua()
    {
        return $this->belongsTo(
            OrangTua::class,
            'orang_tua_id'
        );
    }
}
