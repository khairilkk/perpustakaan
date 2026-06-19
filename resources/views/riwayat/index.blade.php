@extends('layouts.admin')

@section('content')

<div class="p-8 bg-slate-100 min-h-screen">

    <!-- HEADER -->

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-slate-800">
            Riwayat Peminjaman
        </h1>

        <p class="text-slate-500 mt-2">
            Riwayat seluruh aktivitas peminjaman dan pengembalian buku
        </p>

    </div>

    <!-- STATISTIK -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-3xl shadow-lg p-6">

            <p class="text-slate-500 text-sm">
                Total Transaksi
            </p>

            <h2 class="text-4xl font-bold text-slate-800 mt-2">
                {{ $totalTransaksi }}
            </h2>

        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6">

            <p class="text-green-600 text-sm">
                Tepat Waktu
            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-2">
                {{ $tepatWaktu }}
            </h2>

        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6">

            <p class="text-red-600 text-sm">
                Terlambat
            </p>

            <h2 class="text-4xl font-bold text-red-600 mt-2">
                {{ $terlambat }}
            </h2>

        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6">

            <p class="text-yellow-600 text-sm">
                Total Denda
            </p>

            <h2 class="text-3xl font-bold text-yellow-600 mt-2">
                Rp {{ number_format($totalDenda,0,',','.') }}
            </h2>

        </div>

    </div>

    <!-- TABEL -->

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="p-6 border-b">

            <h2 class="text-2xl font-bold text-slate-800">
                Data Riwayat
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-slate-50 text-slate-600">

                        <th class="p-5 text-center">
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
                            Tanggal Kembali
                        </th>

                        <th class="p-5 text-center">
                            Status
                        </th>

                        <th class="p-5 text-center">
                            Hari Telat
                        </th>

                        <th class="p-5 text-center">
                            Denda
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($riwayats as $item)

                    @php

                        $denda =
                        optional(
                            $item->dataDenda
                        )->jumlah_denda ?? 0;

                        $hariTelat =
                        optional(
                            $item->dataDenda
                        )->hari_terlambat ?? 0;

                    @endphp

                    <tr class="border-t hover:bg-slate-50 transition">

                        <td class="p-5 text-center">
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
                            {{ $item->tanggal_kembali ?? '-' }}
                        </td>

                        <td class="p-5 text-center">

                            @if($item->status == 'Dipinjam')

                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-medium">
                                    Belum Dikembalikan
                                </span>

                            @elseif($denda > 0)

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

                            @if($hariTelat > 0)

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                                    {{ $hariTelat }} Hari

                                </span>

                            @else

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                                    0 Hari

                                </span>

                            @endif

                        </td>

                        <td class="p-5 text-center">

                            @if($denda > 0)

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full font-semibold">

                                    Rp {{ number_format($denda,0,',','.') }}

                                </span>

                            @else

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">

                                    Tidak Ada

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="8"
                            class="text-center py-10 text-slate-400">

                            Belum ada riwayat transaksi

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection