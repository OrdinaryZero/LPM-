<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambulance; 
use Illuminate\Support\Facades\Http;

class SuratController extends Controller
{
    public function index()
    {
        return view('ambulance'); 
    }

    public function store(Request $request)
    {
        // 1. Tangkap Foto (Sama persis seperti Rescue)
        $path = null;
        $urlFoto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            // Folder disendirikan agar tidak campur dengan rescue
            $foto->move(public_path('uploads/ambulance'), $namaFoto);
            
            $path = 'uploads/ambulance/' . $namaFoto; 
            $urlFoto = asset('uploads/ambulance/' . $namaFoto); 
        }

        // 2. Gabungkan lokasi dan link GPS
        $lokasiLengkap = $request->lokasi . "\n(Link: " . $request->link_gps . ")";

        // 3. Simpan ke database (Kolom disesuaikan dengan tabel Ambulance)
        Ambulance::create([
            'nama_pemohon' => $request->nama,
            'no_hp' => $request->hp,
            'lokasi_jemput' => $lokasiLengkap,
            'kondisi_pasien' => $request->kondisi,
            // Jika di tabel ambulance kamu ada kolom 'foto_kejadian', buka komentar di bawah ini:
            // 'foto_kejadian' => $path,
        ]);

        // 4. Susun Pesan WA
        $pesanWA = "🚨 *AMBULANCE LPM DARURAT* 🚨\n\n"
                 . "⚠️ Kondisi: {$request->kondisi}\n\n"
                 . "👤 Pemohon: {$request->nama}\n"
                 . "📞 HP: {$request->hp}\n\n"
                 . "📍 *ALAMAT JEMPUT:*\n{$request->lokasi}\n\n"
                 . "🗺️ *LINK GOOGLE MAPS:*\n{$request->link_gps}"; 

        // 5. Setup Payload Fonnte (Sama persis seperti Rescue)
        $payloadFonnte = [
            'target' => env('NO_WA_ADMIN'),
            'message' => $pesanWA,
        ];

        // 6. Masukkan foto ke WA jika ada
        if ($urlFoto != null) {
            $payloadFonnte['url'] = $urlFoto;
        }

        // 7. Eksekusi pengiriman API
        try {
            Http::withHeaders([
                'Authorization' => env('FONNTE_TOKEN')
            ])->post('https://api.fonnte.com/send', $payloadFonnte);
        } catch (\Exception $e) {}

        return redirect()->back()->with('success', 'Ambulance segera menuju lokasi Anda!');
    }
}