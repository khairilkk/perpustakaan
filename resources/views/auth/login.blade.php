<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#F1F4F9] flex items-center justify-center min-h-screen">

<div class="w-full max-w-3xl bg-white rounded-3xl shadow-md p-12">

    <!-- Logo -->
    <div class="flex justify-center">
        <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center">

            <!-- Icon Buku -->
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-12 h-12 text-blue-600"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5s3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
            </svg>

        </div>
    </div>

    <!-- Judul -->
    <div class="text-center mt-6">
        <h1 class="text-5xl font-bold text-slate-800">
            Sistem Perpustakaan
        </h1>

        <p class="text-2xl text-slate-500 mt-2">
            Login Admin
        </p>
    </div>

    <!-- ERROR LOGIN -->
    @if ($errors->any())
        <div class="mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl">
            <strong>Login Gagal!</strong>
            <p>{{ $errors->first() }}</p>
        </div>
    @endif

    <!-- FORM LOGIN -->
    <form method="POST" action="{{ route('login') }}" class="mt-10">
        @csrf

        <!-- Username -->
        <div class="mb-6">
            <label class="block text-xl font-semibold mb-3">
                Username
            </label>

            <div class="relative">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="absolute left-4 top-4 w-6 h-6 text-gray-400"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan username"
                    required
                    class="w-full border border-gray-300 rounded-xl py-4 pl-14 pr-4 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <!-- Password -->
        <div class="mb-8">
            <label class="block text-xl font-semibold mb-3">
                Password
            </label>

            <div class="relative">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="absolute left-4 top-4 w-6 h-6 text-gray-400"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3 1.343 3 3 3zm0 0v2m-4 8h8a2 2 0 002-2v-3a4 4 0 00-4-4H10a4 4 0 00-4 4v3a2 2 0 002 2z"/>
                </svg>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                    class="w-full border border-gray-300 rounded-xl py-4 pl-14 pr-4 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <!-- Tombol Login -->
        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xl py-4 rounded-xl transition duration-300">

            Login
        </button>

    </form>

</div>

</body>
</html>