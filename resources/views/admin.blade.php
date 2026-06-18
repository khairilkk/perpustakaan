<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Perpustakaan</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-72 bg-blue-800 text-white">

        <div class="p-6 border-b border-blue-700">
            <div class="flex items-center gap-3">

                <div class="w-14 h-14 rounded-2xl bg-cyan-400 flex items-center justify-center text-2xl">
                    📖
                </div>

                <div>
                    <h2 class="font-bold text-2xl">
                        Perpustakaan
                    </h2>

                    <p class="text-blue-200">
                        Admin Panel
                    </p>
                </div>

            </div>
        </div>

        <nav class="mt-8 space-y-2 px-3">

            <a href="{{ route('dashboard') }}"
               class="block px-5 py-4 rounded-xl hover:bg-blue-600">
                📊 Dashboard
            </a>

            <a href="{{ route('buku.index') }}"
               class="block px-5 py-4 rounded-xl hover:bg-blue-600">
                📚 Data Buku
            </a>

            <a href="{{ route('anggota.index') }}"
               class="block px-5 py-4 rounded-xl hover:bg-blue-600">
                👥 Data Anggota
            </a>

            <a href="{{ route('denda.index') }}"
               class="block px-5 py-4 rounded-xl hover:bg-blue-600">
                💰 Denda
            </a>

            <a href="{{ route('peminjaman.index') }}"
               class="block px-5 py-4 rounded-xl hover:bg-blue-600">
                📖 Peminjaman
            </a>

            <a href="{{ route('pengembalian.index') }}"
               class="block px-5 py-4 rounded-xl hover:bg-blue-600">
                ✅ Pengembalian
            </a>

            <a href="{{ route('riwayat.index') }}"
               class="block px-5 py-4 rounded-xl hover:bg-blue-600">
                🕒 Riwayat
            </a>

            <a href="{{ route('laporan.index') }}"
               class="block px-5 py-4 rounded-xl hover:bg-blue-600">
                📄 Laporan
            </a>

        </nav>

    </aside>

    <!-- Content -->
    <main class="flex-1 p-8">

        @yield('content')

    </main>

</div>

</body>
</html>