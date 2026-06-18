@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto p-8">

    <!-- Header -->

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-slate-800">

            Edit Buku

        </h1>

        <p class="text-slate-500">

            Ubah data dan kategori buku

        </p>

    </div>


    <div class="bg-white rounded-3xl shadow-lg p-8">

        <form
            action="{{ route('buku.update',$buku->id) }}"
            method="POST">

            @csrf
            @method('PUT')


            <!-- KODE -->

            <div class="mb-5">

                <label class="block mb-2 font-semibold">

                    Kode Buku

                </label>

                <input
                    type="text"
                    value="{{ $buku->kode_buku }}"
                    readonly
                    class="w-full border rounded-xl px-4 py-3 bg-gray-100">

            </div>



            <!-- JUDUL -->

            <div class="mb-5">

                <label class="block mb-2 font-semibold">

                    Judul Buku

                </label>

                <input
                    type="text"
                    name="judul"
                    value="{{ $buku->judul }}"
                    required
                    class="w-full border rounded-xl px-4 py-3">

            </div>



            <!-- PENULIS -->

            <div class="mb-5">

                <label class="block mb-2 font-semibold">

                    Penulis

                </label>

                <input
                    type="text"
                    name="penulis"
                    value="{{ $buku->penulis }}"
                    required
                    class="w-full border rounded-xl px-4 py-3">

            </div>



            <!-- KATEGORI -->

            <div class="mb-5">

                <label class="block mb-2 font-semibold">

                    Kategori

                </label>

                <select
                    name="kategori"
                    required
                    class="w-full border rounded-xl px-4 py-3">

                    <option value="Umum"
                    {{ $buku->kategori=='Umum' ? 'selected':'' }}>
                        Umum
                    </option>

                    <option value="Novel"
                    {{ $buku->kategori=='Novel' ? 'selected':'' }}>
                        Novel
                    </option>

                    <option value="Komik"
                    {{ $buku->kategori=='Komik' ? 'selected':'' }}>
                        Komik
                    </option>

                    <option value="Sains"
                    {{ $buku->kategori=='Sains' ? 'selected':'' }}>
                        Sains
                    </option>

                    <option value="Teknologi"
                    {{ $buku->kategori=='Teknologi' ? 'selected':'' }}>
                        Teknologi
                    </option>

                    <option value="Sejarah"
                    {{ $buku->kategori=='Sejarah' ? 'selected':'' }}>
                        Sejarah
                    </option>

                    <option value="Pendidikan"
                    {{ $buku->kategori=='Pendidikan' ? 'selected':'' }}>
                        Pendidikan
                    </option>

                </select>

            </div>



            <!-- STOK -->

            <div class="mb-8">

                <label class="block mb-2 font-semibold">

                    Stok

                </label>

                <input
                    type="number"
                    name="stok"
                    value="{{ $buku->stok }}"
                    required
                    class="w-full border rounded-xl px-4 py-3">

            </div>



            <!-- BUTTON -->

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl">

                    Simpan Perubahan

                </button>

                <a
                    href="{{ route('buku.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 px-8 py-3 rounded-xl">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection