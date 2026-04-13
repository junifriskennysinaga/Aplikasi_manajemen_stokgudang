@extends('layouts.app')

@section('content')

<div class="p-6 bg-white rounded shadow">

    <h1 class="text-2xl font-bold mb-4">Barang Masuk</h1>

    <!-- TABEL -->
    <table class="w-full border border-gray-300">

        <!-- HEADER -->
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">Nama Barang</th>
                <th class="border p-2">Stok</th>
                <th class="border p-2">Jumlah Masuk</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>

        <tbody>
        @foreach($barang as $b)
        <tr class="text-center">

            <td class="border p-2">
                {{ $b->nama_barang }}
            </td>

            <td class="border p-2">
                {{ $b->stok }}
            </td>

            <td class="border p-2">
                <form method="POST" action="/barang-masuk" class="flex gap-2 justify-center">
                    @csrf

                    <input type="hidden" name="barang_id" value="{{ $b->id }}">

                    <input 
                        type="number" 
                        name="jumlah" 
                        placeholder="Jumlah"
                        class="border p-1 w-20"
                        required
                    >
            </td>

            <td class="border p-2">
                    <input 
                        type="date" 
                        name="tanggal" 
                        class="border p-1"
                        required
                    >
            </td>

            <td class="border p-2">
                    <button class="bg-green-500 text-white px-3 py-1 rounded">
                        Simpan
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
        </tbody>

    </table>

</div>

@endsection