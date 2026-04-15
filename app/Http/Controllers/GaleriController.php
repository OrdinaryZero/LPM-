<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function index()
    {
        if (!session('is_admin')) return redirect()->route('admin.login');
        
        $galeri = Galeri::latest()->get();
        return view('admin.galeri', compact('galeri'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'kategori' => 'required|string',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:5120' // Max 5MB
        ]);

        $foto = $request->file('foto');
        $namaFoto = time() . '_' . $foto->getClientOriginalName();
        $foto->move(public_path('uploads/galeri'), $namaFoto);

        Galeri::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'foto' => 'uploads/galeri/' . $namaFoto,
        ]);

        return redirect()->back()->with('success', 'Foto berhasil diunggah ke Galeri!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        // Hapus file fisik dari folder agar penyimpanan tidak penuh
        if (File::exists(public_path($galeri->foto))) {
            File::delete(public_path($galeri->foto));
        }

        $galeri->delete();
        return redirect()->back()->with('success', 'Foto berhasil dihapus dari sistem!');
    }
}