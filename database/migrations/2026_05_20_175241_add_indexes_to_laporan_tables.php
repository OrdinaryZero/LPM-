<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Menambahkan daftar isi di tabel rescues
        // (Pastikan nama tabelmu 'rescues', jika di phpMyAdmin namamu 'rescue', hapus huruf 's' nya)
        Schema::table('rescues', function (Blueprint $table) {
            $table->index('status');
            $table->index('kode_laporan'); // Sering dicari warga saat tracking tiket
        });

        // 2. Menambahkan daftar isi di tabel aspirasis
        // (Pastikan nama tabelmu 'aspirasis', sesuaikan jika berbeda)
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->index('status');
            $table->index('kategori'); // Sering dipakai untuk filter/grafik
        });
    }

    public function down(): void
    {
        // Fungsi untuk membatalkan (rollback) daftar isi
        Schema::table('rescues', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['kode_laporan']);
        });

        Schema::table('aspirasis', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['kategori']);
        });
    }
};