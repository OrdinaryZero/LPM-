<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http; // Wajib dipanggil untuk akses API Fonnte

class KirimPesanWhatsApp implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $nomor_hp;
    public $pesan;

    // 1. Terima data dari Controller saat Job dipanggil
    public function __construct($nomor_hp, $pesan)
    {
        $this->nomor_hp = $nomor_hp;
        $this->pesan = $pesan;
    }

    // 2. Tugas utama yang akan dieksekusi di belakang layar
    public function handle(): void
    {
        // Masukkan Token Fonnte kamu di sini
        $tokenFonnte = 'TOKEN_FONNTE_KAMU_DISINI'; 

        try {
            Http::withHeaders([
                'Authorization' => $tokenFonnte,
            ])->post('https://api.fonnte.com/send', [
                'target'  => $this->nomor_hp,
                'message' => $this->pesan,
                'countryCode' => '62', // Otomatis format ke +62
            ]);
        } catch (\Exception $e) {
            // Jika API Fonnte mati, biarkan saja (tidak akan membuat web crash)
            \Log::error('Fonnte Error: ' . $e->getMessage());
        }
    }
}