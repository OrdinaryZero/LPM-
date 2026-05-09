<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rescue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str; // Wajib ditambah untuk generate kode random

class ReportController extends Controller
{
    public function index()
    {
        return view('lapor');
    }

    public function store(Request $request)
    {
        // Validasi input  jpg
    $request->validate([
        'nama' => 'required|string|max:255',
        'hp' => 'required|numeric|digits_between:10,15',
        'jenis' => 'required',
        'lokasi' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // Hanya gambar, maks 5MB
    ], [
        'foto.image' => 'File yang diupload harus berupa gambar!',
        'foto.max' => 'Ukuran foto terlalu besar, maksimal 5MB.',
    ]);

        $path = null;
        $urlFoto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/rescue'), $namaFoto);
            
            $path = 'uploads/rescue/' . $namaFoto; 
            $urlFoto = asset('uploads/rescue/' . $namaFoto); 
        }

        $lokasiLengkap = $request->lokasi . "\n(Link: " . $request->link_gps . ")";

        $kodeTiket = 'LPM-' . date('dmy') . '-' . strtoupper(Str::random(4));

    // 1. Simpan ke Database
    Rescue::create([
        'kode_laporan' => $kodeTiket,
        'nama_pelapor' => $request->nama,
        'no_hp' => $request->hp,
        'jenis_kejadian' => $request->jenis,
        'lokasi_kejadian' => $request->lokasi . "\n(Link: " . $request->link_gps . ")",
        'deskripsi' => $request->deskripsi,
        'foto_kejadian' => $path,
    ]);


    $kategoriDarurat = ['Kecelakaan Lalu Lintas', 'Kebakaran', 'Pohon Tumbang', 'Bencana Alam'];

    if (in_array($request->jenis, $kategoriDarurat)) {
        // KIRIM KE GRUP WA RESCUE
        $targetWA = env('NO_WA_RESCUE'); 
        $headerPesan = "! *PANGGILAN DARURAT* !";
    } else {
        // KIRIM KE ADMIN 
        $targetWA = env('NO_WA_ADMIN'); 
        $headerPesan = "! *LAPORAN ASPIRASI / INFO MASUK* !";
    }

    // 3. Susun Pesan
    $pesanWA = "$headerPesan\n"
             . "- *NO TIKET:* {$kodeTiket}\n\n"
             . "- *Pelapor:* {$request->nama}\n"
             . "- *Nomer Pelapor:* {$request->hp}\n" 
             . "- *Jenis Kejadian:* {$request->jenis}\n"
             . "- *Keterangan:* {$request->deskripsi}\n\n"
             . "> 📍 *Lokasi:* {$request->lokasi}\n"
             . "🗺️ *Google maps:* {$request->link_gps}\n\n";

    // 4. Eksekusi Fonnte
    $payload = [
        'target' => $targetWA,
        'message' => $pesanWA,
    ];
    
    if ($urlFoto) { $payload['url'] = $urlFoto; }

    try {
        Http::withHeaders([
            'Authorization' => env('FONNTE_TOKEN')
        ])->post('https://api.fonnte.com/send', $payload);
    } catch (\Exception $e) {}

    return redirect()->back()->with('success', 'Laporan berhasil dikirim! Kode Tiket: ' . $kodeTiket);

        
    }

    // Menampilkan halaman pencarian status & statistik
    public function statusIndex()
    {
        // Menghitung statistik laporan langsung dari database
        $total = Rescue::count();
        $selesai = Rescue::where('status', 'Selesai')->count();
        $diproses = Rescue::where('status', 'Diproses')->count();
        $menunggu = Rescue::where('status', 'Menunggu')->count();

        return view('status', compact('total', 'selesai', 'diproses', 'menunggu'));
    }

    // Memproses pengecekan kode laporan
    public function statusCheck(Request $request)
    {
        $request->validate([
            'kode' => 'required'
        ]);

        // Tetap hitung statistik agar saat di-refresh halamannya tidak error
        $total = Rescue::count();
        $selesai = Rescue::where('status', 'Selesai')->count();
        $diproses = Rescue::where('status', 'Diproses')->count();
        $menunggu = Rescue::where('status', 'Menunggu')->count();

        // Cari laporan berdasarkan kode
        $laporan = Rescue::where('kode_laporan', $request->kode)->first();

        if ($laporan) {
            return view('status', compact('laporan', 'total', 'selesai', 'diproses', 'menunggu'));
        } else {
            return redirect()->route('status')->with('error', 'Kode Laporan tidak ditemukan. Pastikan huruf besar/kecilnya sesuai.');
        }
    }
}