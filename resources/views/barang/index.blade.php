@extends('layouts.app')

@section('content')

<div class="bg-white p-4 rounded shadow">

<h1 class="text-xl font-bold mb-4">Data Barang</h1>

<a href="/barang/create" class="bg-blue-500 text-white px-4 py-2 rounded">
    + Tambah Barang
</a>

<table class="w-full mt-4 border">
<thead class="bg-gray-200">
<tr>
<th class="p-2 border">Nama</th>
<th class="p-2 border">Kategori</th>
<th class="p-2 border">Satuan</th>
<th class="p-2 border">Stok</th>
</tr>
</thead>

<tbody>
@foreach($barang as $b)
<tr>
<td class="border p-2">{{ $b->nama_barang }}</td>
<td class="border p-2">{{ $b->kategori->nama_kategori ?? '-' }}</td>
<td class="border p-2">{{ $b->satuan }}</td>
<td class="border p-2">{{ $b->stok }}</td>
</tr>
@endforeach
</tbody>
</table>

</div>

@endsection