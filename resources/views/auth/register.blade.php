<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar — GudangKu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>* { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>

<body class="bg-slate-50 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md">

        <a href="/" class="flex flex-col items-center gap-2.5 mb-6">
            <div class="w-12 h-12 rounded-2xl bg-slate-900 flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <span class="text-lg font-extrabold tracking-tight text-slate-900">GudangKu</span>
        </a>

        <div class="bg-white border border-slate-100 shadow-xl shadow-slate-200/50 rounded-3xl p-8 sm:p-10">

            <div class="text-center mb-7">
                <h1 class="text-2xl font-extrabold text-slate-900">Buat akun baru</h1>
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
                        class="w-full mt-2 px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition text-sm"
                        placeholder="Nama kamu" required>
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wide">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full mt-2 px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition text-sm"
                        placeholder="nama@email.com" required>
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wide">Kata Sandi</label>
                    <input type="password" name="password"
                        class="w-full mt-2 px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition text-sm"
                        placeholder="Minimal 8 karakter" required>
                </div>

                <div>
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wide">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation"
                        class="w-full mt-2 px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition text-sm"
                        placeholder="Ulangi kata sandi" required>
                </div>

                <button type="submit"
                    class="w-full py-3.5 bg-slate-900 hover:bg-slate-700 text-white rounded-xl font-bold transition shadow-lg shadow-slate-900/10 mt-2">
                    Daftar Sekarang
                </button>
            </form>

            <p class="text-center text-sm text-slate-400 mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-slate-900 font-bold hover:underline">Masuk di sini</a>
            </p>

        </div>

    </div>

</body>
</html>