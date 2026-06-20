@extends('layouts.app')
@section('title', 'Edit Barang - GudangKu')

@section('content')

<div class="max-w-xl mx-auto">

    <a href="{{ route('barang.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-slate-400 hover:text-slate-700 transition mb-5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        Kembali
    </a>

    <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100">
            <h2 class="text-lg font-extrabold text-slate-900">Edit Barang</h2>
            <p class="text-sm text-slate-400 mt-0.5">Perbarui data barang yang sudah ada</p>
        </div>

        <form method="POST" action="{{ route('barang.update', $barang->id) }}" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">
                    Nama Barang
                </label>
                <input
                    type="text"
                    name="nama_barang"
                    value="{{ old('nama_barang', $barang->nama_barang) }}"
                    class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 focus:outline-none transition"
                    placeholder="Contoh: Mentega Premium"
                    required
                >
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">
                    Satuan
                </label>
                <input
                    type="text"
                    name="satuan"
                    value="{{ old('satuan', $barang->satuan) }}"
                    class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 focus:outline-none transition"
                    placeholder="Contoh: Kg / Pcs / Kaleng"
                    required
                >
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">
                    Kategori
                </label>

                <div class="relative">
                    <button
                        type="button"
                        id="dropdownButton"
                        class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-left flex justify-between items-center text-sm
                        focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition"
                    >
                        <span id="selectedText" class="text-slate-700 font-medium">
                            {{ $barang->kategori->nama_kategori ?? 'Pilih Kategori' }}
                        </span>
                        <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" id="dropdownArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div
                        id="dropdownMenu"
                        class="hidden absolute w-full mt-1.5 bg-white border border-slate-200 rounded-xl shadow-lg z-50 overflow-hidden max-h-60 overflow-y-auto"
                    >
                        @foreach($kategori as $k)
                            <div
                                onclick="selectKategori('{{ $k->id }}', '{{ $k->nama_kategori }}')"
                                class="px-3.5 py-2.5 hover:bg-slate-50 text-sm font-medium text-slate-700 cursor-pointer transition flex items-center justify-between"
                            >
                                <span>{{ $k->nama_kategori }}</span>
                                @if($barang->kategori_id == $k->id)
                                    <span class="text-[10px] text-slate-400 font-bold uppercase bg-slate-100 px-2 py-0.5 rounded">Aktif</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <input
                    type="hidden"
                    name="kategori_id"
                    id="kategori_id"
                    value="{{ old('kategori_id', $barang->kategori_id) }}"
                >
            </div>

            <div class="flex justify-end gap-3 pt-5 border-t border-slate-100">
                <a
                    href="{{ route('barang.index') }}"
                    class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-sm font-semibold transition"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="px-5 py-2.5 bg-slate-900 hover:bg-slate-700 text-white rounded-xl text-sm font-semibold shadow-lg shadow-slate-900/10 transition"
                >
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const btn = document.getElementById('dropdownButton');
    const menu = document.getElementById('dropdownMenu');
    const arrow = document.getElementById('dropdownArrow');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    });

    function selectKategori(id, nama) {
        document.getElementById('kategori_id').value = id;
        document.getElementById('selectedText').innerText = nama;
        menu.classList.add('hidden');
        arrow.classList.remove('rotate-180');
    }

    window.addEventListener('click', function(e) {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
            arrow.classList.remove('rotate-180');
        }
    });
</script>
@endsection
