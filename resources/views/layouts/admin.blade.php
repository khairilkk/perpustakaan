<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Perpustakaan</title>

@vite([
'resources/css/app.css',
'resources/js/app.js'
])

</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

<!-- SIDEBAR -->

<aside
class="w-72 bg-gradient-to-b from-blue-900 via-blue-800 to-indigo-900 text-white shadow-2xl relative">

<!-- LOGO -->

<div class="p-7 border-b border-white/10">

<div class="flex items-center gap-4">

<div
class="w-16 h-16 rounded-3xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center shadow-xl">

<svg
xmlns="http://www.w3.org/2000/svg"
fill="none"
viewBox="0 0 24 24"
stroke-width="2"
stroke="currentColor"
class="w-8 h-8">

<path
stroke-linecap="round"
stroke-linejoin="round"
d="M3 6.75C3 5.784 3.784 5 4.75 5H19v14H6a3 3 0 00-3 3V6.75Z"/>

<path
stroke-linecap="round"
stroke-linejoin="round"
d="M19 19H6a2 2 0 012-2h11"/>

</svg>

</div>

<div>

<h1 class="text-3xl font-black">

Perpustakaan

</h1>

<p class="text-blue-200">

Admin Panel

</p>

</div>

</div>

</div>


<!-- MENU -->

<nav class="mt-6 px-4 space-y-2">

@php

$menus=[

[
'route'=>'dashboard',
'title'=>'Dashboard',
'icon'=>'home'
],

[
'route'=>'buku.index',
'title'=>'Data Buku',
'icon'=>'book'
],

[
'route'=>'anggota.index',
'title'=>'Data Anggota',
'icon'=>'user'
],

[
'route'=>'denda.index',
'title'=>'Denda',
'icon'=>'wallet'
],

[
'route'=>'peminjaman.index',
'title'=>'Peminjaman',
'icon'=>'pinjam'
],

[
'route'=>'pengembalian.index',
'title'=>'Pengembalian',
'icon'=>'check'
],

[
'route'=>'riwayat.index',
'title'=>'Riwayat',
'icon'=>'clock'
],

[
'route'=>'laporan.index',
'title'=>'Laporan',
'icon'=>'chart'

]

];

@endphp


@foreach($menus as $menu)

<a

href="{{ route($menu['route']) }}"

class="flex items-center gap-4 px-5 py-4 rounded-2xl transition

{{ request()->routeIs($menu['route'])

? 'bg-white text-blue-900 shadow-xl'

: 'hover:bg-white/10'

}}

"

>

<div class="w-6">

@if($menu['icon']=='home')

<svg fill="none" viewBox="0 0 24 24" stroke="currentColor">

<path stroke-width="2"
d="M3 10l9-7 9 7v10H3z"/>

</svg>

@elseif($menu['icon']=='book')

<svg fill="none" viewBox="0 0 24 24" stroke="currentColor">

<path stroke-width="2"
d="M5 5h14v14H5z"/>

</svg>

@elseif($menu['icon']=='user')

<svg fill="none" viewBox="0 0 24 24" stroke="currentColor">

<path stroke-width="2"
d="M12 12a4 4 0 100-8 4 4 0 000 8zm-7 9a7 7 0 0114 0"/>

</svg>

@elseif($menu['icon']=='wallet')

<svg fill="none" viewBox="0 0 24 24" stroke="currentColor">

<path stroke-width="2"
d="M3 8h18v10H3z"/>

</svg>

@elseif($menu['icon']=='pinjam')

<svg fill="none" viewBox="0 0 24 24" stroke="currentColor">

<path stroke-width="2"
d="M12 5v14m-7-7h14"/>

</svg>

@elseif($menu['icon']=='check')

<svg fill="none" viewBox="0 0 24 24" stroke="currentColor">

<path stroke-width="2"
d="M5 13l4 4L19 7"/>

</svg>

@elseif($menu['icon']=='clock')

<svg fill="none" viewBox="0 0 24 24" stroke="currentColor">

<circle cx="12"
cy="12"
r="9"/>

<path stroke-width="2"
d="M12 7v5l3 2"/>

</svg>

@elseif($menu['icon']=='chart')

<svg fill="none" viewBox="0 0 24 24" stroke="currentColor">

<path stroke-width="2"
d="M6 18V9m6 9V5m6 13v-7"/>

</svg>

@endif

</div>

<span class="font-semibold">

{{ $menu['title'] }}

</span>

</a>

@endforeach


</nav>

<!-- LOGOUT -->

<div class="absolute bottom-32 left-0 w-full px-6">

<form
method="POST"
action="{{ route('logout') }}">

@csrf

<button
type="submit"

class="

w-full

flex

items-center

gap-4

justify-center

bg-red-500

hover:bg-red-600

transition

py-4

rounded-2xl

font-semibold

shadow-lg

"

>

<!-- ICON -->

<svg
xmlns="http://www.w3.org/2000/svg"
fill="none"
viewBox="0 0 24 24"
stroke-width="2"
stroke="currentColor"
class="w-5 h-5">

<path
stroke-linecap="round"
stroke-linejoin="round"
d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-7.5A2.25 2.25 0 003.75 5.25v13.5A2.25 2.25 0 006 21h7.5a2.25 2.25 0 002.25-2.25V15"/>

<path
stroke-linecap="round"
stroke-linejoin="round"
d="M18 12H9m0 0l3-3m-3 3l3 3"/>

</svg>

Keluar

</button>

</form>

</div>

<!-- FOOTER -->

<div
class="absolute bottom-0 w-full p-6">

<div
class="bg-white/10 rounded-3xl p-5 backdrop-blur">

<p class="text-sm text-blue-200">

Sistem Informasi

</p>

<h3 class="font-bold">

Perpustakaan Modern

</h3>

</div>

</div>

</aside>


<!-- CONTENT -->

<main class="flex-1 p-8">

@yield('content')

</main>

</div>

</body>
</html>