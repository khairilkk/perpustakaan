<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::query();

        // Cari judul
        if ($request->filled('search')) {

            $query->where(
                'judul',
                'like',
                '%'.$request->search.'%'
            );

        }

        // Filter kategori
        if ($request->filled('kategori')) {

            $query->where(
                'kategori',
                $request->kategori
            );

        }

        $bukus =
        $query
        ->latest()
        ->get();

        // Ambil semua kategori unik
        $kategori =
        Buku::whereNotNull('kategori')
            ->where('kategori','!=','')
            ->distinct()
            ->pluck('kategori');

        return view(
            'buku.index',
            compact(
                'bukus',
                'kategori'
            )
        );
    }


    public function create()
    {
        return view(
            'buku.create'
        );
    }


    public function store(Request $request)
    {
        $request->validate([

            'kode_buku'=>'required',

            'judul'=>'required',

            'kategori'=>'required',

            'penulis'=>'required',

            'stok'=>'required|numeric'

        ]);


        Buku::create([

            'kode_buku'=>
            $request->kode_buku,

            'judul'=>
            $request->judul,

            'kategori'=>
            $request->kategori,

            'penulis'=>
            $request->penulis,

            'stok'=>
            $request->stok

        ]);

        return redirect()
        ->route('buku.index')
        ->with(
            'success',
            'Buku berhasil ditambah'
        );
    }



    public function edit(Buku $buku)
    {
        return view(
            'buku.edit',
            compact(
                'buku'
            )
        );
    }



    public function update(
        Request $request,
        Buku $buku
    )
    {
        $request->validate([

            'judul'=>'required',

            'kategori'=>'required',

            'penulis'=>'required',

            'stok'=>'required'

        ]);


        $buku->update([

            'judul'=>
            $request->judul,

            'kategori'=>
            $request->kategori,

            'penulis'=>
            $request->penulis,

            'stok'=>
            $request->stok

        ]);

        return redirect()
        ->route('buku.index')
        ->with(
            'success',
            'Buku berhasil diupdate'
        );
    }



    public function destroy(Buku $buku)
    {
        $buku->delete();

        return back()
        ->with(
            'success',
            'Buku dihapus'
        );
    }
}