<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Kolom email sudah ada di tabel orang_tua.
        // Migration ini sengaja dikosongkan agar tidak menambahkan
        // kolom email untuk kedua kalinya.
    }

    public function down(): void
    {
        // Tidak melakukan apa-apa karena kolom email
        // bukan dibuat oleh migration ini pada database saat ini.
    }
};
