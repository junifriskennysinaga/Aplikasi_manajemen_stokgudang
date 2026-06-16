@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center p-6 animate-fade-in">
    
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl p-8 w-full max-w-md mx-auto">
        
        <div class="text-center mb-6">
            <div class="w-12 h-12 bg-slate-950 text-white rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-md shadow-slate-950/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h3 class="text-xl font-extrabold text-slate-900 tracking-tight">Atur Ulang Kata Sandi</h3>
            <p class="text-slate-400 text-xs mt-1 leading-relaxed">
                Silakan buat kata sandi baru yang kuat untuk mengamankan kembali akses akun Anda ke sistem e-Ware.
            </p>
        </div>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
            @csrf

            <input type="hidden" name="token" value="{{ $token ?? $request->route('token') }}">

            <div>
                <label for="email" class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1.5">
                    Alamat Email
                </label>
                <input 
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', $request->email ?? '') }}"
                    class="w-full bg-slate-50 border @if($errors->has('email')) border-rose-400 focus:border-rose-500 @else border-slate-200 focus:border-slate-950 @endif px-4 py-2.5 rounded-xl focus:bg-white focus:outline-none text-slate-900 transition-all text-sm font-medium"
                    placeholder="nama@tunasmaju.com"
                    required 
                    autocomplete="username"
                >
                @if($errors->has('email'))
                    <p class="text-[11px] text-rose-600 font-semibold mt-1 flex items-center gap-1">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>

            <div>
                <label for="password" class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1.5">
                    Kata Sandi Baru
                </label>
                <input 
                    id="password"
                    type="password"
                    name="password"
                    class="w-full bg-slate-50 border @if($errors->has('password')) border-rose-400 focus:border-rose-500 @else border-slate-200 focus:border-slate-950 @endif px-4 py-2.5 rounded-xl focus:bg-white focus:outline-none text-slate-900 transition-all text-sm font-medium"
                    placeholder="Minimal 8 karakter"
                    required 
                    autocomplete="new-password"
                    autofocus
                >
                @if($errors->has('password'))
                    <p class="text-[11px] text-rose-600 font-semibold mt-1 flex items-center gap-1">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>

            <div>
                <label for="password_confirmation" class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1.5">
                    Konfirmasi Kata Sandi Baru
                </label>
                <input 
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    class="w-full bg-slate-50 border @if($errors->has('password_confirmation')) border-rose-400 focus:border-rose-500 @else border-slate-200 focus:border-slate-950 @endif px-4 py-2.5 rounded-xl focus:bg-white focus:outline-none text-slate-900 transition-all text-sm font-medium"
                    placeholder="Ulangi kata sandi baru"
                    required 
                    autocomplete="new-password"
                >
                @if($errors->has('password_confirmation'))
                    <p class="text-[11px] text-rose-600 font-semibold mt-1 flex items-center gap-1">
                        {{ $errors->first('password_confirmation') }}
                    </p>
                @endif
            </div>

            <div class="pt-2">
                <button
                    type="submit"
                    class="w-full py-3.5 bg-slate-950 hover:bg-black text-white rounded-xl text-xs font-bold uppercase tracking-wider shadow-lg shadow-slate-950/10 transition-all active:scale-[0.99]"
                >
                    Perbarui Kata Sandi & Masuk
                </button>
            </div>
        </form>
        
    </div>
</div>
@endsection