<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ambulances', function (Blueprint $table) {
            // Kode unik untuk warga nge-track laporan
            $table->string('kode_laporan')->unique()->after('id')->nullable();
            
            // Kategori untuk memilah arah WhatsApp Fonnte
            $table->string('kategori_laporan')->default('Darurat')->after('kode_laporan');
            
            // Foto bukti saat laporan berstatus "Selesai" (Fitur 6)
            $table->string('foto_penanganan')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('ambulances', function (Blueprint $table) {
            $table->dropColumn(['kode_laporan', 'kategori_laporan', 'foto_penanganan']);
        });
    }
};