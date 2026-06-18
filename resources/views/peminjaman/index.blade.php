@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-100 min-h-screen">

<div class="mb-8">

<h1 class="text-4xl font-bold">
Peminjaman Buku
</h1>

<p class="text-gray-500">
Kelola transaksi peminjaman
</p>

</div>

<div class="grid grid-cols-3 gap-6">

<!-- FORM -->
<div class="col-span-2">

<div class="bg-white rounded-2xl shadow p-8">

<form
action="{{ route('peminjaman.store') }}"
method="POST">

@csrf


<!-- ANGGOTA -->
<div class="mb-6">

<label class="font-semibold">
Pilih Anggota
</label>

<select
id="anggota"
name="anggota_id"
class="w-full border rounded-xl p-3 mt-2"
required>

<option value="">
Pilih anggota
</option>

@foreach($anggotas as $anggota)

<option value="{{ $anggota->id }}">

{{ $anggota->nama }}

</option>

@endforeach

</select>

</div>



<!-- BUKU -->
<div class="mb-6">

<label class="font-semibold">
Pilih Buku
</label>

<select
id="buku"
name="buku_id"
class="w-full border rounded-xl p-3 mt-2"
required>

<option value="">
Pilih buku
</option>

@foreach($bukus as $buku)

<option value="{{ $buku->id }}">

{{ $buku->judul }}

</option>

@endforeach

</select>

</div>



<div class="grid grid-cols-3 gap-6">

<!-- TANGGAL -->
<div>

<label>
Tanggal Pinjam
</label>

<input
type="date"
id="tanggal_pinjam"
name="tanggal_pinjam"
class="w-full border rounded-xl p-3 mt-2"
required>

</div>



<!-- DURASI -->
<div>

<label>
Durasi (Hari)
</label>

<input
type="number"
id="durasi"
name="durasi"
value="7"
min="1"
class="w-full border rounded-xl p-3 mt-2">

</div>



<!-- JATUH TEMPO -->
<div>

<label>
Jatuh Tempo
</label>

<input
type="date"
id="jatuh_tempo"
readonly
class="w-full border rounded-xl p-3 mt-2 bg-gray-100">

</div>

</div>



<button
class="mt-8 w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl">

Simpan Peminjaman

</button>

</form>

</div>

</div>



<!-- INFORMASI -->
<div>

<div class="bg-white rounded-2xl shadow p-8">

<h2 class="text-2xl font-bold mb-6">

Informasi

</h2>

<div class="space-y-5">

<div class="border rounded-xl p-4">

<p class="text-gray-500">
Anggota
</p>

<p
id="infoAnggota"
class="font-bold">

Belum dipilih

</p>

</div>


<div class="border rounded-xl p-4">

<p class="text-gray-500">
Buku
</p>

<p
id="infoBuku"
class="font-bold">

Belum dipilih

</p>

</div>


<div class="border rounded-xl p-4">

<p class="text-gray-500">
Durasi
</p>

<p
id="infoDurasi"
class="font-bold">

7 Hari

</p>

</div>


<div class="border rounded-xl p-4">

<p class="text-gray-500">
Status
</p>

<p class="text-blue-600 font-bold">

Siap Dipinjam

</p>

</div>

</div>

</div>

</div>

</div>

</div>



<script>

document
.getElementById('anggota')
.addEventListener(
'change',
function(){

document
.getElementById(
'infoAnggota'
)
.innerHTML=
this.options[
this.selectedIndex
].text;

}
);



document
.getElementById('buku')
.addEventListener(
'change',
function(){

document
.getElementById(
'infoBuku'
)
.innerHTML=
this.options[
this.selectedIndex
].text;

}
);



function hitungTempo(){

let tanggal=
document
.getElementById(
'tanggal_pinjam'
)
.value;

let durasi=
document
.getElementById(
'durasi'
)
.value;

if(
tanggal
&&
durasi
){

let t=
new Date(
tanggal
);

t.setDate(
t.getDate()
+
parseInt(
durasi
)
);

let hasil=
t.toISOString()
.split(
'T'
)[0];

document
.getElementById(
'jatuh_tempo'
)
.value=
hasil;

document
.getElementById(
'infoDurasi'
)
.innerHTML=
durasi+
' Hari';

}

}



document
.getElementById(
'tanggal_pinjam'
)
.addEventListener(
'change',
hitungTempo
);

document
.getElementById(
'durasi'
)
.addEventListener(
'input',
hitungTempo
);

</script>

@endsection