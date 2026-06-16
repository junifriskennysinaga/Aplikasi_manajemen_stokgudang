@extends('layouts.app')

@section('content')

<div class="p-6 bg-slate-100 min-h-screen">

    <div class="mb-6">

        <h1 class="text-3xl font-bold text-slate-900">
            Barang Keluar
        </h1>

        <p class="text-slate-500 mt-1">
            Kelola stok barang yang keluar dari gudang
        </p>

    </div>

    @if(session('success'))

    <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl">
        {{ session('success') }}
    </div>

    @endif

    <div class="grid gap-5">

        @forelse($barang as $b)

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                <div>

                    <h3 class="text-lg font-bold text-slate-900">
                        {{ $b->nama_barang }}
                    </h3>

                    <div class="flex flex-wrap gap-2 mt-2">

                        <span class="px-3 py-1 bg-slate-100 rounded-lg text-sm">
                            Stok :
                            <b>{{ $b->stok }} {{ $b->satuan }}</b>
                        </span>

                        <span class="px-3 py-1 bg-slate-100 rounded-lg text-sm">
                            ID #{{ $b->id }}
                        </span>

                    </div>

                </div>

                @if(auth()->user()->role == 'admin')

                <form action="{{ route('barang-keluar.store') }}"
                      method="POST"
                      class="flex flex-wrap gap-3 items-end">

                    @csrf

                    <input
                        type="hidden"
                        name="barang_id"
                        value="{{ $b->id }}">

                    <div>

                        <label class="block text-xs font-semibold text-slate-500 mb-1">
                            Jumlah Keluar
                        </label>

                        <input
                            type="number"
                            name="jumlah"
                            min="1"
                            max="{{ $b->stok }}"
                            required
                            class="border border-slate-300 rounded-xl px-3 py-2 w-32">

                    </div>

                    <div>

                        <label class="block text-xs font-semibold text-slate-500 mb-1">
                            Tanggal Keluar
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            value="{{ date('Y-m-d') }}"
                            required
                            class="border border-slate-300 rounded-xl px-3 py-2">

                    </div>

                    <button
                        type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-xl font-semibold">

                        Kurangi

                    </button>

                </form>

                @else

                <div class="px-4 py-2 bg-slate-100 rounded-xl text-slate-500 font-medium">
                    Read Only
                </div>

                @endif

            </div>

        </div>

        @empty

        <div class="bg-white rounded-2xl border border-slate-200 p-10 text-center text-slate-500">

            Belum ada data barang

        </div>

        @endforelse

    </div>

</div>

@endsection