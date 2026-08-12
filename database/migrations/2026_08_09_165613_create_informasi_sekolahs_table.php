<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('informasi_sekolah', function (Blueprint $table) {

            $table->id();

            $table->string('judul');

            $table->text('isi');

            $table->string('penerima')->default('semua');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informasi_sekolah');
    }
};
