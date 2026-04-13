<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stok Gudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <div class="w-64 bg-blue-900 text-white min-h-screen p-4">
        <h2 class="text-xl font-bold mb-6">Stok Gudang</h2>

        <ul class="space-y-3">
            <li><a href="/dashboard" class="block hover:bg-blue-700 p-2 rounded">Dashboard</a></li>
            <li><a href="/kategori" class="block hover:bg-blue-700 p-2 rounded">Kategori</a></li>
            <li><a href="/barang" class="block hover:bg-blue-700 p-2 rounded">Barang</a></li>
            <li><a href="/barang-masuk" class="block hover:bg-blue-700 p-2 rounded">Barang Masuk</a></li>
            <li><a href="/barang-keluar" class="block hover:bg-blue-700 p-2 rounded">Barang Keluar</a></li>
            <li><a href="/laporan" class="block hover:bg-blue-700 p-2 rounded">Laporan</a></li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="flex-1">

        <!-- NAVBAR -->
        <div class="bg-white shadow p-4 flex justify-between">
            <h1 class="font-bold text-lg">
                Selamat Datang di Aplikasi Manajemen Stok Gudang
            </h1>

            <div class="flex items-center gap-4">

    <span class="font-semibold">
        {{ auth()->user()->name }}
    </span>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
            Logout
        </button>
    </form>

</div>
        </div>

        <!-- PAGE -->
        <div class="p-6">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>