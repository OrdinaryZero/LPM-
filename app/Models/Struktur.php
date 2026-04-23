<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    protected $fillable = ['parent_id', 'nama', 'jabatan', 'foto_nomer', 'urutan'];

    // Relasi ke bawahan (anak)
    public function bawahan()
    {
        return $this->hasMany(Struktur::class, 'parent_id')->orderBy('urutan');
    }

    // Relasi ke atasan (induk)
    public function atasan()
    {
        return $this->belongsTo(Struktur::class, 'parent_id');
    }
}