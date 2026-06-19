@extends('layouts.admin')

@section('content')

<div class="p-8 bg-slate-100 min-h-screen">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-slate-800">
            Data Pengembalian
        </h1>

        <p class="text-slate-500 mt-2">
            Kelola transaksi pengembalian buku perpustakaan
        </p>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel -->
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>
                    <tr class="bg-slate-50 text-slate-600">

                        <th class="p-5 text-left">
                            No
                        </th>

                        <th class="p-5 text-left">
                            Anggota
                        </th>

                        <th class="p-5 text-left">
                            Buku
                        </th>

                        <th class="p-5 text-center">
                            Tanggal Pinjam
                        </th>

                        <th class="p-5 text-center">
                            Jatuh Tempo
                        </th>

                        <th class="p-5 text-center">
                            Status
                        </th>

                        <th class="p-5 text-center">
                            Denda
                        </th>

                        <th class="p-5 text-center">
                            Aksi
                        </th>

                    </tr>
                </thead>

                <tbody>

                @forelse($pinjams as $item)

                    @php

                        $jatuhTempo = \Carbon\Carbon::parse(
                            $item->jatuh_tempo
                        );

                        $telat = now()->gt(
                            $jatuhTempo
                        );

                        $hariTerlambat =
                    $telat
                        ? (int) $jatuhTempo->startOfDay()->diffInDays(
                            now()->startOfDay()
                        )
                        : 0;

                        $setting =
                        \App\Models\Pengaturan::first();

                        $dendaPerHari =
                        $setting
                            ? (int) $setting->denda_per_hari
                            : 2000;

                        $totalDenda =
                        $hariTerlambat * $dendaPerHari;

                    @endphp

                    <tr class="border-t hover:bg-slate-50">

                        <td class="p-5">
                            {{ $loop->iteration }}
                        </td>

                        <td class="p-5">
                            {{ optional($item->anggota)->nama ?? 'Anggota Dihapus' }}
                        </td>

                        <td class="p-5">
                            {{ optional($item->buku)->judul ?? 'Buku Dihapus' }}
                        </td>

                        <td class="p-5 text-center">
                            {{ $item->tanggal_pinjam }}
                        </td>

                        <td class="p-5 text-center">
                            {{ $item->jatuh_tempo }}
                        </td>

                        <td class="p-5 text-center">

                            @if($telat)

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full font-medium">
                                    Terlambat
                                </span>

                            @else

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-medium">
                                    Tepat Waktu
                                </span>

                            @endif

                        </td>

                        <td class="p-5 text-center">

                            @if($telat)

                                <div class="flex flex-col items-center gap-1">

                                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full font-semibold">

                                        Rp {{ number_format($totalDenda,0,',','.') }}

                                    </span>

                                    <small class="text-slate-500">

                                        {{ $hariTerlambat }} hari ×
                                        Rp {{ number_format($dendaPerHari,0,',','.') }}

                                    </small>

                                </div>

                            @else

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">
                                    Tidak Ada
                                </span>

                            @endif

                        </td>

                        <td class="p-5 text-center">

                            <form
                                action="{{ route('pengembalian.kembalikan', $item->id) }}"
                                method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    onclick="return confirm('Yakin buku sudah dikembalikan?')"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl">

                                    Kembalikan

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="8"
                            class="text-center py-10 text-slate-400">

                            Tidak ada buku yang sedang dipinjam

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection