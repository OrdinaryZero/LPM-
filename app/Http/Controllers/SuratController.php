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

        $path = null;
        $urlFoto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/ambulance'), $namaFoto);
            
            $path = 'uploads/ambulance/' . $namaFoto; 
            $urlFoto = asset('uploads/ambulance/' . $namaFoto); 
        }

        $lokasiLengkap = $request->lokasi . "\n(Link: " . $request->link_gps . ")";

        Ambulance::create([
            'nama_pemohon' => $request->nama,
            'no_hp' => $request->hp,
            'lokasi_jemput' => $lokasiLengkap,
            'kondisi_pasien' => $request->kondisi,


        $pesanWA = "🚨 *AMBULANCE LPM DARURAT* 🚨\n\n"
                 . "⚠️ Kondisi: {$request->kondisi}\n\n"
                 . "👤 Pemohon: {$request->nama}\n"
                 . "📞 HP: {$request->hp}\n\n"
                 . "📍 *ALAMAT JEMPUT:*\n{$request->lokasi}\n\n"
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

        return redirect()->back()->with('success', 'Ambulance segera menuju lokasi Anda!');
    }
}