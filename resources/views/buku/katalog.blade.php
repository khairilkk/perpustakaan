@extends('layouts.admin')

@section('content')

<div class="p-8">

<div class="mb-8">

<h1 class="text-5xl font-bold">

Katalog Buku

</h1>

<p class="text-gray-500">

Cari dan lihat koleksi buku

</p>

</div>


<input
type="text"
placeholder="Cari buku..."
class="w-full p-4 rounded-2xl border mb-8">


<div
class="grid grid-cols-4 gap-6">

@foreach($bukus as $buku)

<div
class="bg-white rounded-3xl shadow p-5">

<div
class="h-56 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">

<svg
class="w-20 text-white"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path
stroke-width="1.5"
d="M5 5h14v14H5z"/>

</svg>

</div>

<h2
class="text-2xl font-bold mt-5">

{{ $buku->judul }}

</h2>

<p class="text-gray-500">

{{ $buku->penulis }}

</p>

<div class="mt-5">

@if($buku->stok>0)

<span
class="bg-green-100 text-green-600 px-3 py-1 rounded-full">

Tersedia

</span>

@else

<span
class="bg-red-100 text-red-600 px-3 py-1 rounded-full">

Habis

</span>

@endif

</div>

<p class="mt-3">

Stok:
<b>

{{ $buku->stok }}

</b>

</p>

</div>

@endforeach

</div>

</div>

@endsection