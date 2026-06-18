<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function index()
    {
        $data = Pengaturan::first();

        if (!$data) {
            $data = Pengaturan::create([
                'denda_per_hari'=>1000,
                'maksimal_pinjam'=>14
            ]);
        }

        return view('denda.index', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'denda_per_hari'=>'required|integer|min:100',
            'maksimal_pinjam'=>'required'
        ]);

        $data = Pengaturan::first();

        $data->update([
            'denda_per_hari'=>$request->denda_per_hari,
            'maksimal_pinjam'=>$request->maksimal_pinjam
        ]);

        return back()
            ->with('success','Pengaturan berhasil disimpan');
    }
}