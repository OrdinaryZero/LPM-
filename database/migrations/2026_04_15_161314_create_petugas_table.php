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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan'); // Contoh: Komandan Regu, Paramedis, Supir
            $table->string('no_hp');
            $table->string('status_jaga')->default('Off'); // Contoh: Aktif / Off
            $table->string('foto')->nullable(); // Foto petugas (bisa kosong)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
