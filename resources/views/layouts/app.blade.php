<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GudangKu</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-slate-950 text-white flex flex-col">

        <div class="p-5 border-b border-slate-800">

            <h1 class="text-2xl font-bold">
                GudangKu
            </h1>

            <p class="text-xs text-slate-400 mt-1">
                Sistem Manajemen Gudang
            </p>

        </div>

        <div class="px-5 py-4 border-b border-slate-800">

            <p class="text-sm font-semibold">
                {{ auth()->user()->name }}
            </p>

            <p class="text-xs text-slate-400">
                {{ strtoupper(auth()->user()->role) }}
            </p>

        </div>

        <nav class="flex-1 p-4 space-y-2 text-sm">

            <a href="{{ route('dashboard') }}"
               class="block p-3 rounded-xl hover:bg-slate-800">
                Dashboard
            </a>

            {{-- ADMIN SAJA --}}
            @if(auth()->user()->role == 'admin')

                <a href="{{ route('kategori.index') }}"
                   class="block p-3 rounded-xl hover:bg-slate-800">
                    Kategori
                </a>

                <a href="{{ route('supplier.index') }}"
                   class="block p-3 rounded-xl hover:bg-slate-800">
                    Supplier
                </a>

                <a href="{{ route('barang.index') }}"
                   class="block p-3 rounded-xl hover:bg-slate-800">
                    Barang
                </a>

                <a href="{{ route('barang-masuk.index') }}"
                   class="block p-3 rounded-xl hover:bg-slate-800">
                    Barang Masuk
                </a>

                <a href="{{ route('barang-keluar.index') }}"
                   class="block p-3 rounded-xl hover:bg-slate-800">
                    Barang Keluar
                </a>

                <a href="{{ route('laporan.masuk') }}"
                   class="block p-3 rounded-xl hover:bg-slate-800">
                    Laporan Masuk
                </a>

                <a href="{{ route('laporan.keluar') }}"
                   class="block p-3 rounded-xl hover:bg-slate-800">
                    Laporan Keluar
                </a>

            @endif

            @if(auth()->user()->role == 'manajer')

                <a href="{{ route('supplier.index') }}"
                   class="block p-3 rounded-xl hover:bg-slate-800">
                    Supplier
                </a>

                <a href="{{ route('barang.index') }}"
                   class="block p-3 rounded-xl hover:bg-slate-800">
                    Barang
                </a>

                <a href="{{ route('laporan.masuk') }}"
                   class="block p-3 rounded-xl hover:bg-slate-800">
                    Laporan Masuk
                </a>

                <a href="{{ route('laporan.keluar') }}"
                   class="block p-3 rounded-xl hover:bg-slate-800">
                    Laporan Keluar
                </a>

            @endif

        </nav>

        <div class="p-4 border-t border-slate-800">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl font-semibold">
                    Logout
                </button>

            </form>

        </div>

    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-6">

        @yield('content')

    </main>

</div>

</body>
</html>