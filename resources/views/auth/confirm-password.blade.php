@extends('layouts.app')
@section('title', 'Konfirmasi Password - GudangKu')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center p-4">

    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl p-8 w-full max-w-md">

        <div class="text-center mb-6">
            <div class="w-12 h-12 bg-slate-900 text-white rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <h2 class="text-xl font-extrabold text-slate-900">Konfirmasi Kata Sandi</h2>
            <p class="text-slate-400 text-xs mt-2 leading-relaxed">
                Ini adalah area aman. Masukkan kembali kata sandi kamu untuk melanjutkan.
            </p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

            <div>
                <label for="password" class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Kata Sandi</label>
                <input id="password" type="password" name="password"
                    class="w-full border @if($errors->has('password')) border-rose-300 focus:border-rose-500 @else border-slate-200 focus:border-slate-900 @endif px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 transition text-sm"
                    placeholder="••••••••" required autocomplete="current-password" autofocus>
                @if($errors->has('password'))
                    <p class="text-xs text-rose-600 font-semibold mt-1.5">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <button type="submit"
                class="w-full py-3.5 bg-slate-900 hover:bg-slate-700 text-white rounded-xl font-bold text-sm transition shadow-lg shadow-slate-900/10">
                Verifikasi
            </button>
        </form>

    </div>
</div>
@endsection
