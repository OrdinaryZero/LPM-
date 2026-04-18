<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;

class AspirasiController extends Controller
{
    // ================= BAGIAN WARGA (PUBLIK) ================= //
    
    public function index()
    {
        return view('aspirasi'); // Nampilin form publik
    }

    public function store(Request $request)
    {
        // 1. Validasi inputan
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'kategori' => 'required',
            'pesan' => 'required'
        ]);

        // 2. Simpan ke database
        Aspirasi::create($request->all());

        // 3. Balikin ke halaman form dengan pesan sukses
        return redirect()->back()->with('success', 'Aspirasi berhasil dikirim! Tim LPM akan segera menindaklanjuti.');
    }

    // ================= BAGIAN ADMIN PANEL ================= //

    public function adminIndex()
    {
        if (!session('is_admin')) return redirect()->route('admin.login');
        
        // Tarik semua data dari database urut dari yang terbaru
        $data_aspirasi = Aspirasi::latest()->paginate(10);
        return view('admin.aspirasi', compact('data_aspirasi'));
    }

    public function updateStatus(Request $request, $id)
    {
        if (!session('is_admin')) return redirect()->route('admin.login');
        
        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->status = $request->status;
        $aspirasi->save();

        return redirect()->back()->with('success', 'Status laporan berhasil diubah!');
    }
}