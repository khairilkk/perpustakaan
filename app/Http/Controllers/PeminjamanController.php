<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::all();

        $bukus = Buku::all();

        return view(
            'peminjaman.index',
            compact(
                'anggotas',
                'bukus'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'anggota_id' =>
            'required',

            'buku_id' =>
            'required',

            'tanggal_pinjam' =>
            'required|date',

            'durasi' =>
            'required|integer|min:1',

        ]);

        // ambil buku
        $buku =
        Buku::findOrFail(
            $request->buku_id
        );

        // cek stok
        if ($buku->stok <= 0) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Stok buku habis'
                );
        }

        // hitung jatuh tempo otomatis
        $jatuhTempo =
        Carbon::parse(
            $request->tanggal_pinjam
        )->addDays(
            (int) $request->durasi
        );

        // simpan peminjaman
        Peminjaman::create([

            'anggota_id' =>
            $request->anggota_id,

            'buku_id' =>
            $request->buku_id,

            'tanggal_pinjam' =>
            $request->tanggal_pinjam,

            'jatuh_tempo' =>
            $jatuhTempo
            ->format('Y-m-d'),

            'tanggal_kembali' =>
            null,

            'status' =>
            'Dipinjam',

        ]);

        // kurangi stok
        $buku->decrement(
            'stok'
        );

        return redirect()
            ->route(
                'peminjaman.index'
            )
            ->with(
                'success',
                'Peminjaman berhasil ditambahkan'
            );
    }
}