<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

// Import Controllers
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\AdminRescueController;

/*
|--------------------------------------------------------------------------
| 1. RUTE PUBLIK (LANDING & INFORMASI)
|--------------------------------------------------------------------------
*/
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/profil', function () { return view('profil'); })->name('profil');
Route::get('/acara', function () { return view('acara'); })->name('acara');
Route::get('/lokasi', function () { return view('lokasi'); })->name('lokasi');
Route::get('/informasi', function () { return view('informasi'); })->name('informasi');
Route::get('/galeri', function () { return view('galeri'); })->name('galeri');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');


/*
|--------------------------------------------------------------------------
| 2. RUTE LAYANAN WARGA (FORM & TRACKING)
|--------------------------------------------------------------------------
*/

// Layanan Rescue & Emergency
Route::get('/lapor-rescue', [ReportController::class, 'index'])->name('rescue.index');
Route::post('/lapor-rescue', [ReportController::class, 'store'])->middleware('throttle:3,60')->name('rescue.store');

// Tracking Status Laporan (Sistem Tiket)
Route::get('/status', [ReportController::class, 'statusIndex'])->name('status');
Route::post('/status/cek', [ReportController::class, 'statusCheck'])->name('status.cek');

// Layanan Ambulance & Surat
Route::get('/layanan-ambulance', [SuratController::class, 'index'])->name('ambulance.index');
Route::post('/layanan-ambulance', [SuratController::class, 'store'])->name('ambulance.store');
Route::get('/surat-pengantar', function () { return view('ambulance'); })->name('ambulance.index'); // Alias
Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
Route::post('/surat/store', [SuratController::class, 'store'])->name('surat.store');

// Aspirasi & Usulan
Route::get('/aspirasi', function () { return view('aspirasi'); })->name('aspirasi.index');
Route::post('/aspirasi/kirim', [AspirasiController::class, 'store'])->name('aspirasi.store');
Route::get('/usulan', function () { return view('usulan'); })->name('usulan.index');
Route::post('/usulan/kirim', [UsulanController::class, 'store'])->name('usulan.store');

// Form Lapor Umum
Route::get('/form-lapor', [ReportController::class, 'index'])->name('lapor.index');
Route::post('/form-lapor', [ReportController::class, 'store'])->name('lapor.store');
Route::get('/lapor', function () { return view('lapor'); })->name('lapor.index');


/*
|--------------------------------------------------------------------------
| 3. AUTHENTICATION (LOGIN ADMIN)
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| 4. AREA ADMIN PANEL 
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Main Dashboard
    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

    // Manajemen Laporan Rescue 
    Route::get('/admin/rescue', [AdminRescueController::class, 'index'])->name('admin.rescue.index');
    Route::put('/admin/rescue/{id}', [AdminRescueController::class, 'update'])->name('admin.rescue.update');

    // Manajemen Aspirasi & Usulan
    Route::get('/admin/aspirasi', [AspirasiController::class, 'index'])->name('admin.aspirasi.index');
    Route::post('/admin/aspirasi/{id}/status', [AspirasiController::class, 'updateStatus'])->name('admin.aspirasi.status');
    Route::get('/admin/usulan', [UsulanController::class, 'index'])->name('admin.usulan.index');
    Route::post('/admin/usulan/{id}/status', [UsulanController::class, 'updateStatus'])->name('admin.usulan.status');

    // Manajemen Agenda & Galeri
    Route::get('/admin/agenda', [AgendaController::class, 'adminIndex'])->name('admin.agenda.index');
    Route::post('/admin/agenda', [AgendaController::class, 'store'])->name('admin.agenda.store');
    Route::post('/admin/agenda/{id}/status', [AgendaController::class, 'updateStatus'])->name('admin.agenda.status');
    Route::post('/admin/agenda/{id}/hapus', [AgendaController::class, 'destroy'])->name('admin.agenda.destroy');
    Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
    Route::post('/admin/galeri/tambah', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::post('/admin/galeri/hapus/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    // Manajemen Petugas & Personel
    Route::get('/admin/petugas', [PetugasController::class, 'index'])->name('admin.petugas');
    Route::post('/admin/petugas/tambah', [PetugasController::class, 'store'])->name('admin.petugas.store');
    Route::post('/admin/petugas/toggle/{id}', [PetugasController::class, 'toggleStatus'])->name('admin.petugas.toggle');
    Route::post('/admin/petugas/hapus/{id}', [PetugasController::class, 'destroy'])->name('admin.petugas.destroy');

    // Manajemen Struktur Organisasi
    Route::prefix('admin')->group(function () {
        Route::get('/struktur', [StrukturController::class, 'index'])->name('admin.struktur.index');
        Route::post('/struktur', [StrukturController::class, 'store'])->name('admin.struktur.store');
        Route::put('/struktur/{id}', [StrukturController::class, 'update'])->name('admin.struktur.update');
        Route::delete('/struktur/{struktur}', [StrukturController::class, 'destroy'])->name('admin.struktur.destroy');
        Route::post('/struktur/reorder', [StrukturController::class, 'reorder'])->name('admin.struktur.reorder');
    });

    // Logs & Riwayat Ambulance
    Route::get('/admin/logs', function () {
        $logs = \App\Models\Ambulance::latest()->paginate(10); 
        return view('admin.logs', compact('logs'));
    })->name('admin.logs');

    Route::post('/admin/logs/{id}/status', function (\Illuminate\Http\Request $request, $id) {
        $laporan = \App\Models\Ambulance::findOrFail($id);
        $laporan->status = $request->status;
        $laporan->save();
        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui!');
    })->name('admin.logs.status');

});