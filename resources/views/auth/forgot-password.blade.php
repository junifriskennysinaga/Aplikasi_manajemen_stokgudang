@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center p-6 animate-fade-in">
    
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl p-8 w-full max-w-md mx-auto">
        
        <div class="text-center mb-6">
            <div class="w-12 h-12 bg-slate-950 text-white rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-md shadow-slate-950/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                </svg>
            </div>
            <h3 class="text-xl font-extrabold text-slate-900 tracking-tight">Pemulihan Kata Sandi</h3>
            <p class="text-slate-400 text-xs mt-2 leading-relaxed">
                Lupa kata sandi Anda? Tidak masalah. Cukup masukkan alamat email yang terdaftar pada sistem e-Ware, dan kami akan mengirimkan tautan pemulihan.
            </p>
        </div>

        @if (session('status'))
            <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-xs font-semibold text-emerald-700 flex items-center gap-2 animate-fade-in">
                <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0content"/>
                </svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-2">
                    Alamat Email Terdaftar
                </label>
                <input 
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full bg-slate-50 border @if($errors->has('email')) border-rose-400 focus:border-rose-500 @else border-slate-200 focus:border-slate-950 @endif px-4 py-3 rounded-xl focus:bg-white focus:outline-none text-slate-900 transition-all text-sm font-medium"
                    placeholder="nama@tunasmaju.com"
                    required 
                    autofocus
                >
                
                @if($errors->has('email'))
                    <p class="text-xs text-rose-600 font-semibold mt-2 flex items-center gap-1 animate-pulse">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>

            <div class="pt-2 flex flex-col gap-3">
                <button
                    type="submit"
                    class="w-full py-3.5 bg-slate-950 hover:bg-black text-white rounded-xl text-xs font-bold uppercase tracking-wider shadow-lg shadow-slate-950/10 transition-all active:scale-[0.99]"
                >
                    Kirim Tautan Reset Password
                </button>
                
                <a 
                    href="{{ route('login') }}"
                    class="w-full py-3 text-center bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold uppercase tracking-wider transition"
                >
                    Kembali Ke Halaman Login
                </a>
            </div>
        </form>
        
    </div>
</div>
@endsection