@extends('layouts.app')

@section('content')

<div class="bg-white p-4 rounded shadow">

    <h2 class="text-xl font-bold mb-4">Data Kategori</h2>

    <form method="POST" action="/kategori" class="flex gap-2 mb-4">
        @csrf
        <input name="nama_kategori" placeholder="Nama Kategori" class="border p-2 flex-1">
        <button class="bg-blue-500 text-white px-4">Tambah</button>
    </form>

    <table class="w-full border">
        <tr class="bg-gray-100">
            <th class="p-2 border">No</th>
            <th class="p-2 border">Nama Kategori</th>
            <th class="p-2 border">Aksi</th>
        </tr>

        @foreach($kategori as $i => $k)
        <tr class="text-center">
            <td class="p-2 border">{{ $i+1 }}</td>
            <td class="p-2 border">{{ $k->nama_kategori }}</td>
            <td class="p-2 border">
                <form method="POST" action="/kategori/{{ $k->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-2">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>

@endsection