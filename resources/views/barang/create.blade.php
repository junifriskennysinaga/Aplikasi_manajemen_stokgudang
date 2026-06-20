@extends('layouts.app')
@section('title', 'Tambah Barang - GudangKu')

@section('content')

<div class="max-w-xl mx-auto">

    <a href="{{ route('barang.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-slate-400 hover:text-slate-700 transition mb-5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        Kembali
    </a>

    <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100">
            <h2 class="text-lg font-extrabold text-slate-900">Tambah Barang</h2>
            <p class="text-sm text-slate-400 mt-0.5">Isi data barang baru ke dalam sistem</p>
        </div>

        <form method="POST" action="/barang" class="p-6 space-y-5">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Nama Barang</label>
                <input name="nama_barang" placeholder="Masukkan nama barang"
                    class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 focus:outline-none transition">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Satuan</label>
                <input name="satuan" placeholder="Contoh: pcs, box, kg"
                    class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-sm focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 focus:outline-none transition">
            </div>

            <div class="relative">
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Kategori</label>

                <input type="hidden" name="kategori_id" id="kategori_id">

                <button type="button" onclick="toggleDropdown()"
                    class="w-full border border-slate-200 rounded-xl px-3.5 py-2.5 text-left bg-white text-sm flex justify-between items-center
                    focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition">
                    <span id="selectedText" class="text-slate-700">-- Pilih Kategori --</span>
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <div id="dropdownList"
                    class="hidden absolute w-full mt-1.5 bg-white border border-slate-200 rounded-xl shadow-lg z-10 max-h-40 overflow-y-auto">

                    @foreach($kategori as $k)
                        <div onclick="selectKategori('{{ $k->id }}','{{ $k->nama_kategori }}')"
                            class="px-3.5 py-2.5 hover:bg-slate-50 cursor-pointer transition text-sm text-slate-700 font-medium">
                            {{ $k->nama_kategori }}
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="border-t border-slate-100 pt-5 flex justify-end gap-3">

                <a href="/barang"
                   class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 transition">
                    Batal
                </a>

                <button class="px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-slate-900 hover:bg-slate-700 transition shadow-lg shadow-slate-900/10">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

<script>
function toggleDropdown() {
    document.getElementById('dropdownList').classList.toggle('hidden');
}

function selectKategori(id, nama) {
    document.getElementById('kategori_id').value = id;
    document.getElementById('selectedText').innerText = nama;
    document.getElementById('dropdownList').classList.add('hidden');
}

window.addEventListener('click', function(e){
    const dropdown = document.getElementById('dropdownList');
    if (!e.target.closest('.relative')) {
        dropdown.classList.add('hidden');
    }
});
</script>

@endsection
