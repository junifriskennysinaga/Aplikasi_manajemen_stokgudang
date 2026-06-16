@extends('layouts.app')

@section('content')

<div class="p-6 bg-slate-100 min-h-screen">

    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-6">

        <div>
            <h1 class="text-3xl font-bold text-slate-900">
                Data Barang
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola seluruh data barang gudang
            </p>
        </div>

        @if(auth()->user()->role === 'admin')

        <button
            onclick="document.getElementById('modalTambah').classList.remove('hidden')"
            class="bg-slate-900 hover:bg-black text-white px-5 py-3 rounded-xl font-semibold">

            + Tambah Barang

        </button>

        @endif

    </div>

    @if(session('success'))

    <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl">
        {{ session('success') }}
    </div>

    @endif

    <div class="grid gap-5">

        @forelse($barangs as $b)

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5">

            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-5">

                <div>

                    <h3 class="text-lg font-bold text-slate-900">
                        {{ $b->nama_barang }}
                    </h3>

                    <div class="flex flex-wrap gap-2 mt-3">

                        <span class="px-3 py-1 bg-slate-100 rounded-lg text-sm">
                            Kategori :
                            <b>{{ $b->kategori->nama_kategori }}</b>
                        </span>

                        <span class="px-3 py-1 bg-slate-100 rounded-lg text-sm">
                            Supplier :
                            <b>{{ $b->supplier->nama_supplier ?? '-' }}</b>
                        </span>

                        <span class="px-3 py-1 rounded-lg text-sm

                            @if($b->stok <= 5)
                                bg-red-100 text-red-600
                            @elseif($b->stok <= 15)
                                bg-yellow-100 text-yellow-700
                            @else
                                bg-green-100 text-green-700
                            @endif

                        ">
                            Stok :
                            <b>{{ $b->stok }} {{ $b->satuan }}</b>
                        </span>

                    </div>

                </div>

                @if(auth()->user()->role === 'admin')

                <form
                    action="{{ route('barang.destroy',$b->id) }}"
                    method="POST"
                    onsubmit="return confirm('Hapus barang ini?')">

                    @csrf
                    @method('DELETE')

                    <button
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl">

                        Hapus

                    </button>

                </form>

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

{{-- MODAL TAMBAH BARANG --}}
@if(auth()->user()->role === 'admin')

<div
    id="modalTambah"
    class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white rounded-2xl p-6 w-full max-w-lg">

        <h3 class="text-xl font-bold mb-4">
            Tambah Barang
        </h3>

        <form action="{{ route('barang.store') }}" method="POST">

            @csrf

            <div class="space-y-4">

                <div>
                    <label class="block text-sm mb-1">
                        Nama Barang
                    </label>

                    <input
                        type="text"
                        name="nama_barang"
                        class="w-full border rounded-xl px-3 py-2"
                        required>
                </div>

                <div>
                    <label class="block text-sm mb-1">
                        Stok Awal
                    </label>

                    <input
                        type="number"
                        name="stok"
                        class="w-full border rounded-xl px-3 py-2"
                        required>
                </div>

                <div>
                    <label class="block text-sm mb-1">
                        Satuan
                    </label>

                    <input
                        type="text"
                        name="satuan"
                        class="w-full border rounded-xl px-3 py-2"
                        required>
                </div>

                <div>
                    <label class="block text-sm mb-1">
                        Kategori
                    </label>

                    <select
                        name="kategori_id"
                        class="w-full border rounded-xl px-3 py-2"
                        required>

                        @foreach($kategoris as $k)

                        <option value="{{ $k->id }}">
                            {{ $k->nama_kategori }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <div>
                    <label class="block text-sm mb-1">
                        Supplier
                    </label>

                    <select
                        name="supplier_id"
                        class="w-full border rounded-xl px-3 py-2">

                        <option value="">
                            Pilih Supplier
                        </option>

                        @foreach($suppliers as $s)

                        <option value="{{ $s->id }}">
                            {{ $s->nama_supplier }}
                        </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="flex justify-end gap-2 mt-6">

                <button
                    type="button"
                    onclick="document.getElementById('modalTambah').classList.add('hidden')"
                    class="px-4 py-2 bg-slate-200 rounded-xl">

                    Batal

                </button>

                <button
                    type="submit"
                    class="px-4 py-2 bg-slate-900 text-white rounded-xl">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endif

@endsection
