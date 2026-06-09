<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ambulance;
use App\Models\Rescue; // Pastikan model Rescue dipanggil
use App\Models\Petugas;
use Carbon\Carbon;
use App\Models\Aspirasi;


class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // AMBIL INPUT REMEMBER ME DARI CHECKBOX
        $remember = $request->has('remember');

        // MASUKKAN VARIABEL $remember KE DALAM ATTEMPT
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error', 'Akses Ditolak: Email atau Password salah!');
    }

    public function dashboard(\Illuminate\Http\Request $request)
    {
        // 1. Ambil data statistik kotak atas
        $hariIniAmbulance = \App\Models\Ambulance::whereDate('created_at', \Carbon\Carbon::today())->count();
        $hariIniRescue = \App\Models\Rescue::whereDate('created_at', \Carbon\Carbon::today())->count();
        $totalLaporanHariIni = $hariIniAmbulance + $hariIniRescue;

        $totalAmbulance = \App\Models\Ambulance::count(); 
        $totalRescue = \App\Models\Rescue::count();

        // 2. Ambil data petugas siaga (Tetap dibiarkan jaga-jaga kalau dibutuhkan)
        $petugas_aktif = \App\Models\Petugas::where('kategori_petugas', 'Lapangan')
                                ->where('status_jaga', 'Aktif')
                                ->get();

        $jadwal_petugas = \App\Models\Petugas::where('kategori_petugas', 'Lapangan')
                                 ->orderBy('status_jaga', 'asc')
                                 ->get();

        // 3. AMBIL DATA UNTUK GRAFIK (CHART.JS)
        $laporanPerBulan = \App\Models\Rescue::selectRaw('EXTRACT(MONTH FROM created_at) as bulan, COUNT(*) as jumlah')
            ->whereYear('created_at', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('jumlah', 'bulan')->all();

        $dataGrafik = [];
        for ($i = 1; $i <= 12; $i++) {
            $dataGrafik[] = $laporanPerBulan[$i] ?? 0;
        }

        // ==========================================
        // 4. LOGIKA PEMISAH HALAMAN (PENTING)
        // ==========================================
        if ($request->ajax()) {
            // Jika diklik lewat Sidebar, kirim bagian tengahnya saja
            return view('admin.partials.dashboard_main', compact(
                'totalLaporanHariIni', 'totalAmbulance', 'totalRescue', 'dataGrafik'
            ));
        }

        // Jika Refresh biasa, muat semua (Cangkang + Tengah)
        return view('admin.dashboard', compact(
            'totalLaporanHariIni', 'totalAmbulance', 'totalRescue', 'petugas_aktif', 'jadwal_petugas', 'dataGrafik'
        ));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        // Menghapus session dan CSRF token agar tidak bisa di-hijack
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}