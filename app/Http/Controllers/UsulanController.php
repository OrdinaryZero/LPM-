<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usulan;

class UsulanController extends Controller
{
    // ================= BAGIAN WARGA (PUBLIK) ================= //
    
    public function index()
    {
        return view('usulan'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'manfaat' => 'required|string'
        ]);

        Usulan::create($request->all());

        return redirect()->back()->with('success', 'Usulan Pembangunan berhasil dikirim! Tim LPM akan meninjau kelayakan proyek ini.');
    }

    // ================= BAGIAN ADMIN PANEL ================= //

    public function adminIndex()
    {
        if (!session('is_admin')) return redirect()->route('admin.login');
        
        $data_usulan = Usulan::latest()->paginate(10);
        return view('admin.usulan', compact('data_usulan'));
    }

    public function updateStatus(Request $request, $id)
    {
        if (!session('is_admin')) return redirect()->route('admin.login');
        
        $usulan = Usulan::findOrFail($id);
        $usulan->status = $request->status;
        $usulan->save();

        return redirect()->back()->with('success', 'Status usulan pembangunan berhasil diperbarui!');
    }
}