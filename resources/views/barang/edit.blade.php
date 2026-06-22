@extends('layouts.app')
@section('title', 'Edit Barang - GudangKu')

@section('content')

<div class="max-w-xl mx-auto">

    <a href="{{ route('barang.index') }}"
       class="inline-flex items-center gap-1.5 text-sm font-semibold text-slate-400 hover:text-slate-700 transition mb-5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100">
            <h2 class="text-lg font-extrabold text-slate-900">
                Edit Barang
            </h2>
            <p class="text-sm text-slate-400 mt-1">
                Perbarui data barang yang sudah ada
            </p>
        </div>

        <form method="POST"
              action="{{ route('barang.update', $barang->id) }}"
              class="p-6 space-y-5">

            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">
                    Nama Barang
                </label>

                <input
                    type="text"
                    name="nama_barang"
                    value="{{ old('nama_barang', $barang->nama_barang) }}"
                    class="w-full border border-slate-200 rounded-xl px-4 py-3"
                    required>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">
                    Stok
                </label>

                <input
                    type="number"
                    name="stok"
                    value="{{ old('stok', $barang->stok) }}"
                    class="w-full border border-slate-200 rounded-xl px-4 py-3"
                    required>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">
                    Satuan
                </label>

                <input
                    type="text"
                    name="satuan"
                    value="{{ old('satuan', $barang->satuan) }}"
                    class="w-full border border-slate-200 rounded-xl px-4 py-3"
                    required>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">
                    Kategori
                </label>

                <select
                    name="kategori_id"
                    class="w-full border border-slate-200 rounded-xl px-4 py-3"
                    required>

                    @foreach($kategoris as $k)
                        <option
                            value="{{ $k->id }}"
                            {{ $barang->kategori_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">
                    Supplier
                </label>

                <select
                    name="supplier_id"
                    class="w-full border border-slate-200 rounded-xl px-4 py-3">

                    <option value="">
                        Pilih Supplier
                    </option>

                    @foreach($suppliers as $supplier)
                        <option
                            value="{{ $supplier->id }}"
                            {{ $barang->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->nama_supplier }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="flex justify-end gap-3 pt-5 border-t border-slate-100">

                <a href="{{ route('barang.index') }}"
                   class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl">
                    Batal
                </a>

                <button
                    type="submit"
                    class="px-5 py-2.5 bg-slate-900 hover:bg-slate-700 text-white rounded-xl">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
