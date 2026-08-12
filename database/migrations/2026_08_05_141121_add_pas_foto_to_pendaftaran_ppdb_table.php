<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftaran_ppdb', function (Blueprint $table) {
            $table->string('pas_foto')->nullable()->after('ijazah_paud');
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran_ppdb', function (Blueprint $table) {
            $table->dropColumn('pas_foto');
        });
    }
};
