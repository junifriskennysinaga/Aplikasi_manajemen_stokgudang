@extends('layouts.app')

@section('content')

<div class="p-6 bg-pink-50 min-h-screen flex justify-center items-start">

    <div class="w-full max-w-xl bg-white rounded-2xl shadow-md border overflow-hidden">

        <!-- HEADER -->
        <div class="px-6 py-4 border-b">
            <h2 class="text-xl font-bold text-gray-800">
                Tambah Barang
            </h2>
            <p class="text-sm text-gray-500">
                Isi data barang baru ke dalam sistem
            </p>
        </div>

        <!-- FORM -->
        <form method="POST" action="/barang" class="p-6 space-y-5">
            @csrf

            <!-- NAMA BARANG -->
            <div>
                <label class="block text-sm text-gray-600 mb-1">
                    Nama Barang
                </label>
                <input name="nama_barang" placeholder="Masukkan nama barang"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 
                    focus:ring-2 focus:ring-pink-400 
                    focus:border-pink-400 
                    focus:outline-none transition">
            </div>

            <!-- SATUAN -->
            <div>
                <label class="block text-sm text-gray-600 mb-1">
                    Satuan
                </label>
                <input name="satuan" placeholder="Contoh: pcs, box, kg"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 
                    focus:ring-2 focus:ring-pink-400 
                    focus:border-pink-400 
                    focus:outline-none transition">
            </div>

            <!-- CUSTOM KATEGORI -->
            <div class="relative">
                <label class="block text-sm text-gray-600 mb-1">
                    Kategori
                </label>

                <!-- VALUE YANG DIKIRIM -->
                <input type="hidden" name="kategori_id" id="kategori_id">

                <!-- BUTTON -->
                <button type="button" onclick="toggleDropdown()"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-left bg-white
                    focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition">

                    <span id="selectedText">-- Pilih Kategori --</span>
                </button>

                <!-- DROPDOWN -->
                <div id="dropdownList"
                    class="hidden absolute w-full mt-1 bg-white border rounded-lg shadow z-10 max-h-40 overflow-y-auto">

                    @foreach($kategori as $k)
                        <div onclick="selectKategori('{{ $k->id }}','{{ $k->nama_kategori }}')"
                            class="px-3 py-2 hover:bg-pink-100 cursor-pointer transition">
                            {{ $k->nama_kategori }}
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- BUTTON -->
            <div class="border-t pt-4 flex justify-end gap-3">

                <a href="/barang"
                   class="px-5 py-2 rounded-lg text-sm text-gray-600 bg-gray-100 hover:bg-gray-200 transition">
                    Batal
                </a>

                <button class="px-5 py-2 rounded-lg text-sm text-white 
                               bg-gradient-to-r from-pink-500 to-rose-500 
                               hover:from-pink-600 hover:to-rose-600 
                               shadow transition">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

<!-- SCRIPT -->
<script>
function toggleDropdown() {
    document.getElementById('dropdownList').classList.toggle('hidden');
}

function selectKategori(id, nama) {
    document.getElementById('kategori_id').value = id;
    document.getElementById('selectedText').innerText = nama;
    document.getElementById('dropdownList').classList.add('hidden');
}

// OPTIONAL: klik luar nutup dropdown
window.addEventListener('click', function(e){
    const dropdown = document.getElementById('dropdownList');
    if (!e.target.closest('.relative')) {
        dropdown.classList.add('hidden');
    }
});
</script>

@endsection