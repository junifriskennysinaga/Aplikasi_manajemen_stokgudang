@extends('layouts.app')
@section('title', 'Profil - GudangKu')

@section('content')

<div class="max-w-2xl mx-auto space-y-6">

    <div>
        <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Profil Saya</h1>
        <p class="text-slate-400 text-sm mt-1 font-medium">Informasi akun pengguna</p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/80 p-8">

        <div class="flex items-center gap-4 mb-7 pb-7 border-b border-slate-100">

            <div class="w-16 h-16 rounded-2xl bg-slate-900 text-white flex items-center justify-center text-2xl font-extrabold shrink-0">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div>
                <h2 class="text-lg font-bold text-slate-900">{{ auth()->user()->name }}</h2>
                <span class="inline-block mt-1 px-2.5 py-0.5 bg-slate-100 text-slate-500 text-xs font-bold uppercase tracking-wide rounded-full">
                    {{ auth()->user()->role }}
                </span>
            </div>

        </div>

        <div class="space-y-5">

            <div>
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wide">Nama Lengkap</label>
                <div class="mt-1.5 px-4 py-3 bg-slate-50 rounded-xl border border-slate-100 text-sm font-medium text-slate-800">
                    {{ auth()->user()->name }}
                </div>
            </div>

            <div>
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wide">Email</label>
                <div class="mt-1.5 px-4 py-3 bg-slate-50 rounded-xl border border-slate-100 text-sm font-medium text-slate-800">
                    {{ auth()->user()->email }}
                </div>
            </div>

            <div>
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wide">Role</label>
                <div class="mt-1.5 px-4 py-3 bg-slate-50 rounded-xl border border-slate-100 text-sm font-medium text-slate-800 capitalize">
                    {{ auth()->user()->role }}
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
