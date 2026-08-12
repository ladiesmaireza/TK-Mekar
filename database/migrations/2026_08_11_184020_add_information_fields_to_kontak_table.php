<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kontak', function (Blueprint $table) {
            $table->string('jam_kantor')->nullable()->after('email');
            $table->string('jam_sekolah')->nullable()->after('jam_kantor');
            $table->string('facebook')->nullable()->after('jam_sekolah');
            $table->string('instagram')->nullable()->after('facebook');
        });
    }

    public function down(): void
    {
        Schema::table('kontak', function (Blueprint $table) {
            $table->dropColumn([
                'jam_kantor',
                'jam_sekolah',
                'facebook',
                'instagram',
            ]);
        });
    }
};
