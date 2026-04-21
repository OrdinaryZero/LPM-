<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiKas; 


// INI KADA TAPAKAI MASIH LAH
class KasController extends Controller
{
    public function index()
    {

        $transaksi = TransaksiKas::orderBy('tanggal', 'desc')->get();

        $totalPemasukan = TransaksiKas::where('jenis', 'Pemasukan')->sum('nominal');
        $totalPengeluaran = TransaksiKas::where('jenis', 'Pengeluaran')->sum('nominal');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        return view('usulan', compact('transaksi', 'saldoAkhir', 'totalPemasukan', 'totalPengeluaran'));
    }
}