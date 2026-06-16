@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center p-6 animate-fade-in">
    
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl p-8 w-full max-w-md mx-auto">
        
        <div class="text-center mb-6">
            <div class="w-12 h-12 bg-slate-950 text-white rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-md shadow-slate-950/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h3 class="text-xl font-extrabold text-slate-900 tracking-tight">Konfirmasi Autentikasi</h3>
            <p class="text-slate-400 text-xs mt-1 leading-relaxed">
                Ini adalah area aplikasi e-Ware yang aman. Silakan masukkan kata sandi Anda kembali untuk melanjutkan tindakan ini.
            </p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

            <div>
                <label for="password" class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-2">
                    Kata Sandi Akun
                </label>
                <div class="relative">
                    <input 
                        id="password"
                        type="password"
                        name="password"
                        class="w-full bg-slate-50 border @if($errors->has('password')) border-rose-400 focus:border-rose-500 @else border-slate-200 focus:border-slate-950 @endif px-4 py-3 rounded-xl focus:bg-white focus:outline-none text-slate-900 transition-all text-sm font-medium"
                        placeholder="••••••••"
                        required 
                        autocomplete="current-password"
                        autofocus
                    >
                </div>
                
                @if($errors->has('password'))
                    <p class="text-xs text-rose-600 font-semibold mt-2 flex items-center gap-1 animate-pulse">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>

            <div class="pt-2">
                <button
                    type="submit"
                    class="w-full py-3.5 bg-slate-950 hover:bg-black text-white rounded-xl text-xs font-bold uppercase tracking-wider shadow-lg shadow-slate-950/10 transition-all active:scale-[0.99]"
                >
                    Verifikasi Kata Sandi
                </button>
            </div>
        </form>
        
    </div>
</div>
@endsection