@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">
                Tambah Buku
            </h1>

            <p class="text-gray-500">
                Tambahkan data buku baru ke perpustakaan
            </p>
        </div>

        <a href="{{ route('buku.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-xl">

            Kembali

        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-8">

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded-xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded-xl mb-6">

                <ul class="list-disc ml-5">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif

        <form action="{{ route('buku.store') }}" method="POST">

            @csrf

            <!-- Kode Buku -->
            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Kode Buku
                </label>

                <input
                    type="text"
                    name="kode_buku"
                    value="{{ old('kode_buku') }}"
                    class="w-full border rounded-xl px-4 py-3"
                    placeholder="BK001"
                    required>

            </div>

            <!-- Judul -->
            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Judul Buku
                </label>

                <input
                    type="text"
                    name="judul"
                    value="{{ old('judul') }}"
                    class="w-full border rounded-xl px-4 py-3"
                    placeholder="Masukkan judul buku"
                    required>

            </div>

            <!-- Penulis -->
            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Penulis
                </label>

                <input
                    type="text"
                    name="penulis"
                    value="{{ old('penulis') }}"
                    class="w-full border rounded-xl px-4 py-3"
                    placeholder="Nama penulis"
                    required>

            </div>

            <!--kategori-->
            <div class="mb-6">

            <label class="font-semibold">

            

            Kategori

            </label>

            <input
            type="text"
            name="kategori"
            placeholder="Contoh: Sains"
            class="w-full border rounded-xl px-4 py-3">

            </div>

            <!-- Stok -->
            <div class="mb-6">

                <label class="block mb-2 font-semibold">
                    Stok
                </label>

                <input
                    type="number"
                    name="stok"
                    value="{{ old('stok') }}"
                    class="w-full border rounded-xl px-4 py-3"
                    placeholder="Jumlah stok"
                    required>

            </div>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold">

                Simpan Buku

            </button>

        </form>

    </div>

</div>

@endsection