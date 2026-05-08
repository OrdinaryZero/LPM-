<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rescues', function (Blueprint $table) {
            // Menambahkan kolom foto_kejadian yang hilang
            $table->string('foto_kejadian')->nullable()->after('deskripsi');
        });
    }

    public function down(): void
    {
        Schema::table('rescues', function (Blueprint $table) {
            $table->dropColumn('foto_kejadian');
        });
    }
};