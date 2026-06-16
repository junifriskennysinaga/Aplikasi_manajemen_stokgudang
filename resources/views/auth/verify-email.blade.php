@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center p-6 animate-fade-in">
    
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl p-8 w-full max-w-md mx-auto">
        
        <div class="text-center mb-6">
            <div class="w-12 h-12 bg-slate-950 text-white rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-md shadow-slate-950/20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <h3 class="text-xl font-extrabold text-slate-900 tracking-tight">Verifikasi Email Anda</h3>
            <p class="text-slate-400 text-xs mt-2 leading-relaxed">
                Terima kasih telah mendaftar di sistem e-Ware! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan.
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-xs font-semibold text-emerald-700 flex items-center gap-2 animate-fade-in">
                <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0"/>
                </svg>
                <span>Tautan verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.</span>
            </div>
        @endif

        <div class="space-y-3 pt-2">
            
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button
                    type="submit"
                    class="w-full py-3.5 bg-slate-950 hover:bg-black text-white rounded-xl text-xs font-bold uppercase tracking-wider shadow-lg shadow-slate-950/10 transition-all active:scale-[0.99]"
                >
                    Kirim Ulang Email Verifikasi
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="text-center">
                @csrf
                <button 
                    type="submit" 
                    class="text-xs font-bold uppercase tracking-wider text-slate-400 hover:text-slate-900 transition underline underline-offset-4"
                >
                    Keluar dari Aplikasi (Log Out)
                </button>
            </form>
            
        </div>
        
    </div>
</div>
@endsection