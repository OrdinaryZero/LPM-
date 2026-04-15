<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up(): void
{
    Schema::create('laporans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_warga');
        $table->string('no_rumah');
        $table->string('kategori');
        $table->text('deskripsi_laporan');
        $table->string('status')->default('Menunggu'); 
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
