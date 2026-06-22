<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login — GudangKu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'], display: ['Outfit', 'sans-serif'] },
                colors: { brand: { 50:'#f1f0ff',100:'#e4e1ff',200:'#cbc6ff',300:'#a79dff',400:'#8b7bff',500:'#7458ff',600:'#6437f5',700:'#5527d8',800:'#4621ae',900:'#3a1f8a',950:'#241261' } } } }
        }
    </script>
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display { font-family: 'Outfit', sans-serif; }
        .grid-bg { background-image: radial-gradient(circle, rgba(255,255,255,0.18) 1px, transparent 1px); background-size: 26px 26px; }
    </style>
</head>

<body class="bg-gradient-to-br from-brand-50 via-white to-fuchsia-50/40">

<div class="min-h-screen flex items-center justify-center px-4 py-10">

    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl shadow-brand-900/10 overflow-hidden grid lg:grid-cols-2 border border-brand-100">

        <!-- LEFT SIDE (INFO) -->
        <div class="hidden lg:flex flex-col justify-between bg-gradient-to-br from-brand-700 via-brand-600 to-fuchsia-600 text-white p-12 relative overflow-hidden">

            <div class="absolute inset-0 grid-bg opacity-30"></div>
            <div class="absolute -top-16 -right-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-16 w-64 h-64 bg-fuchsia-400/20 rounded-full blur-3xl"></div>

            <a href="/" class="relative flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-white/15 backdrop-blur flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <span class="font-display text-lg font-bold">GudangKu</span>
            </a>

            <div class="relative">
                <h1 class="font-display text-3xl font-bold leading-tight">Selamat datang kembali.</h1>
                <p class="text-brand-100 mt-4 leading-relaxed text-sm">
                    Kelola stok barang, supplier, barang masuk dan keluar secara efisien dalam satu sistem terpadu.
                </p>

                <div class="mt-10 space-y-3">
                    <div class="flex items-center gap-3 text-sm text-brand-50">
                        <svg class="w-4 h-4 text-emerald-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Manajemen stok barang
                    </div>
                    <div class="flex items-center gap-3 text-sm text-brand-50">
                        <svg class="w-4 h-4 text-emerald-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Data supplier terstruktur
                    </div>
                    <div class="flex items-center gap-3 text-sm text-brand-50">
                        <svg class="w-4 h-4 text-emerald-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Barang masuk & keluar real-time
                    </div>
                    <div class="flex items-center gap-3 text-sm text-brand-50">
                        <svg class="w-4 h-4 text-emerald-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Laporan otomatis
                    </div>
                </div>
            </div>

            <p class="relative text-xs text-brand-200">© {{ date('Y') }} GudangKu</p>

        </div>

        <!-- RIGHT SIDE (FORM) -->
        <div class="p-8 sm:p-12 lg:p-14 flex items-center">

            <div class="w-full">

                <h2 class="font-display text-2xl font-bold text-slate-900">Masuk ke akun</h2>
                <p class="text-slate-400 mt-1 text-sm">Silakan masukkan email dan kata sandi kamu</p>

                @if ($errors->any())
                    <div class="bg-rose-50 border border-rose-200 text-rose-600 text-sm px-4 py-3 rounded-xl mt-6 font-medium">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="mt-7 space-y-5">

                    @csrf

                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wide">Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="w-full mt-2 px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition text-sm"
                            placeholder="nama@email.com"
                        >
                    </div>

                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wide">Password</label>
                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full mt-2 px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition text-sm"
                            placeholder="••••••••"
                        >
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-slate-500 font-medium">
                            <input type="checkbox" name="remember" class="rounded border-slate-300 text-brand-600 focus:ring-brand-500/20">
                            Ingat saya
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-slate-500 hover:text-brand-600 font-medium transition">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-brand-600 to-fuchsia-500 hover:shadow-lg hover:shadow-brand-500/30 hover:-translate-y-0.5 text-white font-bold py-3.5 rounded-xl transition-all"
                    >
                        Masuk
                    </button>

                    @if (Route::has('register'))
                        <p class="text-center text-sm text-slate-400 pt-2">
                            Belum punya akun?
                            <a href="{{ route('register') }}" class="text-brand-600 font-bold hover:underline">Daftar di sini</a>
                        </p>
                    @endif

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>