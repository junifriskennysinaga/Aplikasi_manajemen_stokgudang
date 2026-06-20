<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GudangKu — Sistem Manajemen Gudang</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] } } }
        }
    </script>
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        .grid-bg {
            background-image: radial-gradient(circle, #e2e8f0 1px, transparent 1px);
            background-size: 28px 28px;
        }
    </style>
</head>

<body class="bg-white text-slate-900 antialiased">

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-lg border-b border-slate-100">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">

            <a href="/" class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-slate-900 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <span class="text-lg font-extrabold tracking-tight">GudangKu</span>
            </a>

            <div class="flex items-center gap-2">
                <a href="{{ route('login') }}"
                   class="px-4 py-2 text-sm font-semibold text-slate-600 hover:text-slate-900 transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="px-4 py-2 bg-slate-900 text-white text-sm font-semibold rounded-lg hover:bg-slate-700 transition">
                    Daftar
                </a>
            </div>

        </div>
    </nav>

    <!-- Hero -->
    <section class="relative grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-white via-white/60 to-white"></div>
        <div class="relative max-w-6xl mx-auto px-6 pt-20 pb-24 lg:pt-28 lg:pb-32 text-center">

            <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-slate-100 rounded-full text-xs font-semibold text-slate-600">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                Sistem Manajemen Gudang Modern
            </span>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold mt-7 leading-[1.1] tracking-tight max-w-3xl mx-auto">
                Kelola Stok Gudang
                <span class="block text-slate-400">Lebih Mudah & Rapi</span>
            </h1>

            <p class="mt-6 text-base lg:text-lg text-slate-500 max-w-xl mx-auto leading-relaxed">
                GudangKu membantu mengelola stok barang, supplier, barang masuk-keluar,
                dan laporan persediaan secara real-time dalam satu sistem terpadu.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-3 mt-10">
                <a href="{{ route('login') }}"
                   class="px-7 py-3.5 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-700 transition shadow-lg shadow-slate-900/10">
                    Mulai Sekarang
                </a>
                <a href="#fitur"
                   class="px-7 py-3.5 border border-slate-200 rounded-xl font-bold hover:bg-slate-50 transition">
                    Lihat Fitur
                </a>
            </div>

            <!-- Preview Card -->
            <div class="mt-16 max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl shadow-2xl shadow-slate-900/10 border border-slate-100 p-3">
                    <div class="bg-slate-50 rounded-2xl p-6 lg:p-8">
                        <div class="flex items-center gap-2 mb-6">
                            <div class="w-3 h-3 rounded-full bg-rose-300"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-300"></div>
                            <div class="w-3 h-3 rounded-full bg-emerald-300"></div>
                        </div>
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 text-left">
                            <div class="bg-white p-4 rounded-xl border border-slate-100">
                                <p class="text-xs text-slate-400 font-semibold">Total Barang</p>
                                <p class="text-2xl font-extrabold text-slate-900 mt-1">128</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl border border-slate-100">
                                <p class="text-xs text-slate-400 font-semibold">Barang Masuk</p>
                                <p class="text-2xl font-extrabold text-blue-600 mt-1">42</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl border border-slate-100">
                                <p class="text-xs text-slate-400 font-semibold">Barang Keluar</p>
                                <p class="text-2xl font-extrabold text-amber-600 mt-1">31</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl border border-slate-100">
                                <p class="text-xs text-slate-400 font-semibold">Stok Menipis</p>
                                <p class="text-2xl font-extrabold text-rose-600 mt-1">6</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Fitur -->
    <section id="fitur" class="py-24 border-t border-slate-100">
        <div class="max-w-6xl mx-auto px-6">

            <div class="text-center max-w-xl mx-auto mb-16">
                <h2 class="text-3xl lg:text-4xl font-extrabold tracking-tight">Fitur Unggulan</h2>
                <p class="text-slate-500 mt-3">Semua yang kamu butuhkan untuk mengelola gudang dalam satu platform.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">

                <div class="p-6 rounded-2xl border border-slate-100 hover:border-slate-200 hover:shadow-lg hover:shadow-slate-100 transition-all duration-200">
                    <div class="w-11 h-11 rounded-xl bg-slate-900 flex items-center justify-center mb-5">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <h3 class="font-bold text-lg">Dashboard</h3>
                    <p class="text-slate-500 text-sm mt-2 leading-relaxed">Statistik gudang secara real-time dan mudah dipantau.</p>
                </div>

                <div class="p-6 rounded-2xl border border-slate-100 hover:border-slate-200 hover:shadow-lg hover:shadow-slate-100 transition-all duration-200">
                    <div class="w-11 h-11 rounded-xl bg-slate-900 flex items-center justify-center mb-5">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 7l1.5 12a2 2 0 002 2h11a2 2 0 002-2L21 7M3 7l2-4h14l2 4M9 11v6m6-6v6"/></svg>
                    </div>
                    <h3 class="font-bold text-lg">Supplier</h3>
                    <p class="text-slate-500 text-sm mt-2 leading-relaxed">Kelola data supplier dan kontak pemasok dengan mudah.</p>
                </div>

                <div class="p-6 rounded-2xl border border-slate-100 hover:border-slate-200 hover:shadow-lg hover:shadow-slate-100 transition-all duration-200">
                    <div class="w-11 h-11 rounded-xl bg-slate-900 flex items-center justify-center mb-5">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m6 10v-4M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="font-bold text-lg">Laporan</h3>
                    <p class="text-slate-500 text-sm mt-2 leading-relaxed">Cetak dan unduh laporan stok kapan saja dibutuhkan.</p>
                </div>

                <div class="p-6 rounded-2xl border border-slate-100 hover:border-slate-200 hover:shadow-lg hover:shadow-slate-100 transition-all duration-200">
                    <div class="w-11 h-11 rounded-xl bg-slate-900 flex items-center justify-center mb-5">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm6 0a4 4 0 10-4-4"/></svg>
                    </div>
                    <h3 class="font-bold text-lg">Multi Role</h3>
                    <p class="text-slate-500 text-sm mt-2 leading-relaxed">Admin pengelola penuh & Manajer dengan akses pemantauan.</p>
                </div>

            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 px-6">
        <div class="max-w-4xl mx-auto bg-slate-900 rounded-3xl px-8 py-14 text-center relative overflow-hidden">
            <div class="absolute -top-16 -right-16 w-56 h-56 bg-slate-700/30 rounded-full blur-3xl"></div>
            <div class="relative">
                <h2 class="text-2xl lg:text-3xl font-extrabold text-white">Siap mengelola gudangmu lebih efisien?</h2>
                <p class="text-slate-400 mt-3 max-w-md mx-auto">Daftar sekarang dan mulai pantau stok barangmu secara real-time.</p>
                <a href="{{ route('register') }}"
                   class="inline-block mt-8 px-7 py-3.5 bg-white text-slate-900 rounded-xl font-bold hover:bg-slate-100 transition">
                    Buat Akun Gratis
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-slate-100 py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-2.5">
                <div class="w-7 h-7 rounded-lg bg-slate-900 flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <span class="font-bold text-slate-800">GudangKu</span>
            </div>
            <p class="text-slate-400 text-sm">© {{ date('Y') }} GudangKu. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
