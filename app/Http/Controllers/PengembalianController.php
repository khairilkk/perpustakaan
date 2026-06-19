<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Denda;
use App\Models\Pengaturan;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function index()
    {
        $pinjams = Peminjaman::with([
            'anggota',
            'buku',
            'dataDenda'
        ])
        ->where('status', 'Dipinjam')
        ->get();

        return view(
            'pengembalian.index',
            compact('pinjams')
        );
    }

    public function kembalikan($id)
    {
        $pinjam = Peminjaman::with('buku')
            ->findOrFail($id);

        $hariTerlambat = 0;
        $jumlahDenda = 0;

        $setting = Pengaturan::first();

        $dendaPerHari = $setting
            ? (int) $setting->denda_per_hari
            : 50000;

        $jatuhTempo = Carbon::parse(
            $pinjam->jatuh_tempo
        )->startOfDay();

        $hariIni = Carbon::now()
            ->startOfDay();

        if ($hariIni->gt($jatuhTempo)) {

            $hariTerlambat =
                $jatuhTempo->diffInDays(
                    $hariIni
                );

            $jumlahDenda =
                (int) $hariTerlambat *
                (int) $dendaPerHari;

            Denda::updateOrCreate(

                [
                    'peminjaman_id' =>
                        $pinjam->id
                ],

                [
                    'hari_terlambat' =>
                        $hariTerlambat,

                    'jumlah_denda' =>
                        $jumlahDenda,

                    'status' =>
                        'belum_dibayar',

                    'tanggal_denda' =>
                        now()
                ]
            );
        }

        $pinjam->update([
            'status' => 'Dikembalikan',
            'tanggal_kembali' => now()
        ]);

        if ($pinjam->buku) {

            $pinjam->buku->increment(
                'stok'
            );
        }

        return redirect()
            ->route('pengembalian.index')
            ->with(
                'success',
                $jumlahDenda > 0
                    ? 'Buku dikembalikan • Denda Rp ' .
                        number_format(
                            $jumlahDenda,
                            0,
                            ',',
                            '.'
                        )
                    : 'Buku berhasil dikembalikan'
            );
    }
}