<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [

        'nama',
        'alamat',
        'telepon'

    ];

    public function peminjamans()
    {
        return $this->hasMany(
            Peminjaman::class,
            'anggota_id'
        );
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($anggota) {

            $anggota
                ->peminjamans()
                ->each(function ($peminjaman) {

                    if ($peminjaman->dataDenda) {

                        $peminjaman
                            ->dataDenda()
                            ->delete();

                    }

                    $peminjaman
                        ->delete();

                });

        });
    }
}