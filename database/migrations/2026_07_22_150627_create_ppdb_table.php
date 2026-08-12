<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('ppdb', function (Blueprint $table) {
        $table->id();

        $table->string('judul');
        $table->text('deskripsi')->nullable();

        $table->text('jadwal')->nullable();
        $table->text('persyaratan')->nullable();
        $table->text('alur')->nullable();

        $table->string('kontak')->nullable();
        $table->string('email')->nullable();

        $table->enum('status', ['Buka', 'Tutup'])->default('Buka');

        $table->timestamps();
    });
}};
