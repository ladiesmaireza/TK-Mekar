<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('profil_sekolah', 'foto_sejarah')) {
            Schema::table('profil_sekolah', function (Blueprint $table) {
                $table->string('foto_sejarah')->nullable()->after('sejarah');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('profil_sekolah', 'foto_sejarah')) {
            Schema::table('profil_sekolah', function (Blueprint $table) {
                $table->dropColumn('foto_sejarah');
            });
        }
    }
};
