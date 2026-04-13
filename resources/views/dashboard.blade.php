@extends('layouts.app')

@section('content')

<div class="grid grid-cols-3 gap-4">

    <div class="bg-white p-4 rounded shadow text-center">
        <h2 class="text-lg font-bold">Barang</h2>
        <p class="text-2xl">{{ \App\Models\Barang::count() }}</p>
    </div>

    <div class="bg-green-100 p-4 rounded shadow text-center">
        <h2 class="text-lg font-bold">Barang Masuk</h2>
        <p class="text-2xl">{{ \App\Models\BarangMasuk::count() }}</p>
    </div>

    <div class="bg-red-100 p-4 rounded shadow text-center">
        <h2 class="text-lg font-bold">Barang Keluar</h2>
        <p class="text-2xl">{{ \App\Models\BarangKeluar::count() }}</p>
    </div>

</div>

@endsection