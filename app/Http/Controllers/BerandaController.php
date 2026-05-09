<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Galeri;
use App\Models\Struktur; 
use Illuminate\Support\Facades\Auth; 
use App\Models\Rescue;


class BerandaController extends Controller
{
    public function index()
    {
        $pengurus = Petugas::where('kategori_petugas', 'Pengurus')->take(4)->get();
        
        // Mengambil foto Armada
        $armada = Galeri::where('kategori', 'Armada')->latest()->take(6)->get();
        
        // MENGAMBIL FOTO DOKUMENTASI (BARU)
        $dokumentasi = Galeri::where('kategori', 'Dokumentasi')->latest()->take(6)->get();

        $struktursGrouped = Struktur::orderBy('baris', 'asc')->orderBy('urutan', 'asc')->get()->groupBy('baris');

        $laporanSelesai = Rescue::where('status', 'Selesai')
                                ->whereNotNull('foto_penanganan')
                                ->latest()
                                ->take(4)
                                ->get();

        // Jangan lupa tambahkan 'dokumentasi' ke dalam compact
        return view('beranda', compact('pengurus', 'armada', 'struktursGrouped', 'laporanSelesai', 'dokumentasi'));
    }

    public function liveReport()
    {
        // Gembok keamanan
        if (!Auth::check()) return redirect()->route('admin.login');
        
        $totalAmbulance = \App\Models\Ambulance::count();
        $menunggu = \App\Models\Ambulance::where('status', 'Menunggu')->count();
        $diproses = \App\Models\Ambulance::where('status', 'Diproses')->count();
        $selesai = \App\Models\Ambulance::where('status', 'Selesai')->count();

        $laporan = \App\Models\Ambulance::latest()->paginate(15);

        return view('live-report', compact('totalAmbulance', 'menunggu', 'diproses', 'selesai', 'laporan'));
    }
}