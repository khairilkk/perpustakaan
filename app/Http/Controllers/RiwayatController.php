<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = Peminjaman::with([

            'anggota',

            'buku',

            'dataDenda'

        ])->get();

        $totalDenda = 0;

        $tepat = 0;

        foreach ($riwayats as $item) {

            // ambil denda dari tabel dendas
            $item->denda_view =
                optional(
                    $item->dataDenda
                )->jumlah_denda ?? 0;

            // status keterlambatan
            if ($item->denda_view > 0) {

                $item->status_view =
                    'Terlambat';

            } else {

                $item->status_view =
                    'Tepat Waktu';

                $tepat++;
            }

            $totalDenda +=
                $item->denda_view;
        }

        return view(
            'riwayat.index',
            [

                'riwayats' =>
                    $riwayats,

                'total' =>
                    $riwayats->count(),

                'tepat' =>
                    $tepat,

                'totalDenda' =>
                    $totalDenda

            ]
        );
    }
}