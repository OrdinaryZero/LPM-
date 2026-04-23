<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('strukturs', function (Blueprint $table) {
            $table->id();
            // parent_id digunakan untuk menentukan atasan (membuat Family Tree)
            $table->foreignId('parent_id')->nullable()->constrained('strukturs')->onDelete('cascade');
            $table->string('nama')->nullable();
            $table->string('jabatan');
            $table->string('foto_nomer')->default('1'); // Menyimpan angka 1 - 36
            $table->integer('urutan')->default(0); // Untuk mengurutkan divisi sejajar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('strukturs');
    }
};