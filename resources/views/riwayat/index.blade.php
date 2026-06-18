@extends('layouts.admin')

@section('content')

<div class="p-8">

    <h1 class="text-5xl font-bold">
        Riwayat
    </h1>

    <p class="text-gray-500">
        Daftar transaksi peminjaman dan pengembalian
    </p>

    <!-- CARD -->
    <div class="grid grid-cols-3 gap-6 mt-8">

        <div class="bg-white p-6 rounded-xl shadow">

            <p>Total Transaksi</p>

            <h1 class="text-5xl mt-4">
                {{ $total }}
            </h1>

        </div>

        <div class="bg-white p-6 rounded-xl shadow">

            <p>Tepat Waktu</p>

            <h1 class="text-5xl text-blue-600 mt-4">
                {{ $tepat }}
            </h1>

        </div>

        <div class="bg-white p-6 rounded-xl shadow">

            <p>Total Denda</p>

            <h1 class="text-5xl text-red-600 mt-4">
                Rp {{ number_format($totalDenda,0,',','.') }}
            </h1>

        </div>

    </div>

    <!-- TABEL -->
    <div class="bg-white p-6 rounded-xl mt-8 shadow">

        <table class="w-full border-separate border-spacing-y-3">

            <thead>

                <tr class="text-left text-gray-500">

                    <th class="px-4 py-3">Anggota</th>

                    <th class="px-4 py-3">Buku</th>

                    <th class="px-4 py-3">Tgl Pinjam</th>

                    <th class="px-4 py-3">Tgl Kembali</th>

                    <th class="px-4 py-3">Jatuh Tempo</th>

                    <th class="px-4 py-3">Status</th>

                    <th class="px-4 py-3 text-right">Denda</th>

                </tr>

            </thead>

            <tbody>

                @forelse($riwayats as $item)

                <tr class="bg-gray-50">

                    <td class="px-4 py-4">
                        {{ $item->anggota->nama }}
                    </td>

                    <td class="px-4 py-4">
                        {{ $item->buku->judul }}
                    </td>

                    <td class="px-4 py-4">
                        {{ $item->tanggal_pinjam }}
                    </td>

                    <td class="px-4 py-4">
                        {{ $item->tanggal_kembali ?? '-' }}
                    </td>

                    <td class="px-4 py-4">
                        {{ $item->jatuh_tempo }}
                    </td>

                    <td class="px-4 py-4">

                        @if($item->status_view == 'Terlambat')

                            <span class="bg-red-500 text-white px-3 py-1 rounded-full">
                                Terlambat
                            </span>

                        @else

                            <span class="bg-blue-500 text-white px-3 py-1 rounded-full">
                                Tepat Waktu
                            </span>

                        @endif

                    </td>

                    <td class="px-4 py-4 text-right">

                        Rp {{ number_format($item->denda_view,0,',','.') }}

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center py-10 text-gray-500">

                        Belum ada riwayat transaksi

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection