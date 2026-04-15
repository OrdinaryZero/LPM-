<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $fillable = ['nama_pemohon', 'no_hp', 'lokasi_jemput', 'kondisi_pasien', 'status'];

}
