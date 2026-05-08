<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ambulance;
use App\Models\Rescue; // Pastikan model Rescue dipanggil
use App\Models\Petugas;
use Carbon\Carbon;

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

    public function dashboard()
    {
        if (!Auth::check()) return redirect()->route('admin.login');

        // Statistik Hari Ini (Gabungan Ambulance & Rescue)
        $hariIniAmbulance = Ambulance::whereDate('created_at', Carbon::today())->count();
        $hariIniRescue = Rescue::whereDate('created_at', Carbon::today())->count();
        $totalLaporanHariIni = $hariIniAmbulance + $hariIniRescue;

        // Statistik Total
        $totalAmbulance = Ambulance::count(); 
        $totalRescue = Rescue::count(); // Pakai model Rescue yang kita buat tadi

        $petugas_aktif = Petugas::where('kategori_petugas', 'Lapangan')
                                ->where('status_jaga', 'Aktif')
                                ->get();

        $jadwal_petugas = Petugas::where('kategori_petugas', 'Lapangan')
                                 ->orderBy('status_jaga', 'asc')
                                 ->get();

        return view('admin.dashboard', compact(
            'totalLaporanHariIni', 'totalAmbulance', 'totalRescue', 
            'petugas_aktif', 'jadwal_petugas'
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