@extends('layouts.app')
@section('title', 'Data Barang - GudangKu')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">

        <div>
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Data Barang</h1>
            <p class="text-slate-400 text-sm mt-1 font-medium">Kelola seluruh data barang gudang</p>
        </div>

        @if(auth()->user()->role === 'admin')
        <button
            onclick="document.getElementById('modalTambah').classList.remove('hidden')"
            class="inline-flex items-center justify-center gap-2 bg-slate-900 hover:bg-slate-700 text-white px-5 py-3 rounded-xl font-semibold text-sm transition shadow-lg shadow-slate-900/10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Tambah Barang
        </button>
        @endif

    </div>

    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-sm font-medium flex items-center gap-2">
        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        {{ session('success') }}
    </div>
    @endif

    <div class="grid gap-3">

        @forelse($barangs as $b)

        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 hover:shadow-md transition-shadow duration-200">

            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">

                <div class="flex items-start gap-4">
                    <div class="w-11 h-11 rounded-xl bg-slate-100 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>

                    <div>
                        <h3 class="text-base font-bold text-slate-900">{{ $b->nama_barang }}</h3>

                        <div class="flex flex-wrap gap-2 mt-2.5">

                            <span class="inline-flex items-center px-2.5 py-1 bg-slate-50 border border-slate-100 rounded-lg text-xs font-medium text-slate-500">
                                {{ $b->kategori->nama_kategori }}
                            </span>

                            <span class="inline-flex items-center px-2.5 py-1 bg-slate-50 border border-slate-100 rounded-lg text-xs font-medium text-slate-500">
                                {{ $b->supplier->nama_supplier ?? '-' }}
                            </span>

                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold
                                @if($b->stok <= 5) bg-rose-50 text-rose-600
                                @elseif($b->stok <= 15) bg-amber-50 text-amber-600
                                @else bg-emerald-50 text-emerald-600
                                @endif">
                                {{ $b->stok }} {{ $b->satuan }}
                            </span>

                        </div>
                    </div>
                </div>

                @if(auth()->user()->role === 'admin')
                <div class="flex items-center gap-2 shrink-0">

                    <a href="{{ route('barang.edit', $b->id) }}"
                       class="p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-500 hover:text-slate-900 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </a>

                    <form action="{{ route('barang.destroy',$b->id) }}" method="POST" onsubmit="return confirm('Hapus barang ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="p-2.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-500 hover:text-rose-700 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </form>

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

{{-- MODAL TAMBAH BARANG --}}
@if(auth()->user()->role === 'admin')

<div id="modalTambah" class="hidden fixed inset-0 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center z-50 p-4">

    <div class="bg-white rounded-2xl p-6 sm:p-7 w-full max-w-lg shadow-2xl">

        <div class="flex items-center justify-between mb-5">
            <h3 class="text-lg font-extrabold text-slate-900">Tambah Barang</h3>
            <button onclick="document.getElementById('modalTambah').classList.add('hidden')" class="text-slate-400 hover:text-slate-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form action="{{ route('barang.store') }}" method="POST">

            @csrf

            <div class="space-y-4">

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Nama Barang</label>
                    <input type="text" name="nama_barang"
                        class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Stok Awal</label>
                        <input type="number" name="stok"
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Satuan</label>
                        <input type="text" name="satuan" placeholder="pcs, box, kg"
                            class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition" required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Kategori</label>
                    <select name="kategori_id"
                        class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition bg-white" required>
                        @foreach($kategoris as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Supplier</label>
                    <select name="supplier_id"
                        class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition bg-white">
                        <option value="">Pilih Supplier</option>
                        @foreach($suppliers as $s)
                        <option value="{{ $s->id }}">{{ $s->nama_supplier }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="flex justify-end gap-2 mt-7">

                <button type="button" onclick="document.getElementById('modalTambah').classList.add('hidden')"
                    class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-sm font-semibold transition">
                    Batal
                </button>

                <button type="submit"
                    class="px-4 py-2.5 bg-slate-900 hover:bg-slate-700 text-white rounded-xl text-sm font-semibold transition">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endif

@endsection