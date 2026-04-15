<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    // Tambahkan baris ini agar data boleh dimasukkan ke database
    protected $fillable = ['nama_warga', 'no_rumah', 'kategori', 'deskripsi_laporan', 'status'];
}