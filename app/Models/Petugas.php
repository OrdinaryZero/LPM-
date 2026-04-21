<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'jabatan', 
        'no_hp', 
        'foto', 
        'status_jaga', 
        'kategori_petugas'
    ];
}