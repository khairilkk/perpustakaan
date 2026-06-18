@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-100 min-h-screen">

    <!-- Header -->
    <div class="mb-8">

        <h1 class="text-5xl font-bold text-gray-900">
            Pengaturan Denda
        </h1>

        <p class="text-gray-500 mt-2 text-lg">
            Atur kebijakan denda dan peminjaman
        </p>

    </div>

<div class="grid grid-cols-2 gap-8">

<!-- KIRI -->

<div class="bg-white rounded-3xl shadow-sm p-8">

<form action="{{ route('denda.update') }}"
method="POST">

@csrf

<h2 class="text-2xl font-semibold mb-2">

Konfigurasi Denda

</h2>

<p class="text-gray-500 mb-8">

Atur nilai denda dan batas waktu peminjaman

</p>


<!-- DENDA -->

<label class="font-semibold">

Denda per Hari (Rp)

</label>

<input
id="denda"
type="number"
name="denda_per_hari"
value="{{ $data->denda_per_hari }}"
step="100"
min="100"
oninput="updatePreview()"

class="
w-full
mt-2
mb-2
border
rounded-xl
px-5
py-3
focus:ring-2
focus:ring-blue-500
">

<p class="text-gray-500 mb-8">

Biaya yang dikenakan untuk setiap hari keterlambatan

</p>



<!-- HARI -->

<label class="font-semibold">

Maksimal Lama Peminjaman (Hari)

</label>

<input
id="hari"
type="number"
name="maksimal_pinjam"
value="{{ $data->maksimal_pinjam }}"
oninput="updatePreview()"

class="
w-full
mt-2
mb-2
border
rounded-xl
px-5
py-3
focus:ring-2
focus:ring-blue-500
">

<p class="text-gray-500 mb-8">

Durasi maksimal peminjaman buku dalam hari

</p>



<button
class="
w-full
bg-blue-600
hover:bg-blue-700
text-white
py-4
rounded-xl
font-semibold
">

💾 Simpan Pengaturan

</button>

</form>

</div>



<!-- KANAN -->

<div class="bg-white rounded-3xl shadow-sm p-8">

<h2 class="text-2xl font-semibold">

Informasi Aturan

</h2>

<p class="text-gray-500 mb-8">

Detail kebijakan peminjaman saat ini

</p>


<div class="space-y-5">

<!-- Denda -->

<div class="bg-gray-100 rounded-2xl p-6">

<p class="text-xl font-semibold">

Denda Keterlambatan

</p>

<h1
id="previewDenda"
class="text-5xl text-blue-600 font-bold mt-4">

Rp {{ number_format($data->denda_per_hari,0,',','.') }}

</h1>

<p class="text-gray-500 mt-2">

per hari

</p>

</div>


<!-- Lama -->

<div class="bg-gray-100 rounded-2xl p-6">

<p class="text-xl font-semibold">

Durasi Peminjaman

</p>

<h1
id="previewHari"
class="text-5xl text-blue-600 font-bold mt-4">

{{ $data->maksimal_pinjam }} Hari

</h1>

<p class="text-gray-500">

maksimal peminjaman

</p>

</div>



<!-- CONTOH -->

<div class="bg-blue-50 rounded-2xl p-6">

<h2 class="text-2xl font-semibold mb-5">

Contoh Perhitungan

</h2>

<div class="space-y-3">

<div class="flex justify-between">

<span>Terlambat 1 hari:</span>

<b id="h1">

Rp {{ number_format($data->denda_per_hari) }}

</b>

</div>

<div class="flex justify-between">

<span>Terlambat 3 hari:</span>

<b id="h3">

Rp {{ number_format($data->denda_per_hari*3) }}

</b>

</div>

<div class="flex justify-between">

<span>Terlambat 7 hari:</span>

<b id="h7">

Rp {{ number_format($data->denda_per_hari*7) }}

</b>

</div>

</div>

</div>


<!-- CATATAN -->

<div class="border rounded-2xl p-6">

<p class="font-semibold">

ⓘ Catatan

</p>

<p class="text-gray-500 mt-2">

Denda akan otomatis dihitung saat proses pengembalian buku yang terlambat.

</p>

</div>


</div>

</div>

</div>

</div>


<script>

function rupiah(x){

return "Rp "+
Number(x).toLocaleString("id-ID");

}

function updatePreview(){

let denda=
document
.getElementById("denda")
.value;

let hari=
document
.getElementById("hari")
.value;

document
.getElementById("previewDenda")
.innerHTML=
rupiah(denda);

document
.getElementById("previewHari")
.innerHTML=
hari+" Hari";

document
.getElementById("h1")
.innerHTML=
rupiah(denda);

document
.getElementById("h3")
.innerHTML=
rupiah(denda*3);

document
.getElementById("h7")
.innerHTML=
rupiah(denda*7);

}

</script>

@endsection