<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    // Pastikan 'kategori_petugas' masuk ke sini!
    protected $fillable = [
        'nama', 
        'jabatan', 
        'no_hp', 
        'foto', 
        'status_jaga', 
        'kategori_petugas'
    ];
}