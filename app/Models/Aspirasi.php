<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;
protected $fillable = [
        'nama', 
        'no_hp', 
        'kategori', // Jika di database nama kolomnya 'judul', ganti jadi 'judul'
        'pesan', 
        'status'
    ];}