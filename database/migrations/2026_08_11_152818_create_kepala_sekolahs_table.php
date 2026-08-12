<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kepala_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepala_sekolah')->nullable();
            $table->text('sambutan')->nullable();
            $table->longText('sejarah')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kepala_sekolahs');
    }
};
