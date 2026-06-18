@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-slate-100 p-8">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-5xl font-bold text-slate-800">
                Dashboard
            </h1>

            <p class="text-slate-500 mt-2">
                Selamat datang di Sistem Informasi Perpustakaan
            </p>

        </div>

        <div class="bg-white px-6 py-4 rounded-2xl shadow">

            <p class="text-slate-500 text-sm">
                Hari Ini
            </p>

            <h3 class="font-bold text-lg">
                {{ now()->format('d F Y') }}
            </h3>

        </div>

    </div>

    <!-- CARD STATISTIK -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- TOTAL BUKU -->

        <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-3xl p-6 shadow-lg hover:scale-105 duration-300">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-blue-100">
                        Total Buku
                    </p>

                    <h2 class="text-5xl font-bold mt-3">
                        {{ $totalBuku }}
                    </h2>

                </div>

                <div class="bg-white/20 backdrop-blur-md p-4 rounded-2xl shadow-lg">

                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-10 h-10">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 6.042A8.967 8.967 0 006 4.5c-1.757 0-3.429.507-4.854 1.408A.75.75 0 001 6.556v12.388a.75.75 0 001.146.648A8.966 8.966 0 016 18c2.297 0 4.408.86 6 2.278M12 6.042A8.967 8.967 0 0118 4.5c1.757 0 3.429.507 4.854 1.408A.75.75 0 0123 6.556v12.388a.75.75 0 01-1.146.648A8.966 8.966 0 0018 18c-2.297 0-4.408.86-6 2.278"/>

                </svg>

                </div>

            </div>

        </div>

        <!-- TOTAL ANGGOTA -->

        <div class="bg-gradient-to-r from-green-500 to-emerald-700 text-white rounded-3xl p-6 shadow-lg hover:scale-105 duration-300">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-green-100">
                        Total Anggota
                    </p>

                    <h2 class="text-5xl font-bold mt-3">
                        {{ $totalAnggota }}
                    </h2>

                </div>

                <div class="bg-white/20 p-4 rounded-2xl">

                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-10 h-10">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M18 18.72a8.94 8.94 0 00-6-2.22 8.94 8.94 0 00-6 2.22m12 0a9 9 0 10-12 0m12 0A9 9 0 0112 21a9 9 0 01-6-2.28m6-6.72a3 3 0 100-6 3 3 0 000 6z"/>

                </svg>

            </div>

            </div>

        </div>

        <!-- DIPINJAM -->

        <div class="bg-gradient-to-r from-purple-500 to-violet-700 text-white rounded-3xl p-6 shadow-lg hover:scale-105 duration-300">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-purple-100">
                        Sedang Dipinjam
                    </p>

                    <h2 class="text-5xl font-bold mt-3">
                        {{ $totalPinjam }}
                    </h2>

                </div>

                <div class="bg-white/20 p-4 rounded-2xl">

                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-10 h-10">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 4.5h16.5v15h-16.5z"/>

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8.25 8.25h7.5"/>

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8.25 12h4.5"/>

                </svg>

                </div>

            </div>

        </div>

        <!-- TERLAMBAT -->

        <div class="bg-gradient-to-r from-red-500 to-pink-700 text-white rounded-3xl p-6 shadow-lg hover:scale-105 duration-300">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-red-100">
                        Terlambat
                    </p>

                    <h2 class="text-5xl font-bold mt-3">
                        {{ $terlambat }}
                    </h2>

                </div>

                <div class="bg-white/20 p-4 rounded-2xl">

                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-10 h-10">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 9v3.75m0 3.75h.008v.008H12v-.008zm9-3.758c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"/>

                </svg>

                </div>

            </div>

        </div>

    </div>


    <!-- BAGIAN TENGAH -->

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-8">

    <!-- DIAGRAM STATISTIK -->

<div class="bg-white rounded-3xl shadow-lg p-8">

@php

$totalKembali =
\App\Models\Peminjaman::where(
'status',
'Dikembalikan'
)->count();

$totalAktivitas =
$totalPinjam +
$totalKembali +
$terlambat;

$persenPinjam =
$totalAktivitas
? round(($totalPinjam/$totalAktivitas)*100)
: 0;

$persenKembali =
$totalAktivitas
? round(($totalKembali/$totalAktivitas)*100)
: 0;

$persenTerlambat =
$totalAktivitas
? round(($terlambat/$totalAktivitas)*100)
: 0;

@endphp


<h2 class="text-2xl font-bold mb-8">

Statistik Aktivitas

</h2>


<div class="space-y-8">

<!-- PEMINJAMAN -->

<div>

<div class="flex justify-between items-center mb-3">

<!-- KIRI -->
<div class="flex items-center gap-3">

<div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">

<svg
xmlns="http://www.w3.org/2000/svg"
class="w-5 h-5 text-blue-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path
stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 6.253v13M12 6.253C10.832 5.483 9.246 5 7.5 5A4.5 4.5 0 003 9.5v9A4.5 4.5 0 017.5 14c1.746 0 3.332.483 4.5 1.253"/>

</svg>

</div>

<span class="font-medium">

Peminjaman

</span>

</div>


<!-- KANAN -->

<span class="font-bold text-blue-600">

{{ $totalPinjam }}

({{ $persenPinjam }}%)

</span>

</div>


<!-- BAR -->

<div class="w-full h-5 bg-slate-200 rounded-full overflow-hidden">

<div
class="h-5 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 transition-all duration-1000"

style="width: {{ $persenPinjam }}%">

</div>

</div>

</div>


<!-- PENGEMBALIAN -->

<!-- PENGEMBALIAN -->

<div>

<div class="flex justify-between items-center mb-3">

<div class="flex items-center gap-3">

<div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center">

<svg
xmlns="http://www.w3.org/2000/svg"
class="w-5 h-5 text-green-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path
stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M5 13l4 4L19 7"/>

</svg>

</div>

<span class="font-medium">

Pengembalian

</span>

</div>

<span class="font-bold text-green-600">

{{ $totalKembali }}

({{ $persenKembali }}%)

</span>

</div>

<div class="w-full h-5 bg-slate-200 rounded-full overflow-hidden">

<div
class="h-5 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 transition-all duration-1000"
style="width: {{ $persenKembali }}%">

</div>

</div>

</div>


<!-- TERLAMBAT -->

<div>

<div class="flex justify-between items-center mb-3">

<div class="flex items-center gap-3">

<div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center">

<svg
xmlns="http://www.w3.org/2000/svg"
class="w-5 h-5 text-red-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path
stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M12 9v2m0 4h.01M10.29 3.86l-8 14A1 1 0 003.14 19h17.72a1 1 0 00.85-1.5l-8-14a1 1 0 00-1.72 0z"/>

</svg>

</div>

<span class="font-medium">

Keterlambatan

</span>

</div>

<span class="font-bold text-red-600">

{{ $terlambat }}

({{ $persenTerlambat }}%)

</span>

</div>

<div class="w-full h-5 bg-slate-200 rounded-full overflow-hidden">

<div
class="h-5 rounded-full bg-gradient-to-r from-red-500 to-pink-600 transition-all duration-1000"
style="width: {{ $persenTerlambat }}%">

</div>

</div>

</div>


<!-- TOTAL -->

<div
class="bg-gradient-to-r
from-blue-50
to-indigo-50
rounded-2xl
p-5
mt-6">

<p class="text-gray-500">

Total Aktivitas

</p>

<h2 class="text-4xl font-bold text-slate-800">

{{ $totalAktivitas }}

</h2>

</div>

</div>

</div>


        <!-- DAFTAR TERLAMBAT -->

        <div class="xl:col-span-2 bg-white rounded-3xl shadow-lg p-6">

            <h2 class="text-2xl font-bold text-red-500 mb-6 flex items-center gap-3">

                <div class="bg-red-100 p-2 rounded-xl">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6 text-red-600">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v3.75m0 3.75h.008v.008H12v-.008zm9-3.758c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />

                    </svg>

                </div>

                Daftar Keterlambatan

            </h2>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="border-b">

                            <th class="text-left py-3">
                                Anggota
                            </th>

                            <th class="text-left">
                                Buku
                            </th>

                            <th class="text-left">
                                Jatuh Tempo
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($peminjamanTerlambat as $item)

                        <tr class="border-b hover:bg-red-50">

                            <td class="py-4">
                                {{ $item->anggota->nama }}
                            </td>

                            <td>
                                {{ $item->buku->judul }}
                            </td>

                            <td class="text-red-500 font-bold">
                                {{ $item->jatuh_tempo }}
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3"
                                class="text-center py-10 text-green-600 font-semibold">

                                Tidak Ada Keterlambatan 🎉

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <!-- FOOTER -->

    <div class="mt-8 bg-gradient-to-r from-indigo-600 to-blue-700 rounded-3xl shadow-lg p-8 text-white">

        <h2 class="text-3xl font-bold">

            📚 Sistem Informasi Perpustakaan

        </h2>

        <p class="mt-2 text-indigo-100">

            Kelola buku, anggota, peminjaman, pengembalian dan laporan dengan lebih mudah.

        </p>

    </div>

</div>

@endsection