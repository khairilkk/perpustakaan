<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dendas', function (Blueprint $table) {

            $table->foreignId('peminjaman_id')
                ->after('id');

            $table->integer('hari_terlambat')
                ->default(0);

            $table->decimal(
                'jumlah_denda',
                12,
                0
            )->default(0);

            $table->string('status')
                ->default(
                    'belum_dibayar'
                );

            $table->date(
                'tanggal_denda'
            )->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('dendas', function (Blueprint $table) {

            $table->dropColumn([

                'peminjaman_id',

                'hari_terlambat',

                'jumlah_denda',

                'status',

                'tanggal_denda'

            ]);

        });
    }
};