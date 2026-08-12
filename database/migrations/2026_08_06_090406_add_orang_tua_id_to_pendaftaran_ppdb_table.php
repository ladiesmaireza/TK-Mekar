<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('pendaftaran_ppdb', function (Blueprint $table) {

            $table->string('nomor_pendaftaran')
                ->unique()
                ->after('orang_tua_id');
        });
    }


    public function down(): void
    {
        Schema::table('pendaftaran_ppdb', function (Blueprint $table) {

            $table->dropColumn('nomor_pendaftaran');
        });
    }
};
