<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Galeri;

class BerandaController extends Controller
{
public function index()
{
    // Hanya ambil 4 orang yang kategorinya 'Pengurus'
    $pengurus = Petugas::where('kategori_petugas', 'Pengurus')->take(4)->get();

    // Data Armada tetap sama
    $armada = Galeri::where('kategori', 'Armada')->latest()->take(6)->get();

    return view('beranda', compact('pengurus', 'armada'));
}
}