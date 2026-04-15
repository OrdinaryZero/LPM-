<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    // Tabel untuk Ambulance 24 Jam
    Schema::create('ambulances', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pemohon');
        $table->string('no_hp');
        $table->text('lokasi_jemput');
        $table->string('kondisi_pasien');
        $table->string('status')->default('Menunggu'); 
        $table->timestamps();
    });

    // Tabel untuk Rescue / Darurat
    Schema::create('rescues', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pelapor');
        $table->string('no_hp');
        $table->string('jenis_kejadian');
        $table->text('lokasi_kejadian');
        $table->text('deskripsi');
        $table->string('foto')->nullable();
        $table->string('status')->default('Proses');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lpm_tables');
    }
};
