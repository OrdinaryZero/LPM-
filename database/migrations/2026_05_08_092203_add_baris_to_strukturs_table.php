<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('strukturs', function (Blueprint $table) {
            // Tambahkan kolom baris, default di baris 1
            $table->integer('baris')->default(1)->after('urutan');
        });
    }

    public function down(): void
    {
        Schema::table('strukturs', function (Blueprint $table) {
            $table->dropColumn('baris');
        });
    }
};