<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Ware - Aplikasi Manajemen Stok Gudang</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <!-- Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@600;800&family=Pacifico&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>

<body class="bg-pink-50 font-[Inter]">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gradient-to-b from-pink-400 to-pink-600 text-white p-5 shadow-xl">

        <!-- LOGO -->
        <h2 class="mb-8 flex items-center gap-2 border-b border-pink-300 pb-4">
            <i data-lucide="box"></i>
            <span class="font-[Pacifico] text-2xl tracking-wide">
                E-Ware
            </span>
        </h2>

        <ul class="space-y-2 text-sm">

            <li>
                <a href="/dashboard"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/20 transition">
                    <i data-lucide="home"></i>
                    Dashboard
                </a>
            </li>

            {{-- MENU ADMIN SAJA --}}
            @if(strtolower(auth()->user()->role) == 'admin')

                <li>
                    <a href="/kategori"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/20 transition">
                        <i data-lucide="folder"></i>
                        Kategori
                    </a>
                </li>

                <li>
                    <a href="/barang"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/20 transition">
                        <i data-lucide="package"></i>
                        Data Barang
                    </a>
                </li>

                <li>
                    <a href="/barang-masuk"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/20 transition">
                        <i data-lucide="arrow-down-circle"></i>
                        Barang Masuk
                    </a>
                </li>

                <li>
                    <a href="/barang-keluar"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/20 transition">
                        <i data-lucide="arrow-up-circle"></i>
                        Barang Keluar
                    </a>
                </li>

            @endif

            {{-- LAPORAN UNTUK SEMUA --}}
            <li>
                <a href="/laporan"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/20 transition">
                    <i data-lucide="bar-chart-3"></i>
                    Laporan
                </a>
            </li>

        </ul>
    </aside>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col">

        <!-- NAVBAR -->
        <nav class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">

            <div>
                <h1 class="text-gray-800 text-lg">
                    <span class="font-[Poppins] font-extrabold text-pink-500 tracking-wide">
                        E-Ware
                    </span>
                </h1>

                <p class="text-xs text-gray-500">
                    Aplikasi manajemen stok gudang
                </p>
            </div>

            <div class="flex items-center gap-5">

                {{-- NOTIFIKASI HANYA ADMIN --}}
                @if(strtolower(auth()->user()->role) == 'admin')

                <div class="relative">

                    <button id="notifButton"
                            type="button"
                            class="relative p-2 hover:bg-pink-100 rounded-lg transition">

                        <i data-lucide="bell"></i>

                        @if(isset($barangHabis) && $barangHabis->count() > 0)
                            <span class="absolute -top-1 -right-1
                                bg-red-500 text-white text-[10px]
                                rounded-full min-w-[18px] h-[18px]
                                px-1 flex items-center justify-center">
                                {{ $barangHabis->count() }}
                            </span>
                        @endif

                    </button>

                    <!-- DROPDOWN NOTIF -->
                    <div id="notifMenu"
                         class="hidden absolute right-0 mt-3 w-80
                         bg-white rounded-xl shadow-lg border z-50">

                        <div class="p-4 border-b font-semibold text-gray-700">
                            Notifikasi Barang Habis
                        </div>

                        @if(isset($barangHabis))

                            @forelse($barangHabis as $b)

                                <div class="p-4 border-b hover:bg-pink-50 transition">
                                    <p class="font-medium text-gray-800">
                                        {{ $b->nama_barang }}
                                    </p>

                                    <p class="text-sm text-red-500">
                                        Stok hampir habis / kosong
                                    </p>
                                </div>

                            @empty

                                <div class="p-4 text-gray-500 text-sm">
                                    Tidak ada notifikasi
                                </div>

                            @endforelse

                        @endif

                    </div>

                </div>

                @endif


                <!-- PROFILE -->
                <div class="relative">

                    <button id="profileBtn"
                            type="button"
                            class="flex items-center gap-3 px-3 py-2 bg-pink-100 rounded-lg hover:bg-pink-200 transition">

                        <div class="w-8 h-8 bg-pink-500 text-white flex items-center justify-center rounded-full font-bold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <div class="text-left">
                            <p class="text-sm font-semibold text-gray-800">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-xs text-gray-500">
                                {{ auth()->user()->role }}
                            </p>
                        </div>

                    </button>

                    <!-- DROPDOWN PROFILE -->
                    <div id="profileMenu"
                         class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-50">

                        <a href="{{ route('profile') }}"
                           class="block px-4 py-3 text-sm hover:bg-pink-50 transition">
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                    class="w-full text-left px-4 py-3 text-sm text-red-500 hover:bg-pink-50 transition">
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
            © {{ date('Y') }}
            <span class="font-[Playfair Display] text-pink-400 font-bold">
                E-Ware
            </span>
        </footer>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

<script>
    lucide.createIcons();

    /* PROFILE */
    const profileBtn = document.getElementById('profileBtn');
    const profileMenu = document.getElementById('profileMenu');

    if (profileBtn) {
        profileBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            profileMenu.classList.toggle('hidden');
        });
    }

    const notifBtn = document.getElementById('notifButton');
    const notifMenu = document.getElementById('notifMenu');

    if (notifBtn) {
        notifBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            notifMenu.classList.toggle('hidden');
        });
    }

    /* KLIK LUAR = TUTUP */
    window.addEventListener('click', function (e) {

        if (
            profileBtn &&
            !profileBtn.contains(e.target) &&
            !profileMenu.contains(e.target)
        ) {
            profileMenu.classList.add('hidden');
        }

        if (
            notifBtn &&
            notifMenu &&
            !notifBtn.contains(e.target) &&
            !notifMenu.contains(e.target)
        ) {
            notifMenu.classList.add('hidden');
        }
    });
</script>

</body>
</html>