<?php
namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    // ==========================================
    // 1. AREA PUBLIK (WARGA)
    // ==========================================
    public function publicIndex()
    {
        // Tampilkan semua berita dengan paginasi (9 berita per halaman)
        $beritas = Berita::latest('tanggal')->paginate(9);
        return view('berita.index', compact('beritas'));
    }

    public function show($slug)
    {
        // Tampilkan detail satu berita
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $beritaLainnya = Berita::where('id', '!=', $berita->id)->latest()->take(4)->get();
        return view('berita.show', compact('berita', 'beritaLainnya'));
    }

    // ==========================================
    // 2. AREA ADMIN (CMS PANEL)
    // ==========================================
    
    public function index()
    {
        $beritas = \App\Models\Berita::latest('tanggal')->get();
        
        // Tambahkan data struktur agar sidebar tidak error
        $struktursGrouped = \App\Models\Struktur::orderBy('baris', 'asc')
                                               ->orderBy('urutan', 'asc')
                                               ->get()
                                               ->groupBy('baris');

        return view('admin.berita', compact('beritas', 'struktursGrouped'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'tanggal' => 'required|date',
            'konten' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $foto = $request->file('foto');
        $namaFoto = time() . '_' . $foto->getClientOriginalName();
        $foto->move(public_path('uploads/berita'), $namaFoto);

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . Str::random(4), // Anti duplikat
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'konten' => $request->konten,
            'foto' => 'uploads/berita/' . $namaFoto,
        ]);

        return redirect()->back()->with('success', 'Berita berhasil diterbitkan!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if (File::exists(public_path($berita->foto))) {
            File::delete(public_path($berita->foto));
        }
        $berita->delete();
        return redirect()->back()->with('success', 'Berita berhasil dihapus!');
    }
}