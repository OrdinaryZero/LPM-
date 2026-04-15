<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Support\Facades\Storage;

class PetugasController extends Controller
{
    // 1. Tampilkan Halaman Manajemen Staf (Dipisah 2 Kategori)
    public function index()
    {
        if (!session('is_admin')) return redirect()->route('admin.login');
        
        // Pisahkan data untuk dilempar ke View
        $tim_inti = Petugas::where('kategori_petugas', 'Pengurus')->latest()->get();
        $petugas_lapangan = Petugas::where('kategori_petugas', 'Lapangan')->latest()->get();
        
        return view('admin.petugas', compact('tim_inti', 'petugas_lapangan'));
    }

    // 2. Simpan Petugas/Tim Inti Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'kategori_petugas' => 'required|in:Pengurus,Lapangan',
            'no_hp' => 'nullable', // Dibuat nullable karena Tim Inti gak wajib ada No HP
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/petugas'), $namaFoto);
            $path = 'uploads/petugas/' . $namaFoto;
        }

        Petugas::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp ?? '-', // Kalau kosong diisi strip '-'
            'kategori_petugas' => $request->kategori_petugas,
            'foto' => $path,
            'status_jaga' => 'Off' 
        ]);

        return redirect()->back()->with('success', 'Data anggota berhasil ditambahkan!');
    }

    // 3. Ubah Status Jaga
    public function toggleStatus($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->status_jaga = ($petugas->status_jaga == 'Aktif') ? 'Off' : 'Aktif';
        $petugas->save();

        return redirect()->back()->with('success', 'Status shift ' . $petugas->nama . ' berhasil diubah!');
    }

    // 4. Hapus Petugas
    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}