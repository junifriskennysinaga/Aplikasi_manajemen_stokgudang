@extends('layouts.app')
@section('title', 'Barang Masuk - GudangKu')

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Barang Masuk</h1>
        <p class="text-slate-400 text-sm mt-1 font-medium">Kelola stok barang yang masuk ke gudang</p>
    </div>

    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-sm font-medium flex items-center gap-2">
        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        {{ session('success') }}
    </div>
    @endif

    <div class="grid gap-3">

        @forelse($barang as $b)

        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 hover:shadow-md transition-shadow duration-200">

            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5">

                <div class="flex items-start gap-4">
                    <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0-16l-5 5m5-5l5 5"/></svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900">{{ $b->nama_barang }}</h3>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="px-2.5 py-1 bg-slate-50 border border-slate-100 rounded-lg text-xs font-medium text-slate-500">
                                Stok saat ini: <b class="text-slate-700">{{ $b->stok }} {{ $b->satuan }}</b>
                            </span>
                            <span class="px-2.5 py-1 bg-slate-50 border border-slate-100 rounded-lg text-xs font-medium text-slate-400">
                                ID #{{ $b->id }}
                            </span>
                        </div>
                    </div>
                </div>

                @if(auth()->user()->role == 'admin')

                <form action="{{ route('barang-masuk.store') }}" method="POST" class="flex flex-wrap gap-3 items-end">

                    @csrf
                    <input type="hidden" name="barang_id" value="{{ $b->id }}">

                    <div>
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wide mb-1">Jumlah Masuk</label>
                        <input type="number" name="jumlah" min="1" required
                            class="border border-slate-200 rounded-xl px-3 py-2 w-28 text-sm focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wide mb-1">Tanggal Masuk</label>
                        <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" required
                            class="border border-slate-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wide mb-1">Expired</label>
                        <input type="date" name="tanggal_expired"
                            class="border border-slate-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 focus:outline-none transition">
                    </div>

                    <button type="submit"
                        class="bg-slate-900 hover:bg-slate-700 text-white px-5 py-2 rounded-xl font-semibold text-sm transition shadow-lg shadow-slate-900/10">
                        Simpan
                    </button>

                </form>

                @else

                <div class="px-4 py-2 bg-slate-50 rounded-xl text-slate-400 font-semibold text-sm">
                    Read Only
                </div>

                @endif

            </div>

        </div>

        @empty

        <div class="bg-white rounded-2xl border border-slate-200/80 p-12 text-center">
            <p class="text-slate-400 text-sm font-medium">Belum ada data barang</p>
        </div>

        @endforelse

    </div>

</div>

@endsection

