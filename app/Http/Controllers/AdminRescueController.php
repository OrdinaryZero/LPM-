<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rescue;

class AdminRescueController extends Controller
{
    // Menampilkan daftar semua laporan
    public function index()
    {
        // Mengambil semua laporan, diurutkan dari yang paling baru
        $rescues = Rescue::latest()->get();
        return view('admin.rescue.index', compact('rescues'));
        return redirect()->route('admin.dashboard');

    }

    // Mengupdate status dan upload foto penanganan
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'foto_penanganan' => 'nullable|image|mimes:jpeg,png,jpg|max:5120' // Maks 5MB
        ]);

        $rescue = Rescue::findOrFail($id);
        $rescue->status = $request->status;

        // Jika statusnya Selesai dan ada file foto yang diupload
        if ($request->hasFile('foto_penanganan')) {
            $foto = $request->file('foto_penanganan');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            
            // Simpan ke folder public/uploads/penanganan
            $foto->move(public_path('uploads/penanganan'), $namaFoto);
            
            // Simpan path ke database
            $rescue->foto_penanganan = 'uploads/penanganan/' . $namaFoto;
        }

        $rescue->save();

        return redirect()->back()->with('success', 'Status laporan ' . $rescue->kode_laporan . ' berhasil diupdate!');
    }
}