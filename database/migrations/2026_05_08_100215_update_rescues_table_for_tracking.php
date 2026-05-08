<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rescues', function (Blueprint $table) {
            // Cek dulu, kalau belum ada baru dibikin
            if (!Schema::hasColumn('rescues', 'kode_laporan')) {
                $table->string('kode_laporan')->unique()->nullable();
            }
            
            if (!Schema::hasColumn('rescues', 'status')) {
                $table->string('status')->default('Menunggu');
            }
            
            if (!Schema::hasColumn('rescues', 'foto_penanganan')) {
                $table->string('foto_penanganan')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('rescues', function (Blueprint $table) {
            $columns = [];
            if (Schema::hasColumn('rescues', 'kode_laporan')) $columns[] = 'kode_laporan';
            if (Schema::hasColumn('rescues', 'status')) $columns[] = 'status';
            if (Schema::hasColumn('rescues', 'foto_penanganan')) $columns[] = 'foto_penanganan';
            
            if (count($columns) > 0) {
                $table->dropColumn($columns);
            }
        });
    }
};