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
public function liveReport()
    {
        // 1. Hitung Statistik Real-time
        $totalAmbulance = \App\Models\Ambulance::count();
        $menunggu = \App\Models\Ambulance::where('status', 'Menunggu')->count();
        $diproses = \App\Models\Ambulance::where('status', 'Diproses')->count();
        $selesai = \App\Models\Ambulance::where('status', 'Selesai')->count();

        // 2. Ambil Log Laporan (Bikin halaman / pagination 15 data per page)
        $laporan = \App\Models\Ambulance::latest()->paginate(15);

        // 3. Lempar datanya ke view 'live-report.blade.php'
        return view('live-report', compact('totalAmbulance', 'menunggu', 'diproses', 'selesai', 'laporan'));
    }
}

