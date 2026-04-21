<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;

class AspirasiController extends Controller
{
    // ================= BAGIAN  (PUBLIK) ================= //
    
    public function index()
    {
        return view('aspirasi'); 
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'kategori' => 'required',
            'pesan' => 'required'
        ]);


        Aspirasi::create($request->all());

        return redirect()->back()->with('success', 'Aspirasi berhasil dikirim! Tim LPM akan segera menindaklanjuti.');
    }

    // ================= BAGIAN ADMIN PANEL ================= //

    public function adminIndex()
    {
        if (!session('is_admin')) return redirect()->route('admin.login');
        
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