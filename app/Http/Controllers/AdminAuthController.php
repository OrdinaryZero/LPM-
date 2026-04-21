<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {

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


        if ($request->username === env('ADMIN_USERNAME') && $request->password === env('ADMIN_PASSWORD')) {

            session(['is_admin' => true]);
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error', 'Akses Ditolak: Username atau Password salah!');
    }

    public function dashboard()
{
    if (!session('is_admin')) return redirect()->route('admin.login');

    $totalLaporanHariIni = \App\Models\Ambulance::whereDate('created_at', \Carbon\Carbon::today())->count();
    $totalAmbulance = \App\Models\Ambulance::count(); 
    $totalRescue = \App\Models\Lapor::count(); 


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

        session()->forget('is_admin');
        return redirect()->route('admin.login');
    }

    
}