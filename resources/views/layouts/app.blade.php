<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Ware - Stok Gudang</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-blue-900 text-white p-5 shadow-xl">

        <h2 class="text-xl font-bold mb-8 flex items-center gap-2 border-b border-blue-700 pb-4">
            <i data-lucide="box"></i>
            E-Ware
        </h2>

        <ul class="space-y-2 text-sm">

            <li>
                <a href="/dashboard" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700">
                    <i data-lucide="home"></i> Dashboard
                </a>
            </li>

            @if(strtolower(auth()->user()->role) == 'admin')

            <li>
                <a href="/kategori" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700">
                    <i data-lucide="folder"></i> Kategori
                </a>
            </li>

            <li>
                <a href="/barang" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700">
                    <i data-lucide="package"></i> Data Barang
                </a>
            </li>

            <li>
                <a href="/barang-masuk" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700">
                    <i data-lucide="arrow-down-circle"></i> Barang Masuk
                </a>
            </li>

            <li>
                <a href="/barang-keluar" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700">
                    <i data-lucide="arrow-up-circle"></i> Barang Keluar
                </a>
            </li>

            @endif

            <li>
                <a href="/laporan" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-blue-700">
                    <i data-lucide="bar-chart-3"></i> Laporan
                </a>
            </li>

        </ul>

    </aside>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col">

        <!-- NAVBAR -->
        <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">

            <div>
                <h1 class="text-gray-700 font-semibold">
                    @yield('title', 'E-Ware')
                </h1>
                <p class="text-xs text-gray-500">
                    Aplikasi manajemen stok barang
                </p>
            </div>

            <div class="flex items-center gap-5">

                <button class="relative p-2 hover:bg-gray-100 rounded-lg">
                    <i data-lucide="bell"></i>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>

                <div class="relative">
                    <button id="profileBtn"
                        class="flex items-center gap-3 px-3 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">

                        <div class="w-8 h-8 bg-blue-600 text-white flex items-center justify-center rounded-full font-bold">
                            {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                        </div>

                        <div class="text-left">
                            <p class="text-sm font-semibold">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ auth()->user()->role }}</p>
                        </div>

                    </button>

                    <div id="profileMenu"
                         class="hidden absolute right-0 mt-2 w-44 bg-white border rounded-lg shadow-lg z-50">

                        <a href="/profile" class="block px-4 py-2 text-sm hover:bg-gray-100">
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-red-600">
                                Logout
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </nav>

        <!-- CONTENT -->
        <main class="p-6">
            @yield('content')
        </main>

        <!-- FOOTER -->
        <footer class="text-center text-xs text-gray-500 py-3 border-t bg-white">
            © {{ date('Y') }} E-Ware - Sistem Gudang
        </footer>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

<script>
    lucide.createIcons();

    document.getElementById('profileBtn').addEventListener('click', function () {
        document.getElementById('profileMenu').classList.toggle('hidden');
    });
</script>

</body>
</html>