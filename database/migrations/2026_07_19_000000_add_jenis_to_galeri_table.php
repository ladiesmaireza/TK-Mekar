<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom jenis pada tabel galeri
     */
    public function up(): void
    {
        Schema::table('galeri', function (Blueprint $table) {

            $table->enum('jenis', ['foto'])
                  ->after('gambar');

        });
    }

    /**
     * Hapus kolom jenis jika rollback
     */
    public function down(): void
    {
        Schema::table('galeri', function (Blueprint $table) {

            $table->dropColumn('jenis');

        });
    }
};
