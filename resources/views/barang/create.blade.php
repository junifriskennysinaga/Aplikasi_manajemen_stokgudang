@extends('layouts.app')

@section('content')

<h2 class="text-xl font-bold mb-4">Tambah Barang</h2>

<form method="POST" action="/barang" class="bg-white p-4 rounded shadow">
@csrf

<input name="nama_barang" placeholder="Nama Barang" class="border p-2 w-full mb-2">

<input name="satuan" placeholder="Satuan" class="border p-2 w-full mb-2">

<select name="kategori_id" class="border p-2 w-full mb-2">
<option value="">-- Pilih Kategori --</option>

@foreach($kategori as $k)
<option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
@endforeach

</select>

<button class="bg-blue-500 text-white px-4 py-2">Simpan</button>

</form>

@endsection