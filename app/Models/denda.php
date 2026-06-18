<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $fillable = [

        'peminjaman_id',

        'jumlah_denda',

        'hari_terlambat',

        'status',

        'tanggal_denda'

    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}