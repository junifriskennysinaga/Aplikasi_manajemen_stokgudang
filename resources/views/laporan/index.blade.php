@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">

    <h1 class="text-2xl font-bold mb-4">
        Laporan Stok Gudang
    </h1>

    <!-- FILTER -->
    <form method="GET" class="flex gap-2 mb-6">
        <input type="date" name="dari" value="{{ $dari }}" class="border p-2 rounded">
        <input type="date" name="sampai" value="{{ $sampai }}" class="border p-2 rounded">

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Tampilkan
        </button>
    </form>

    <!-- RINGKASAN -->
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div class="bg-green-100 p-4 rounded shadow">
            <h2 class="font-bold">Total Barang Masuk</h2>
            <p class="text-2xl">{{ $totalMasuk }}</p>
        </div>

        <div class="bg-red-100 p-4 rounded shadow">
            <h2 class="font-bold">Total Barang Keluar</h2>
            <p class="text-2xl">{{ $totalKeluar }}</p>
        </div>
    </div>

    <!-- TABEL -->
    <table class="w-full border text-sm">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Nama Barang</th>
                <th class="border p-2">Masuk</th>
                <th class="border p-2">Keluar</th>
            </tr>
        </thead>
        <tbody>

        <!-- DATA MASUK -->
        @foreach($barangMasuk as $m)
        <tr class="bg-green-50">
            <td class="border p-2">{{ $m->tanggal }}</td>
            <td class="border p-2">
                {{ $m->barang->nama_barang ?? '-' }}
            </td>
            <td class="border p-2 text-green-600 font-bold">
                +{{ $m->jumlah }}
            </td>
            <td class="border p-2">-</td>
        </tr>
        @endforeach

        <!-- DATA KELUAR -->
        @foreach($barangKeluar as $k)
        <tr class="bg-red-50">
            <td class="border p-2">{{ $k->tanggal }}</td>
            <td class="border p-2">
                {{ $k->barang->nama_barang ?? '-' }}
            </td>
            <td class="border p-2">-</td>
            <td class="border p-2 text-red-600 font-bold">
                -{{ $k->jumlah }}
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

</div>
@endsection