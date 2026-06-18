<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Tampilkan semua anggota
     */
    public function index(Request $request)
    {
        $query =
        Anggota::query();

        if ($request->search) {

            $query->where(
                'nama',
                'like',
                '%' . $request->search . '%'
            );

        }

        $anggotas =
        $query
        ->latest()
        ->get();

        return view(
            'anggota.index',
            compact(
                'anggotas'
            )
        );
    }

    /**
     * Form tambah
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Simpan
     */
    public function store(Request $request)
    {
        $request->validate([

            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',

        ]);

        Anggota::create(

            $request->all()

        );

        return redirect()
            ->route('anggota.index')
            ->with(
                'success',
                'Anggota berhasil ditambahkan'
            );
    }

    /**
     * Edit
     */
    public function edit(Anggota $anggota)
    {
        return view(
            'anggota.edit',
            compact(
                'anggota'
            )
        );
    }

    /**
     * Update
     */
    public function update(
        Request $request,
        Anggota $anggota
    )
    {
        $request->validate([

            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',

        ]);

        $anggota->update(

            $request->all()

        );

        return redirect()
            ->route(
                'anggota.index'
            )
            ->with(
                'success',
                'Data anggota berhasil diubah'
            );
    }

    /**
     * Hapus
     */
    public function destroy(
        Anggota $anggota
    )
    {
        $anggota->delete();

        return back()
            ->with(
                'success',
                'Anggota berhasil dihapus'
            );
    }
}