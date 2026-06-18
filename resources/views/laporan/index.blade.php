@extends('layouts.admin')

@section('content')

<div class="p-8">

    <div class="flex justify-between mb-8">

        <div>
            <h1 class="text-4xl font-bold">
                Laporan
            </h1>

            <p class="text-gray-500">
                Ringkasan dan statistik perpustakaan
            </p>
        </div>

        <a href="{{ route('laporan.pdf') }}"
            class="bg-blue-600 text-white px-5 py-3 rounded-xl">

            Export PDF

        </a>

    </div>

    <div class="grid md:grid-cols-4 gap-6">

        <div class="bg-white p-6 rounded-xl shadow">
            <h3>Total Buku</h3>
            <h1 class="text-4xl font-bold">
                {{ $totalBuku }}
            </h1>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3>Total Anggota</h3>
            <h1 class="text-4xl font-bold">
                {{ $totalAnggota }}
            </h1>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3>Pengembalian</h3>
            <h1 class="text-4xl font-bold">
                {{ $persentasePengembalian }}%
            </h1>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3>Keterlambatan</h3>
            <h1 class="text-4xl font-bold text-red-500">
                {{ $terlambat }}
            </h1>
        </div>

    </div>

    <div class="grid md:grid-cols-2 gap-6 mt-8">

        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-2xl font-bold mb-4">
                Statistik Bulan Ini
            </h2>

            <div class="space-y-4">

                <div>
                    Buku Dipinjam :
                    <strong>{{ $bukuDipinjam }}</strong>
                </div>

                <div>
                    Buku Dikembalikan :
                    <strong>{{ $bukuDikembalikan }}</strong>
                </div>

            </div>

        </div>

        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-2xl font-bold mb-4">
                Buku Paling Populer
            </h2>

            @foreach($bukuPopuler as $item)

                <div class="mb-4">

                    <div class="flex justify-between">

                        <span>
                            {{ $item->buku->judul }}
                        </span>

                        <span>
                            {{ $item->total }} peminjaman
                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection