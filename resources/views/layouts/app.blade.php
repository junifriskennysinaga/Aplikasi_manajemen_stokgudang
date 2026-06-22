<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GudangKu')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'], display: ['Outfit', 'sans-serif'] },
                    colors: {
                        brand: {
                            50:  '#f1f0ff',
                            100: '#e4e1ff',
                            200: '#cbc6ff',
                            300: '#a79dff',
                            400: '#8b7bff',
                            500: '#7458ff',
                            600: '#6437f5',
                            700: '#5527d8',
                            800: '#4621ae',
                            900: '#3a1f8a',
                            950: '#241261'
                        }
                    }
                }
            }
        }
    </script>

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display { font-family: 'Outfit', sans-serif; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        .nav-active { background: linear-gradient(135deg, #6437f5, #c026d3); color: #ffffff; box-shadow: 0 4px 14px rgba(100,55,245,0.35); }
        .nav-active .nav-dot { background: #ffffff; }
        .nav-active svg { color: #ffffff; }
        @keyframes fadeIn { from { opacity:0; transform: translateY(4px); } to { opacity:1; transform: translateY(0); } }
        .animate-fade-in { animation: fadeIn .35s ease-out; }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 antialiased">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="hidden lg:flex w-72 flex-col bg-slate-50 border-r border-slate-200/80 sticky top-0 h-screen">

        <div class="px-6 pt-7 pb-5">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-600 to-fuchsia-500 flex items-center justify-center shrink-0 shadow-md shadow-brand-500/30 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <div>
                    <p class="font-display text-base font-bold tracking-tight text-slate-900 leading-none">GudangKu</p>
                    <p class="text-[11px] text-slate-400 font-medium mt-1">Manajemen Stok Gudang</p>
                </div>
            </a>
        </div>

        <div class="mx-4 mb-3 px-4 py-3 rounded-2xl bg-white border border-slate-200/80 flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-100 to-fuchsia-100 text-brand-700 flex items-center justify-center font-bold text-sm shrink-0">
                {{ strtoupper(substr(auth()->user()->name,0,1)) }}
            </div>
            <div class="min-w-0">
                <p class="text-sm font-bold text-slate-800 truncate">{{ auth()->user()->name }}</p>
                <p class="text-[11px] text-slate-400 font-semibold uppercase tracking-wide">{{ auth()->user()->role }}</p>
            </div>
        </div>

        <nav class="flex-1 px-4 py-2 space-y-1 text-sm overflow-y-auto">

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-500 hover:bg-white hover:text-slate-900 transition {{ request()->routeIs('dashboard') ? 'nav-active' : '' }}">
                <span class="nav-dot w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>

            @if(auth()->user()->role == 'admin')

                <p class="px-3 pt-5 pb-1 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Master Data</p>

                <a href="{{ route('kategori.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-500 hover:bg-white hover:text-slate-900 transition {{ request()->routeIs('kategori.*') ? 'nav-active' : '' }}">
                    <span class="nav-dot w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    Kategori
                </a>

                <a href="{{ route('supplier.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-500 hover:bg-white hover:text-slate-900 transition {{ request()->routeIs('supplier.*') ? 'nav-active' : '' }}">
                    <span class="nav-dot w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 7l1.5 12a2 2 0 002 2h11a2 2 0 002-2L21 7M3 7l2-4h14l2 4M9 11v6m6-6v6"/></svg>
                    Supplier
                </a>

                <a href="{{ route('barang.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-500 hover:bg-white hover:text-slate-900 transition {{ request()->routeIs('barang.*') ? 'nav-active' : '' }}">
                    <span class="nav-dot w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Barang
                </a>

                <p class="px-3 pt-5 pb-1 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Transaksi</p>

                <a href="{{ route('barang-masuk.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-500 hover:bg-white hover:text-slate-900 transition {{ request()->routeIs('barang-masuk.*') ? 'nav-active' : '' }}">
                    <span class="nav-dot w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0-16l-5 5m5-5l5 5"/></svg>
                    Barang Masuk
                </a>

                <a href="{{ route('barang-keluar.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-500 hover:bg-white hover:text-slate-900 transition {{ request()->routeIs('barang-keluar.*') ? 'nav-active' : '' }}">
                    <span class="nav-dot w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20V4m0 16l-5-5m5 5l5-5"/></svg>
                    Barang Keluar
                </a>

                <p class="px-3 pt-5 pb-1 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Laporan</p>

                <a href="{{ route('laporan.masuk') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-500 hover:bg-white hover:text-slate-900 transition {{ request()->routeIs('laporan.masuk') ? 'nav-active' : '' }}">
                    <span class="nav-dot w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m6 10v-4M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    Laporan Masuk
                </a>

                <a href="{{ route('laporan.keluar') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-500 hover:bg-white hover:text-slate-900 transition {{ request()->routeIs('laporan.keluar') ? 'nav-active' : '' }}">
                    <span class="nav-dot w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17V11m6 6V7M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    Laporan Keluar
                </a>

            @endif

            @if(auth()->user()->role == 'manajer')

                <p class="px-3 pt-5 pb-1 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Data</p>

                <a href="{{ route('supplier.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-500 hover:bg-white hover:text-slate-900 transition {{ request()->routeIs('supplier.*') ? 'nav-active' : '' }}">
                    <span class="nav-dot w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 7l1.5 12a2 2 0 002 2h11a2 2 0 002-2L21 7M3 7l2-4h14l2 4M9 11v6m6-6v6"/></svg>
                    Supplier
                </a>

                <a href="{{ route('barang.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-500 hover:bg-white hover:text-slate-900 transition {{ request()->routeIs('barang.*') ? 'nav-active' : '' }}">
                    <span class="nav-dot w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Barang
                </a>

                <p class="px-3 pt-5 pb-1 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Laporan</p>

                <a href="{{ route('laporan.masuk') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-500 hover:bg-white hover:text-slate-900 transition {{ request()->routeIs('laporan.masuk') ? 'nav-active' : '' }}">
                    <span class="nav-dot w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m6 10v-4M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    Laporan Masuk
                </a>

                <a href="{{ route('laporan.keluar') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-slate-500 hover:bg-white hover:text-slate-900 transition {{ request()->routeIs('laporan.keluar') ? 'nav-active' : '' }}">
                    <span class="nav-dot w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></span>
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17V11m6 6V7M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    Laporan Keluar
                </a>

            @endif

        </nav>

        <div class="p-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-white hover:bg-rose-50 border border-slate-200 hover:border-rose-200 text-slate-500 hover:text-rose-600 py-2.5 rounded-xl font-semibold text-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Keluar
                </button>
            </form>
        </div>

    </aside>

    <!-- MOBILE TOP BAR -->
    <div class="lg:hidden fixed top-0 inset-x-0 z-40 bg-white border-b border-slate-200 px-4 py-3 flex items-center justify-between">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-brand-600 to-fuchsia-500 flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <span class="font-display font-bold text-slate-900">GudangKu</span>
        </a>
        <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="p-2 rounded-lg hover:bg-slate-100">
            <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
    </div>

    <div id="mobileMenu" class="hidden lg:hidden fixed inset-0 z-30 bg-white pt-16 overflow-y-auto">
        <nav class="p-4 space-y-1 text-sm">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-100">Dashboard</a>
            @if(auth()->user()->role == 'admin')
                <a href="{{ route('kategori.index') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-100">Kategori</a>
                <a href="{{ route('supplier.index') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-100">Supplier</a>
                <a href="{{ route('barang.index') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-100">Barang</a>
                <a href="{{ route('barang-masuk.index') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-100">Barang Masuk</a>
                <a href="{{ route('barang-keluar.index') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-100">Barang Keluar</a>
                <a href="{{ route('laporan.masuk') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-100">Laporan Masuk</a>
                <a href="{{ route('laporan.keluar') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-100">Laporan Keluar</a>
            @endif
            @if(auth()->user()->role == 'manajer')
                <a href="{{ route('supplier.index') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-100">Supplier</a>
                <a href="{{ route('barang.index') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-100">Barang</a>
                <a href="{{ route('laporan.masuk') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-100">Laporan Masuk</a>
                <a href="{{ route('laporan.keluar') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-600 hover:bg-slate-100">Laporan Keluar</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" class="pt-2">
                @csrf
                <button type="submit" class="w-full text-left px-3 py-2.5 rounded-xl font-semibold text-rose-600 hover:bg-rose-50">Keluar</button>
            </form>
        </nav>
    </div>

    <!-- CONTENT -->
    <main class="flex-1 min-w-0 px-5 py-6 lg:px-10 lg:py-8 pt-20 lg:pt-8">
        <div class="max-w-6xl mx-auto animate-fade-in">
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>