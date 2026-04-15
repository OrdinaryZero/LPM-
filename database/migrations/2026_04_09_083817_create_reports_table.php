<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->string('nama_warga');
        $table->string('no_rumah');
        $table->string('kategori'); // Keamanan, Kebersihan, Fasilitas, dll
        $table->text('deskripsi_laporan');
        $table->string('status')->default('Menunggu Diproses');
        $table->timestamps();
    });
}
};
