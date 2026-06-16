@extends('layouts.app')

@section('content')
<div class="space-y-6 animate-fade-in">
    <!-- Header Page -->
    <div>
        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Edit Inventaris Bahan</h2>
        <p class="text-slate-400 text-sm font-medium">Modifikasi spesifikasi data komoditas Gudang Toko Tunas Maju</p>
    </div>

    <!-- CARD UTAMA (Glassmorphism Style) -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl p-8 max-w-2xl mx-auto">
        <div class="border-b border-slate-100 pb-4 mb-6">
            <h3 class="text-lg font-bold text-slate-900">Formulir Pembaruan Data</h3>
            <p class="text-slate-400 text-xs">Pastikan seluruh input data kuantitas dan relasi sudah benar sebelum disimpan.</p>
        </div>

        <form method="POST" action="{{ route('barang.update', $barang->id) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Input: Nama Barang -->
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-2">
                    Nama Komoditas Bahan Baku
                </label>
                <input 
                    type="text"
                    name="nama_barang"
                    value="{{ old('nama_barang', $barang->nama_barang) }}"
                    class="w-full bg-slate-50 border border-slate-200 px-4 py-3 rounded-xl focus:bg-white focus:border-slate-900 focus:outline-none text-slate-900 transition-all text-sm font-medium"
                    placeholder="Contoh: Mentega Wisman Premium"
                    required
                >
            </div>

            <!-- Input: Satuan Ukur -->
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-2">
                    Satuan Ukur / Kemasan
                </label>
                <input 
                    type="text"
                    name="satuan"
                    value="{{ old('satuan', $barang->satuan) }}"
                    class="w-full bg-slate-50 border border-slate-200 px-4 py-3 rounded-xl focus:bg-white focus:border-slate-900 focus:outline-none text-slate-900 transition-all text-sm font-medium"
                    placeholder="Contoh: Kg / Pcs / Kaleng"
                    required
                >
            </div>

            <!-- Kustom Dropdown: Kategori -->
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-2">
                    Klasifikasi Kelompok Kategori
                </label>

                <div class="relative">
                    <!-- Tombol Pemicu Dropdown -->
                    <button 
                        type="button"
                        id="dropdownButton"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-left focus:bg-white focus:border-slate-900 focus:outline-none flex justify-between items-center transition-all"
                    >
                        <span id="selectedText" class="text-sm font-semibold text-slate-800">
                            {{ $barang->kategori->nama_kategori ?? 'Pilih Kategori' }}
                        </span>
                        <!-- Icon Panah Dropdown -->
                        <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" id="dropdownArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Menu Pilihan Dropdown -->
                    <div 
                        id="dropdownMenu"
                        class="hidden absolute w-full mt-2 bg-white border border-slate-200 rounded-2xl shadow-xl z-50 overflow-hidden max-h-60 overflow-y-auto animate-fade-in"
                    >
                        @foreach($kategori as $k)
                            <div 
                                onclick="selectKategori('{{ $k->id }}', '{{ $k->nama_kategori }}')"
                                class="px-4 py-3 hover:bg-slate-50 text-sm font-semibold text-slate-700 hover:text-slate-900 cursor-pointer transition flex items-center justify-between"
                            >
                                <span>{{ $k->nama_kategori }}</span>
                                @if($barang->kategori_id == $k->id)
                                    <span class="text-xs text-slate-400 font-bold uppercase tracking-wider bg-slate-100 px-2 py-0.5 rounded">Aktif</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Hidden Input Khusus Pengiriman Data ke Controller -->
                <input 
                    type="hidden"
                    name="kategori_id"
                    id="kategori_id"
                    value="{{ old('kategori_id', $barang->kategori_id) }}"
                >
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                <a 
                    href="{{ route('barang.index') }}"
                    class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold uppercase tracking-wider transition"
                >
                    Kembali / Batal
                </a>

                <button
                    type="submit"
                    class="px-6 py-3 bg-slate-950 hover:bg-black text-white rounded-xl text-xs font-bold uppercase tracking-wider shadow-lg shadow-slate-950/10 transition"
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