<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Atur Ulang Password — GudangKu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>* { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md">

        <a href="/" class="flex flex-col items-center gap-2.5 mb-6">
            <div class="w-12 h-12 rounded-2xl bg-slate-900 flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <span class="text-lg font-extrabold tracking-tight text-slate-900">GudangKu</span>
        </a>

        <div class="bg-white border border-slate-100 shadow-xl shadow-slate-200/50 rounded-3xl p-8 sm:p-10">

            <div class="text-center mb-6">
                <h1 class="text-xl font-extrabold text-slate-900">Atur Ulang Kata Sandi</h1>
                <p class="text-slate-400 text-xs mt-1.5 leading-relaxed">Buat kata sandi baru untuk akun kamu.</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="token" value="{{ $token ?? $request->route('token') }}">

                <div>
                    <label for="email" class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email ?? '') }}"
                        class="w-full border @if($errors->has('email')) border-rose-300 focus:border-rose-500 @else border-slate-200 focus:border-slate-900 @endif px-4 py-2.5 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 transition text-sm"
                        placeholder="nama@email.com" required autocomplete="username">
                    @if($errors->has('email'))
                        <p class="text-xs text-rose-600 font-semibold mt-1.5">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Kata Sandi Baru</label>
                    <input id="password" type="password" name="password"
                        class="w-full border @if($errors->has('password')) border-rose-300 focus:border-rose-500 @else border-slate-200 focus:border-slate-900 @endif px-4 py-2.5 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 transition text-sm"
                        placeholder="Minimal 8 karakter" required autocomplete="new-password" autofocus>
                    @if($errors->has('password'))
                        <p class="text-xs text-rose-600 font-semibold mt-1.5">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="w-full border @if($errors->has('password_confirmation')) border-rose-300 focus:border-rose-500 @else border-slate-200 focus:border-slate-900 @endif px-4 py-2.5 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 transition text-sm"
                        placeholder="Ulangi kata sandi baru" required autocomplete="new-password">
                    @if($errors->has('password_confirmation'))
                        <p class="text-xs text-rose-600 font-semibold mt-1.5">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </div>

                <button type="submit"
                    class="w-full py-3.5 bg-slate-900 hover:bg-slate-700 text-white rounded-xl font-bold text-sm transition shadow-lg shadow-slate-900/10 mt-2">
                    Perbarui Kata Sandi
                </button>
            </form>

        </div>

    </div>

</body>
</html>