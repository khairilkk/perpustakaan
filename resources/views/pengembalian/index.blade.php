@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-100 min-h-screen">

    <div class="mb-8">

        <h1 class="text-5xl font-bold">
            Data Pengembalian
        </h1>

        <p class="text-gray-500 mt-2">
            Kelola transaksi pengembalian buku
        </p>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded-3xl shadow p-8">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="py-4">Nama</th>

                    <th>Buku</th>

                    <th>Tanggal Pinjam</th>

                    <th>Jatuh Tempo</th>

                    <th>Status</th>

                    <th class="text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($pinjams as $item)

                @php

                    $telat = now()->gt($item->jatuh_tempo);

                @endphp

                <tr class="border-b">

                    <td class="py-5">

                        {{ $item->anggota->nama }}

                    </td>

                    <td>

                        {{ $item->buku->judul }}

                    </td>

                    <td>

                        {{ $item->tanggal_pinjam }}

                    </td>

                    <td>

                        {{ $item->jatuh_tempo }}

                    </td>

                    <td>

                        @if($telat)

                            <span
                                class="
                                bg-red-100
                                text-red-600
                                px-4
                                py-2
                                rounded-full
                                ">

                                Terlambat

                            </span>

                        @else

                            <span
                                class="
                                bg-green-100
                                text-green-600
                                px-4
                                py-2
                                rounded-full
                                ">

                                Belum Telat

                            </span>

                        @endif

                    </td>

                    <td class="text-center">

                        <form
                            action="{{ route('pengembalian.kembalikan', $item->id) }}"
                            method="POST">

                            @csrf

                            <button
                                type="submit"
                                onclick="return confirm('Yakin buku sudah dikembalikan?')"
                                class="
                                bg-blue-600
                                hover:bg-blue-700
                                text-white
                                px-4
                                py-2
                                rounded-lg
                                ">

                                Kembalikan

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="6"
                        class="text-center py-10">

                        Tidak ada buku yang sedang dipinjam

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection