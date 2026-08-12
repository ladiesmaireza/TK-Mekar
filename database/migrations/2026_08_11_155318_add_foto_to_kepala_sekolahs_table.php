<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kepala_sekolahs', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('nama_kepala_sekolah');
        });
    }

    public function down(): void
    {
        Schema::table('kepala_sekolahs', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
