<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LaporController;
use App\Http\Controllers\SuratController;
use App\Models\Laporan;
 use App\Models\Ambulance;
 use App\Models\Rescue;
use App\Http\Controllers\LpmController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\GaleriController;
use Carbon\Carbon;
use App\Http\Controllers\BerandaController;

Route::get('/', function () {
    return view('beranda'); 
})->name('beranda');

Route::get('/form-lapor', [ReportController::class, 'index'])->name('lapor.index');

Route::post('/form-lapor', [ReportController::class, 'store'])->name('lapor.store');


Route::get('/lapor', function () {
    return view('lapor');
})->name('lapor.index');


Route::get('/data-warga', function () {
    return view('data-warga');
})->name('warga.index');

Route::get('/kas-rt', function () {
    return view('kas-rt');
})->name('kas-rt.index');
Route::get('/kas-rt', [\App\Http\Controllers\KasController::class, 'index'])->name('kas-rt.index');
Route::get('/surat-pengantar', function () {
    return view('ambulance');
})->name('ambulance.index');

Route::get('/umkm', function () {
    return view('umkm');
})->name('umkm.index');

Route::get('/profil', function () { return view('profil'); })->name('profil');
Route::get('/acara', function () { return view('acara'); })->name('acara');
Route::get('/lokasi', function () { return view('lokasi'); })->name('lokasi');
Route::get('/informasi', function () { return view('informasi'); })->name('informasi');
Route::get('/galeri', function () { return view('galeri'); })->name('galeri');
Route::get('/live-report', function () { 
    $laporans = Laporan::latest()->take(5)->get();
    return view('live-report', compact('laporans')); 
})->name('live-report');


Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');

Route::post('/surat/store', [SuratController::class, 'store'])->name('surat.store');

Route::get('/layanan-ambulance', [SuratController::class, 'index'])->name('ambulance.index');
Route::post('/layanan-ambulance', [SuratController::class, 'store'])->name('ambulance.store');

Route::get('/lapor-rescue', [ReportController::class, 'index'])->name('rescue.index');
Route::post('/lapor-rescue', [ReportController::class, 'store'])->name('rescue.store');

Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
Route::post('/admin/galeri/tambah', [GaleriController::class, 'store'])->name('admin.galeri.store');
Route::post('/admin/galeri/hapus/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// --- AREA ADMIN ---
Route::get('/live-report', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/live-report', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


// --- RUTE MANAJEMEN STAF (CMS) ---
Route::get('/admin/petugas', [PetugasController::class, 'index'])->name('admin.petugas');
Route::post('/admin/petugas/tambah', [PetugasController::class, 'store'])->name('admin.petugas.store');
Route::post('/admin/petugas/toggle/{id}', [PetugasController::class, 'toggleStatus'])->name('admin.petugas.toggle');
Route::post('/admin/petugas/hapus/{id}', [PetugasController::class, 'destroy'])->name('admin.petugas.destroy');

Route::get('/admin/dashboard', function () {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }
    return view('admin.dashboard'); 
})->name('admin.dashboard');



Route::get('/admin/dashboard', function () {
    if (!session('is_admin')) return redirect()->route('admin.login');

    // Data lama lu (Ambulance/Laporan)
    $totalLaporanHariIni = \App\Models\Ambulance::whereDate('created_at', \Carbon\Carbon::today())->count();
    $totalAmbulance = \App\Models\Ambulance::count(); 
    $totalRescue = \App\Models\Ambulance::count(); // Ganti sesuai model lu
    $laporanTerbaru = \App\Models\Ambulance::latest()->take(5)->get(); // Karena gw liat lu masih manggil ini di log

    // Data Baru (Petugas)
    $petugas_aktif = \App\Models\Petugas::where('kategori_petugas', 'Lapangan')
                                        ->where('status_jaga', 'Aktif')
                                        ->get();

    $jadwal_petugas = \App\Models\Petugas::where('kategori_petugas', 'Lapangan')
                                         ->orderBy('status_jaga', 'asc')
                                         ->get();

    return view('admin.dashboard', compact(
        'totalLaporanHariIni', 'totalAmbulance', 'totalRescue', 'laporanTerbaru',
        'petugas_aktif', 'jadwal_petugas'
    ));
})->name('admin.dashboard');


// ADMIN LOGSSSSS

Route::get('/admin/logs', function () {
    if (!session('is_admin')) return redirect()->route('admin.login');

    $logs = \App\Models\Ambulance::latest()->paginate(10); 

    return view('admin.logs', compact('logs'));
})->name('admin.logs');

// Route buat update status laporan (Opsional, biar admin bisa nandain laporan udah selesai)
Route::post('/admin/logs/{id}/status', function (\Illuminate\Http\Request $request, $id) {
    if (!session('is_admin')) return redirect()->route('admin.login');
    
    $laporan = \App\Models\Ambulance::findOrFail($id);
    $laporan->status = $request->status;
    $laporan->save();

    return redirect()->back()->with('success', 'Status laporan berhasil diperbarui!');
})->name('admin.logs.status');