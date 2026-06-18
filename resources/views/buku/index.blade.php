@extends('layouts.admin')

@section('content')

<div class="p-8 bg-slate-100 min-h-screen">

<!-- HEADER -->

<div class="flex justify-between items-center mb-8">

<div>

<h1 class="text-5xl font-bold text-slate-800">

Data Buku

</h1>

<p class="text-slate-500 mt-2">

Kelola koleksi dan kategori buku

</p>

</div>

<a
href="{{ route('buku.create') }}"

class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl shadow">

Tambah Buku

</a>

</div>


<!-- ALERT -->

@if(session('success'))

<div
class="bg-green-100 text-green-700 p-4 rounded-2xl mb-6">

{{ session('success') }}

</div>

@endif


<!-- FILTER -->

<div
class="bg-white rounded-3xl shadow p-6 mb-6">

<form
method="GET"
action="{{ route('buku.index') }}">

<div
class="flex gap-4 items-center flex-wrap">

<input

type="text"

name="search"

value="{{ request('search') }}"

placeholder="Cari judul buku..."

class="border rounded-2xl px-5 py-3 flex-1"

>

<select

name="kategori"

class="border rounded-2xl px-5 py-3"

>

<option value="">

Semua Kategori

</option>

@foreach($kategori as $item)

<option

value="{{ $item }}"

{{ request('kategori')==$item ? 'selected':'' }}

>

{{ $item }}

</option>

@endforeach

</select>

<button

class="bg-blue-600 hover:bg-blue-700 text-white px-6 rounded-2xl"

>

Filter

</button>

</div>

</form>

</div>



<!-- TABLE -->

<div
class="bg-white rounded-3xl shadow overflow-hidden">

<div
class="p-6 border-b">

<h2
class="text-2xl font-bold">

Daftar Buku

</h2>

</div>


<div class="overflow-x-auto">

<table class="w-full">

<thead>

<tr
class="bg-slate-50">

<th class="p-5">

Kode

</th>

<th>

Judul

</th>

<th>

Kategori

</th>

<th>

Penulis

</th>

<th>

Stok

</th>

<th>

Status

</th>

<th class="text-center">

Aksi

</th>

</tr>

</thead>


<tbody>

@forelse($bukus as $buku)

<tr
class="border-b hover:bg-blue-50">

<td class="p-5">

{{ $buku->kode_buku }}

</td>

<td>

<div class="font-bold">

{{ $buku->judul }}

</div>

</td>

<td>

<span
class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full">

{{ $buku->kategori }}

</span>

</td>

<td>

{{ $buku->penulis }}

</td>

<td>

{{ $buku->stok }}

</td>

<td>

@if($buku->stok>0)

<span
class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

Tersedia

</span>

@else

<span
class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

Habis

</span>

@endif

</td>

<td
class="text-center">

<div
class="flex justify-center gap-2">

<a

href="{{ route(
'buku.edit',
$buku->id
) }}"

class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl"

>

Edit

</a>

<form

action="{{ route(
'buku.destroy',
$buku->id
) }}"

method="POST"

>

@csrf

@method('DELETE')

<button

onclick="return confirm('Hapus buku?')"

class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl"

>

Hapus

</button>

</form>

</div>

</td>

</tr>

@empty

<tr>

<td
colspan="7"

class="text-center py-20 text-gray-500">

Belum ada buku

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

@endsection