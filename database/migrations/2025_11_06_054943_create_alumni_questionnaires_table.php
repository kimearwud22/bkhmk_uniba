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
        Schema::create('alumni_questionnaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Kolom Detail Kuesioner (Dipisah per pertanyaan)
            $table->string('masa_kerja')->nullable(); 
            $table->string('masa_tunggu')->nullable();
            $table->string('provinsi_kerja')->nullable();
            $table->string('kabupaten_kerja')->nullable();
            $table->string('instansi_kerja')->nullable();
            $table->integer('gaji_utama')->default(0);
            $table->integer('gaji_lembur')->default(0);
            $table->integer('gaji_lainnya')->default(0);
            $table->string('sumber_dana')->nullable();
            $table->string('status_bekerja')->nullable();
            $table->string('keterangan_pekerjaan')->nullable();
            $table->string('hubungan_studi')->nullable();
            $table->string('tingkat_pendidikan_sesuai')->nullable();
            $table->integer('pendapatan_utama')->default(0);
            $table->integer('pendapatan_lembur')->default(0);
            $table->integer('pendapatan_lainnya')->default(0);
            $table->string('waktu_kerja_detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_questionnaires');
    }
};
