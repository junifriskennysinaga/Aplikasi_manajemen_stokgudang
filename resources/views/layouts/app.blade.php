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
    <div class="w-64 bg-blue-900 text-white min-h-screen p-5 shadow-lg">

        <h2 class="text-2xl font-bold mb-8 text-center border-b pb-3">
            📦Stok Gudang
        </h2>

        <ul class="space-y-2 text-sm">

            <li>
                <a href="/dashboard" class="block hover:bg-blue-700 p-2 rounded">
                    🏠 Dashboard
                </a>
            </li>

            {{-- ADMIN ONLY --}}
            @if(auth()->user()->role == 'admin')

            <li>
                <a href="/kategori" class="block hover:bg-blue-700 p-2 rounded">
                    📂 Kategori
                </a>
            </li>

            <li>
                <a href="/barang" class="block hover:bg-blue-700 p-2 rounded">
                    📦 Data Barang
                </a>
            </li>

            <li>
                <a href="/barang-masuk" class="block hover:bg-blue-700 p-2 rounded">
                    ⬇️ Barang Masuk
                </a>
            </li>

            <li>
                <a href="/barang-keluar" class="block hover:bg-blue-700 p-2 rounded">
                    ⬆️ Barang Keluar
                </a>
            </li>

            @endif

            {{-- SEMUA ROLE --}}
            <li>
                <a href="/laporan" class="block hover:bg-blue-700 p-2 rounded">
                    📊 Laporan
                </a>
            </li>

        </ul>

    </div>

    <!-- CONTENT -->
    <div class="flex-1 flex flex-col min-h-screen">

        <!-- NAVBAR -->
        <div class="bg-white shadow-md px-6 py-4 flex justify-between items-center">

            <h1 class="font-bold text-lg text-gray-700">
                Aplikasi Manajemen Stok Gudang
            </h1>

            <div class="flex items-center gap-4">

                <!-- USER INFO -->
                <div class="text-right">
                    <p class="font-semibold text-sm">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-xs text-gray-500">
                        ({{ auth()->user()->role }})
                    </p>
                </div>

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>

            </div>

        </div>

        <!-- PAGE CONTENT -->
        <div class="p-6 flex-1">
            @yield('content')
        </div>

        <!-- FOOTER -->
        <div class="bg-white text-center text-xs text-gray-500 py-2 border-t">
            © {{ date('Y') }} Sistem Stok Gudang
        </div>

    </div>

</div>

</body>
</html>