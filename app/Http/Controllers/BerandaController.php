<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Galeri;

class BerandaController extends Controller
{
public function index()

    $pengurus = Petugas::where('kategori_petugas', 'Pengurus')->take(4)->get();

    $armada = Galeri::where('kategori', 'Armada')->latest()->take(6)->get();

    return view('beranda', compact('pengurus', 'armada'));
}
public function liveReport()
    {
        $totalAmbulance = \App\Models\Ambulance::count();
        $menunggu = \App\Models\Ambulance::where('status', 'Menunggu')->count();
        $diproses = \App\Models\Ambulance::where('status', 'Diproses')->count();
        $selesai = \App\Models\Ambulance::where('status', 'Selesai')->count();

        $laporan = \App\Models\Ambulance::latest()->paginate(15);

        return view('live-report', compact('totalAmbulance', 'menunggu', 'diproses', 'selesai', 'laporan'));
    }
}

