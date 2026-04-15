<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiKas; // ✔️ INI YANG BENAR: Memanggil Model database-nya

class KasController extends Controller
{
    public function index()
    {
        // Ambil semua transaksi, urutkan dari yang paling baru
        $transaksi = TransaksiKas::orderBy('tanggal', 'desc')->get();

        // Hitung total-totalan
        $totalPemasukan = TransaksiKas::where('jenis', 'Pemasukan')->sum('nominal');
        $totalPengeluaran = TransaksiKas::where('jenis', 'Pengeluaran')->sum('nominal');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;
        
        // Lempar data ke halaman blade
        return view('kas-rt', compact('transaksi', 'saldoAkhir', 'totalPemasukan', 'totalPengeluaran'));
    }
}