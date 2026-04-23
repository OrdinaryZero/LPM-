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
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\StrukturController;

Route::get('/', function () {
    return view('beranda'); 
})->name('beranda');

Route::get('/form-lapor', [ReportController::class, 'index'])->name('lapor.index');

Route::post('/form-lapor', [ReportController::class, 'store'])->name('lapor.store');


Route::get('/lapor', function () {
    return view('lapor');
})->name('lapor.index');


Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');

// Route PUBLIK 
Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
Route::post('/aspirasi/kirim', [AspirasiController::class, 'store'])->name('aspirasi.store');
// Route ADMIN PANEL
Route::get('/admin/aspirasi', [AspirasiController::class, 'adminIndex'])->name('admin.aspirasi.index');
Route::post('/admin/aspirasi/{id}/status', [AspirasiController::class, 'updateStatus'])->name('admin.aspirasi.status');

Route::get('/usulan', [UsulanController::class, 'index'])->name('usulan.index');
Route::get('/usulan', [UsulanController::class, 'index'])->name('usulan.index');
Route::post('/usulan/kirim', [UsulanController::class, 'store'])->name('usulan.store');

// Route ADMIN PANEL
Route::get('/admin/usulan', [UsulanController::class, 'adminIndex'])->name('admin.usulan.index');
Route::post('/admin/usulan/{id}/status', [UsulanController::class, 'updateStatus'])->name('admin.usulan.status');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');

Route::get('/admin/agenda', [AgendaController::class, 'adminIndex'])->name('admin.agenda.index');
Route::post('/admin/agenda', [AgendaController::class, 'store'])->name('admin.agenda.store');
Route::post('/admin/agenda/{id}/status', [AgendaController::class, 'updateStatus'])->name('admin.agenda.status');
Route::post('/admin/agenda/{id}/hapus', [AgendaController::class, 'destroy'])->name('admin.agenda.destroy');

Route::get('/surat-pengantar', function () {
    return view('ambulance');
})->name('ambulance.index');


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

Route::get('/status', [BerandaController::class, 'liveReport'])->name('status');

// --- AREA ADMIN ---
Route::get('/live-report', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/live-report', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


// --- RUTE MANAJEMEN STAFf (CMS) ---
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

Route::prefix('admin')->group(function () {
    Route::get('/struktur', [StrukturController::class, 'index'])->name('admin.struktur.index');
    Route::post('/struktur', [StrukturController::class, 'store'])->name('admin.struktur.store');
    Route::delete('/struktur/{struktur}', [StrukturController::class, 'destroy'])->name('admin.struktur.destroy');
});



Route::get('/admin/dashboard', function () {
    if (!session('is_admin')) return redirect()->route('admin.login');

    // Data lama 
    $totalLaporanHariIni = \App\Models\Ambulance::whereDate('created_at', \Carbon\Carbon::today())->count();
    $totalAmbulance = \App\Models\Ambulance::count(); 
    $totalRescue = \App\Models\Ambulance::count();
    $laporanTerbaru = \App\Models\Ambulance::latest()->take(5)->get(); 

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

// Route update status
Route::post('/admin/logs/{id}/status', function (\Illuminate\Http\Request $request, $id) {
    if (!session('is_admin')) return redirect()->route('admin.login');
    
    $laporan = \App\Models\Ambulance::findOrFail($id);
    $laporan->status = $request->status;
    $laporan->save();

    return redirect()->back()->with('success', 'Status laporan berhasil diperbarui!');
})->name('admin.logs.status');


Route::post('/admin/struktur/reorder', [StrukturController::class, 'reorder'])->name('admin.struktur.reorder');

Route::put('/admin/struktur/{id}', [StrukturController::class, 'update'])->name('admin.struktur.update');