<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();

        $totalAnggota = Anggota::count();

        $bukuDipinjam = Peminjaman::count();

        $bukuDikembalikan = Peminjaman::where('status','dikembalikan')
            ->count();

        $terlambat = Peminjaman::where('status','dipinjam')
            ->whereDate('jatuh_tempo','<',now())
            ->count();

        $persentasePengembalian =
            $bukuDipinjam > 0
            ? round(($bukuDikembalikan / $bukuDipinjam) * 100)
            : 0;

        $bukuPopuler = Peminjaman::selectRaw(
                'buku_id, COUNT(*) as total'
            )
            ->with('buku')
            ->groupBy('buku_id')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        return view(
            'laporan.index',
            compact(
                'totalBuku',
                'totalAnggota',
                'bukuDipinjam',
                'bukuDikembalikan',
                'terlambat',
                'persentasePengembalian',
                'bukuPopuler'
            )
        );
    }

    public function exportPdf()
    {
        $totalBuku = Buku::count();

        $totalAnggota = Anggota::count();

        $bukuDipinjam = Peminjaman::count();

        $bukuDikembalikan = Peminjaman::where(
            'status',
            'dikembalikan'
        )->count();

        $terlambat = Peminjaman::where(
            'status',
            'dipinjam'
        )
        ->whereDate('jatuh_tempo','<',now())
        ->count();

        $pdf = Pdf::loadView(
            'laporan.pdf',
            compact(
                'totalBuku',
                'totalAnggota',
                'bukuDipinjam',
                'bukuDikembalikan',
                'terlambat'
            )
        );

        return $pdf->download(
            'laporan-perpustakaan.pdf'
        );
    }
}