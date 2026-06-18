<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()
        ->route('login');
});

/*
|--------------------------------------------------------------------------
| SEMUA ROUTE SETELAH LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // =========================
    // DATA BUKU
    // =========================
    Route::get('/buku', [BukuController::class, 'index'])
        ->name('buku.index');

    Route::get('/buku/create', [BukuController::class, 'create'])
        ->name('buku.create');

    Route::post('/buku', [BukuController::class, 'store'])
        ->name('buku.store');

    Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])
        ->name('buku.edit');

    Route::put('/buku/{buku}', [BukuController::class, 'update'])
        ->name('buku.update');

    Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])
        ->name('buku.destroy');

    // =========================
    // DATA ANGGOTA
    // =========================
    Route::get('/anggota', [AnggotaController::class, 'index'])
        ->name('anggota.index');

    Route::get('/anggota/create', [AnggotaController::class, 'create'])
        ->name('anggota.create');

    Route::post('/anggota', [AnggotaController::class, 'store'])
        ->name('anggota.store');

    Route::get('/anggota/{anggota}/edit', [AnggotaController::class, 'edit'])
        ->name('anggota.edit');

    Route::put('/anggota/{anggota}', [AnggotaController::class, 'update'])
        ->name('anggota.update');

    Route::delete('/anggota/{anggota}', [AnggotaController::class, 'destroy'])
        ->name('anggota.destroy');


    // =========================
    // PEMINJAMAN
    // =========================
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])
        ->name('peminjaman.index');

    Route::post('/peminjaman', [PeminjamanController::class, 'store'])
        ->name('peminjaman.store');

    // =========================
    // PENGEMBALIAN
    // =========================
    Route::get('/pengembalian', [PengembalianController::class, 'index'])
        ->name('pengembalian.index');

    Route::post('/pengembalian/{id}', [PengembalianController::class, 'kembalikan'])
        ->name('pengembalian.kembalikan');

    // =========================
    // RIWAYAT
    // =========================
    Route::get('/riwayat', [RiwayatController::class, 'index'])
        ->name('riwayat.index');

    // =========================
    // DENDA
    // =========================
    Route::get('/denda', [DendaController::class, 'index'])
        ->name('denda.index');

    Route::post('/denda', [DendaController::class, 'update'])
        ->name('denda.update');

    // =========================
    // LAPORAN
    // =========================
    Route::get(
        '/laporan',
        [LaporanController::class,'index']
    )->name('laporan.index');

    Route::get(
        '/laporan/pdf',
        [LaporanController::class,'exportPdf']
    )->name('laporan.pdf');
    // =========================
    // PROFILE
    // =========================
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

}); // <- PENUTUP GROUP AUTH

require __DIR__.'/auth.php';