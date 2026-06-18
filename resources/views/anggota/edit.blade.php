@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-4xl font-bold text-gray-800">
                Edit Anggota
            </h1>

            <p class="text-gray-500">
                Ubah data anggota perpustakaan
            </p>
        </div>

        <a href="{{ route('anggota.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-xl">

            Kembali

        </a>

    </div>

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <form action="{{ route('anggota.update', $anggota->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Nama
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ $anggota->nama }}"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

            </div>

            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    class="w-full border rounded-xl px-4 py-3"
                    required>{{ $anggota->alamat }}</textarea>

            </div>

            <div class="mb-6">

                <label class="block mb-2 font-semibold">
                    Telepon
                </label>

                <input
                    type="text"
                    name="telepon"
                    value="{{ $anggota->telepon }}"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

            </div>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold">

                Update Anggota

            </button>

        </form>

    </div>

</div>

@endsection