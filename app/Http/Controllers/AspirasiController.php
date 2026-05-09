<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;

class AspirasiController extends Controller
{
    // ========================================================
    // 1. BAGIAN ADMIN PANEL (CMS)
    // ========================================================
    
    // Menampilkan Tabel di Dashboard Induk
    public function index(Request $request)
    {
        $aspirasi = Aspirasi::latest()->get(); 

        if ($request->ajax()) {
            return view('admin.aspirasi.partial', compact('aspirasi')); 
        }

        return redirect()->route('admin.dashboard');
    }

    // Mengubah Status Aspirasi (Menunggu -> Proses/Selesai)
    public function updateStatus(Request $request, $id)
    {
        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->status = $request->status;
        $aspirasi->save();

        return redirect()->back()->with('success', 'Status aspirasi berhasil diubah!');
    }


    // ========================================================
    // 2. BAGIAN PUBLIK (FORM WARGA)
    // ========================================================
    
    // Menyimpan data dari Beranda ke Database MySQL
    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'nama'     => 'required',
            'no_hp'    => 'required',
            'kategori' => 'required',
            'pesan'    => 'required',
        ]);

        // Simpan ke Database (Pastikan nama kolom di kiri sesuai dengan phpMyAdmin)
        Aspirasi::create([
            'nama'     => $request->nama,
            'no_hp'    => $request->no_hp,
            'kategori' => $request->kategori, 
            'pesan'    => $request->pesan,
            'status'   => 'Menunggu',
        ]);

        // Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Aspirasi Anda berhasil dikirim ke Command Center!');
    }
}