@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">
        Tambah Anggota
    </h1>

    <div class="bg-white p-6 rounded-xl shadow">

        <form action="{{ route('anggota.store') }}" method="POST">

            @csrf

            <div class="mb-4">
                <label class="block mb-2">Nama</label>
                <input type="text"
                       name="nama"
                       class="w-full border rounded-lg px-4 py-2"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-2">Alamat</label>
                <textarea name="alamat"
                          class="w-full border rounded-lg px-4 py-2"
                          required></textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-2">Telepon</label>
                <input type="text"
                       name="telepon"
                       class="w-full border rounded-lg px-4 py-2"
                       required>
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg">

                Simpan

            </button>

        </form>

    </div>

</div>

@endsection