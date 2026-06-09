<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Galeri;
use App\Models\Struktur; 
use Illuminate\Support\Facades\Auth; 
use App\Models\Rescue;
use App\Models\Berita; 

class BerandaController extends Controller
{
    public function index()
    {
        $pengurus = Petugas::where('kategori_petugas', 'Pengurus')->take(4)->get();
        
        // Mengambil foto Armada
        $armada = Galeri::where('kategori', 'Armada')->latest()->take(6)->get();
        
        // Mengambil foto Dokumentasi
        $dokumentasi = Galeri::where('kategori', 'Dokumentasi')->latest()->take(6)->get();

        // Mengambil Struktur Organisasi
        $struktursGrouped = Struktur::orderBy('baris', 'asc')->orderBy('urutan', 'asc')->get()->groupBy('baris');

        // Mengambil Laporan Rescue yang sudah selesai
        $laporanSelesai = Rescue::where('status', 'Selesai')
                                ->whereNotNull('foto_penanganan')
                                ->latest()
                                ->take(4)
                                ->get();

        // ==========================================
        // FITUR BARU: MENGAMBIL DATA BERITA/KEGIATAN
        // ==========================================
        $beritaUtama = Berita::latest('tanggal')->first();
        $beritaLainnya = Berita::latest('tanggal')->skip(1)->take(3)->get();

        // Lempar SEMUA data ke tampilan beranda
        return view('beranda', compact(
            'pengurus', 
            'armada', 
            'struktursGrouped', 
            'laporanSelesai', 
            'dokumentasi', 
            'beritaUtama', 
            'beritaLainnya' 
        ));
    }

    public function liveReport()
    {
        // keamanan
        if (!Auth::check()) return redirect()->route('admin.login');
        
        $totalAmbulance = \App\Models\Ambulance::count();
        $menunggu = \App\Models\Ambulance::where('status', 'Menunggu')->count();
        $diproses = \App\Models\Ambulance::where('status', 'Diproses')->count();
        $selesai = \App\Models\Ambulance::where('status', 'Selesai')->count();

        $laporan = \App\Models\Ambulance::latest()->paginate(15);

        return view('live-report', compact('totalAmbulance', 'menunggu', 'diproses', 'selesai', 'laporan'));
    }
}