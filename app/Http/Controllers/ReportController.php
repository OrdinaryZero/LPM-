<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rescue;
use Illuminate\Support\Facades\Http;

class ReportController extends Controller
{
    public function index()
    {
        return view('lapor');
    }

 public function store(Request $request)
    {
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

        Rescue::create([
            'nama_pelapor' => $request->nama,
            'no_hp' => $request->hp,
            'jenis_kejadian' => $request->jenis,
            'lokasi_kejadian' => $lokasiLengkap,
            'deskripsi' => $request->deskripsi,
            'foto_kejadian' => $path,
        ]);

        // Pesan WA yang rapi
        $pesanWA = "🚨 *LAPORAN RESCUE MASUK* 🚨\n\n"
                 . "🔥 Jenis: {$request->jenis}\n"
                 . "📝 Detail: {$request->deskripsi}\n\n"
                 . "👤 Pelapor: {$request->nama}\n"
                 . "📞 HP: {$request->hp}\n\n"
                 . "📍 *ALAMAT:*\n{$request->lokasi}\n\n"
                 . "🗺️ *LINK GOOGLE MAPS:*\n{$request->link_gps}"; 

        $payloadFonnte = [
            'target' => env('NO_WA_ADMIN'),
            'message' => $pesanWA,
        ];

        if ($urlFoto != null) {
            $payloadFonnte['url'] = $urlFoto;
        }

        try {
            Http::withHeaders([
                'Authorization' => env('FONNTE_TOKEN')
            ])->post('https://api.fonnte.com/send', $payloadFonnte);
        } catch (\Exception $e) {}

        return redirect()->back()->with('success', 'Laporan kejadian berhasil dikirim ke Tim Rescue!');
    }
}