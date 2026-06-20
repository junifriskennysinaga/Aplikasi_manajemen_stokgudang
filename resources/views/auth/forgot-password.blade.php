<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lupa Password — GudangKu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>* { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md">

        <a href="/" class="flex flex-col items-center gap-2.5 mb-6">
            <div class="w-12 h-12 rounded-2xl bg-slate-900 flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
            </div>
            <span class="text-lg font-extrabold tracking-tight text-slate-900">GudangKu</span>
        </a>

        <div class="bg-white border border-slate-100 shadow-xl shadow-slate-200/50 rounded-3xl p-8 sm:p-10">

            <div class="text-center mb-6">
                <h1 class="text-xl font-extrabold text-slate-900">Pemulihan Kata Sandi</h1>
                <p class="text-slate-400 text-xs mt-2 leading-relaxed">
                    Masukkan email yang terdaftar dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi.
                </p>
            </div>

            @if (session('status'))
                <div class="mb-5 p-3.5 bg-emerald-50 border border-emerald-200 rounded-xl text-xs font-semibold text-emerald-700 flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0"/></svg>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Alamat Email</label>
                    <input
                        id="email" type="email" name="email" value="{{ old('email') }}"
                        class="w-full border @if($errors->has('email')) border-rose-300 focus:border-rose-500 @else border-slate-200 focus:border-slate-900 @endif px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 transition text-sm"
                        placeholder="nama@email.com" required autofocus>
                    @if($errors->has('email'))
                        <p class="text-xs text-rose-600 font-semibold mt-1.5">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="pt-2 flex flex-col gap-3">
                    <button type="submit"
                        class="w-full py-3.5 bg-slate-900 hover:bg-slate-700 text-white rounded-xl font-bold text-sm transition shadow-lg shadow-slate-900/10">
                        Kirim Tautan Reset
                    </button>
                    <a href="{{ route('login') }}"
                        class="w-full py-3 text-center bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl font-semibold text-sm transition">
                        Kembali ke Login
                    </a>
                </div>
            </form>

        </div>

    </div>

</body>
</html>