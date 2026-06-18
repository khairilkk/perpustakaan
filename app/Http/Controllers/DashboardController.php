<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Buku
        $totalBuku = Buku::count();

        // Total Anggota
        $totalAnggota = Anggota::count();

        // Total Peminjaman Aktif
        $totalPinjam = Peminjaman::where(
            'status',
            'Dipinjam'
        )->count();

        // Total Keterlambatan
        $terlambat = Peminjaman::where(
            'status',
            'Dipinjam'
        )
        ->whereDate(
            'jatuh_tempo',
            '<',
            now()
        )
        ->count();

        // Data Peminjaman Aktif
        $peminjamanAktif =
        Peminjaman::with([
            'anggota',
            'buku'
        ])
        ->where(
            'status',
            'Dipinjam'
        )
        ->latest()
        ->get();

        // Data Peminjaman Terlambat
        $peminjamanTerlambat =
        Peminjaman::with([
            'anggota',
            'buku'
        ])
        ->where(
            'status',
            'Dipinjam'
        )
        ->whereDate(
            'jatuh_tempo',
            '<',
            now()
        )
        ->get();

        /*
        |--------------------------------------------------------------------------
        | Hitung Persentase Progress Bar
        |--------------------------------------------------------------------------
        */

        $persenPinjam =
        $totalBuku > 0
            ? round(
                ($totalPinjam / $totalBuku) * 100
            )
            : 0;

        $persenTerlambat =
        $totalBuku > 0
            ? round(
                ($terlambat / $totalBuku) * 100
            )
            : 0;

        return view(
            'dashboard',
            compact(
                'totalBuku',
                'totalAnggota',
                'totalPinjam',
                'terlambat',
                'peminjamanAktif',
                'peminjamanTerlambat',
                'persenPinjam',
                'persenTerlambat'
            )
        );
    }
}