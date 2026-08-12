<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('pendaftaran_ppdb', 'nik')) {
            Schema::table('pendaftaran_ppdb', function (Blueprint $table) {
                $table->dropColumn('nik');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('pendaftaran_ppdb', 'nik')) {
            Schema::table('pendaftaran_ppdb', function (Blueprint $table) {
                $table->string('nik')->nullable()->after('nomor_pendaftaran');
            });
        }
    }
};
