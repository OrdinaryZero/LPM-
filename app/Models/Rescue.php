<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rescue extends Model
{
        protected $fillable = [
    'kode_laporan',     // Baru
    'nama_pelapor', 
    'no_hp', 
    'jenis_kejadian', 
    'lokasi_kejadian', 
    'deskripsi', 
    'foto_kejadian',
    'status',           // Baru
    'foto_penanganan'   // Baru
    
];
}
