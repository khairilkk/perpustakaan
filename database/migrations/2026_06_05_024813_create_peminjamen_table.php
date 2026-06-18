<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();

            $table->foreignId('anggota_id');
            $table->foreignId('buku_id');

            $table->date('tanggal_pinjam');
            $table->date('jatuh_tempo');

            $table->date('tanggal_kembali')->nullable();

            $table->integer('denda')->default(0);

            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
