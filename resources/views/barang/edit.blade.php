@extends('layouts.app')

@section('content')

<div class="p-6 bg-pink-50 min-h-screen">

    <!-- CARD EDIT -->
    <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-2xl mx-auto">

        <h3 class="text-2xl font-bold text-gray-800">
            Edit Barang
        </h3>

        <p class="text-gray-500 mb-6">
            Perbarui data barang di bawah ini
        </p>

        <form method="POST" action="/barang/{{ $barang->id }}">
            @csrf
            @method('PUT')

            <!-- Nama Barang -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-2">
                    Nama Barang
                </label>

                <input 
                    type="text"
                    name="nama_barang"
                    value="{{ $barang->nama_barang }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3
                    focus:outline-none focus:border-pink-400"
                >
            </div>

            <!-- Satuan -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-2">
                    Satuan
                </label>

                <input 
                    type="text"
                    name="satuan"
                    value="{{ $barang->satuan }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3
                    focus:outline-none focus:border-pink-400"
                >
            </div>

            <!-- Kategori -->
            <div class="mb-6">
                <label class="block text-gray-600 mb-2">
                    Kategori
                </label>

                <div class="relative">

                    <!-- tombol dropdown -->
                    <button 
                        type="button"
                        id="dropdownButton"
                        class="w-full border border-pink-400 rounded-lg px-4 py-3 
                        text-left bg-white focus:outline-none">

                        <span id="selectedText">
                            {{ $barang->kategori->nama_kategori }}
                        </span>
                    </button>

                    <!-- menu dropdown -->
                    <div 
                        id="dropdownMenu"
                        class="hidden absolute w-full mt-1 bg-white border 
                        rounded-lg shadow-lg z-50">

                        @foreach($kategori as $k)

                            <div 
                                onclick="selectKategori('{{ $k->id }}', '{{ $k->nama_kategori }}')"
                                class="px-4 py-3 hover:bg-pink-100 cursor-pointer transition">

                                {{ $k->nama_kategori }}

                            </div>

                        @endforeach

                    </div>

                </div>

                <!-- hidden input -->
                <input 
                    type="hidden"
                    name="kategori_id"
                    id="kategori_id"
                    value="{{ $barang->kategori_id }}">
            </div>

            <!-- tombol -->
            <div class="flex justify-end gap-3">

                <a 
                    href="/barang"
                    class="px-6 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">
                    Batal
                </a>

                <button
                    class="px-6 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600">
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

<!-- SCRIPT DROPDOWN -->
<script>
const btn = document.getElementById('dropdownButton');
const menu = document.getElementById('dropdownMenu');

btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
});

function selectKategori(id, nama) {
    document.getElementById('kategori_id').value = id;
    document.getElementById('selectedText').innerText = nama;
    menu.classList.add('hidden');
}

window.addEventListener('click', function(e) {
    if (!btn.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add('hidden');
    }
});
</script>

@endsection