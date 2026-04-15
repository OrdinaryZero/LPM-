<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rescue extends Model
{
        protected $fillable = ['nama_pelapor', 'no_hp', 'jenis_kejadian', 'lokasi_kejadian', 'deskripsi', 'foto', 'status'];
}
