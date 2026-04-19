@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <!-- HEADER -->
        <div class="px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-700">
                Edit Barang
            </h2>
            <p class="text-sm text-gray-500">
                Perbarui data barang di bawah ini
            </p>
        </div>

        <!-- FORM -->
        <form action="/barang/{{ $barang->id }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <!-- NAMA -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Nama Barang
                </label>
                <input type="text" name="nama_barang"
                    value="{{ $barang->nama_barang }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- SATUAN -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Satuan
                </label>
                <input type="text" name="satuan"
                    value="{{ $barang->satuan }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- KATEGORI -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Kategori
                </label>
                <select name="kategori_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}"
                            {{ $barang->kategori_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- DIVIDER -->
            <div class="border-t pt-4 flex justify-end gap-3">

                <a href="/barang"
                   class="px-5 py-2 rounded-lg text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 transition">
                    Batal
                </a>

                <button type="submit"
                    class="px-5 py-2 rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition">
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

@endsection