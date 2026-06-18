@extends('layouts.admin')

@section('content')

<div class="p-8 bg-gray-100 min-h-screen">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-4xl font-bold text-gray-800">
                Data Anggota
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola data anggota perpustakaan
            </p>
        </div>

        <a href="{{ route('anggota.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">
            + Tambah Anggota
        </a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-5">
            {{ session('success') }}
        </div>
    @endif

    <!-- Card -->
    <div class="bg-white rounded-2xl shadow p-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold">
                Daftar Anggota
            </h2>

            <input
                type="text"
                placeholder="Cari anggota..."
                class="border border-gray-300 rounded-xl px-4 py-2 w-72">

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b text-left text-gray-600">

                        <th class="py-4">ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th class="text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($anggotas as $anggota)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="py-4">
                            {{ $anggota->id }}
                        </td>

                        <td>
                            {{ $anggota->nama }}
                        </td>

                        <td>
                            {{ $anggota->alamat }}
                        </td>

                        <td>
                            {{ $anggota->telepon }}
                        </td>

                        <td class="text-center">

                            <a href="{{ route('anggota.edit', $anggota->id) }}"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-2 rounded-lg mr-2 inline-block">
                                Edit
                            </a>

                            <form action="{{ route('anggota.destroy', $anggota->id) }}"
                                method="POST"
                                class="inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Yakin ingin menghapus anggota ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-10 text-gray-500">

                            Belum ada data anggota

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection