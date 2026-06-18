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
        $pinjams =
        Peminjaman::with([

            'anggota',

            'buku'

        ])
        ->where(
            'status',
            'Dipinjam'
        )
        ->get();

        return view(
            'pengembalian.index',
            compact(
                'pinjams'
            )
        );
    }

    public function kembalikan($id)
    {
        $pinjam =
        Peminjaman::with(
            'buku'
        )->findOrFail(
            $id
        );

        $hariTerlambat = 0;

        $jumlahDenda = 0;

        // ambil pengaturan
        $setting =
        Pengaturan::first();

        $dendaPerHari =
        $setting
            ? $setting->denda_per_hari
            : 50000;

        // cek terlambat
        if (

            Carbon::now()
            ->gt(
                Carbon::parse(
                    $pinjam->jatuh_tempo
                )
            )

        ) {

            $hariTerlambat =
            (int)
            Carbon::parse(
                $pinjam->jatuh_tempo
            )
            ->diffInDays(
                now()
            );

            // otomatis ikut pengaturan
            $jumlahDenda =
            $hariTerlambat
            *
            $dendaPerHari;

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

        // ubah status
        $pinjam->update([

            'status' =>
            'Dikembalikan',

            'tanggal_kembali' =>
            now()

        ]);

        // kembalikan stok
        $pinjam
            ->buku
            ->increment(
                'stok'
            );

        return redirect()
            ->route(
                'pengembalian.index'
            )
            ->with(

                'success',

                $jumlahDenda > 0
                    ? 'Buku dikembalikan • Denda Rp '.number_format($jumlahDenda,0,',','.')
                    : 'Buku berhasil dikembalikan'

            );
    }
}