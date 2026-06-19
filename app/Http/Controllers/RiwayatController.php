<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Denda;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = Peminjaman::with([
            'anggota',
            'buku',
            'dataDenda'
        ])
        ->latest()
        ->get();

        $totalTransaksi = $riwayats->count();

        $tepatWaktu = 0;
        $terlambat = 0;
        $totalDenda = 0;

        foreach ($riwayats as $item) {

            $denda = optional(
                $item->dataDenda
            )->jumlah_denda ?? 0;

            $item->denda_view = $denda;

            if ($denda > 0) {

                $item->status_view = 'Terlambat';

                $terlambat++;

            } else {

                $item->status_view = 'Dikembalikan';

                $tepatWaktu++;

            }

            $totalDenda += $denda;
        }

        return view(
            'riwayat.index',
            compact(
                'riwayats',
                'totalTransaksi',
                'tepatWaktu',
                'terlambat',
                'totalDenda'
            )
        );
    }
}