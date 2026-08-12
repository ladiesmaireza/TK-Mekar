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
        Schema::create('pendaftaran_ppdb', function (Blueprint $table) {

            $table->id();

            // Data Anak
            $table->string('nama_lengkap');
            $table->string('nik')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');

            $table->enum('jenis_kelamin', [
                'Laki-laki',
                'Perempuan'
            ]);

            // Data Orang Tua
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('nik_ayah')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nomor_hp');

            // Alamat
            $table->text('alamat');

            // Upload Dokumen
            $table->string('akta_kelahiran');
            $table->string('kartu_keluarga');
            $table->string('ktp_orang_tua');

            // Ijazah PAUD (Jika Ada)
            $table->string('ijazah_paud')->nullable();

            // Status Pendaftaran
            $table->enum('status', [
                'Menunggu',
                'Diterima',
                'Ditolak'
            ])->default('Menunggu');


            $table->timestamps();

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_ppdb');
    }

};
