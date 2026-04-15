<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        // Kalau admin sudah login sebelumnya, langsung lempar ke dashboard
        if (session('is_admin')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Cek kecocokan dengan data di .env
        if ($request->username === env('ADMIN_USERNAME') && $request->password === env('ADMIN_PASSWORD')) {
            // Beri "Kartu Akses" bernama is_admin
            session(['is_admin' => true]);
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error', 'Akses Ditolak: Username atau Password salah!');
    }

    public function dashboard()
{
    if (!session('is_admin')) return redirect()->route('admin.login');

    // 1. Data Ringkasan Laporan & Ambulance (Sesuaikan dengan logic asli lu)
    $totalLaporanHariIni = \App\Models\Ambulance::whereDate('created_at', \Carbon\Carbon::today())->count();
    $totalAmbulance = \App\Models\Ambulance::count(); 
    $totalRescue = \App\Models\Lapor::count(); // Sesuaikan nama model Lapor/Rescue lu

    // 2. Data Petugas Siaga & Jadwal (YANG BARU KITA BUAT)
    $petugas_aktif = \App\Models\Petugas::where('kategori_petugas', 'Lapangan')
                                        ->where('status_jaga', 'Aktif')
                                        ->get();

    $jadwal_petugas = \App\Models\Petugas::where('kategori_petugas', 'Lapangan')
                                         ->orderBy('status_jaga', 'asc')
                                         ->get();

    return view('admin.dashboard', compact(
        'totalLaporanHariIni', 'totalAmbulance', 'totalRescue', 
        'petugas_aktif', 'jadwal_petugas'
    ));
}

    public function logout()
    {
        // Cabut kartu aksesnya
        session()->forget('is_admin');
        return redirect()->route('admin.login');
    }

    
}