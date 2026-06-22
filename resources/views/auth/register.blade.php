<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar — GudangKu</title>

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
    </style>
</head>

<body class="bg-gradient-to-br from-brand-50 via-white to-fuchsia-50/40 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md">

        <a href="/" class="flex flex-col items-center gap-2.5 mb-6">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-brand-600 to-fuchsia-500 flex items-center justify-center shadow-lg shadow-brand-500/30">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <span class="font-display text-lg font-bold tracking-tight text-slate-900">GudangKu</span>
        </a>

        <div class="bg-white border border-brand-100 shadow-2xl shadow-brand-900/10 rounded-3xl p-8 sm:p-10">

            <div class="text-center mb-7">
                <h1 class="font-display text-2xl font-bold text-slate-900">Buat akun baru</h1>
                <p class="text-slate-400 text-sm mt-1">Daftarkan dirimu sebagai operator gudang</p>
            </div>

            @if ($errors->any())
                <div class="bg-rose-50 border border-rose-200 text-rose-600 text-sm px-4 py-3 rounded-xl mb-5 font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wide">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full mt-2 px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition text-sm"
                        placeholder="Nama kamu" required>
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wide">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full mt-2 px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition text-sm"
                        placeholder="nama@email.com" required>
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wide">Kata Sandi</label>
                    <input type="password" name="password"
                        class="w-full mt-2 px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition text-sm"
                        placeholder="Minimal 8 karakter" required>
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wide">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation"
                        class="w-full mt-2 px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition text-sm"
                        placeholder="Ulangi kata sandi" required>
                </div>

                <button type="submit"
                    class="w-full py-3.5 bg-gradient-to-r from-brand-600 to-fuchsia-500 hover:shadow-lg hover:shadow-brand-500/30 hover:-translate-y-0.5 text-white rounded-xl font-bold transition-all mt-2">
                    Daftar Sekarang
                </button>
            </form>

            <p class="text-center text-sm text-slate-400 mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-brand-600 font-bold hover:underline">Masuk di sini</a>
            </p>

        </div>

    </div>

</body>
</html>