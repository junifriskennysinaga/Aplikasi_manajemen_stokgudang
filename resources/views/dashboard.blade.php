@extends('layouts.app')

@section('title', 'E-ware')

@section('content')

<!-- WELCOME BANNER -->
<div class="bg-gradient-to-r from-pink-500 to-purple-500 text-white p-6 rounded-2xl shadow mb-6">
    <h2 class="text-2xl font-bold">
        Selamat datang, {{ auth()->user()->name }} 👋
    </h2>
    <p class="text-pink-100 text-sm mt-1">
        Ringkasan aktivitas dan stok gudang hari ini
    </p>
</div>

<!-- STAT CARDS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <!-- TOTAL BARANG -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500">Total Barang</p>
            <h2 class="text-3xl font-bold text-gray-800 mt-1">
                {{ \App\Models\Barang::count() }}
            </h2>
        </div>
        <div class="bg-pink-100 text-pink-500 p-3 rounded-full">
            <i data-lucide="package"></i>
        </div>
    </div>

    <!-- BARANG MASUK -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500">Barang Masuk</p>
            <h2 class="text-3xl font-bold text-green-500 mt-1">
                {{ \App\Models\BarangMasuk::sum('jumlah') }}
            </h2>
        </div>
        <div class="bg-green-100 text-green-500 p-3 rounded-full">
            <i data-lucide="arrow-down-circle"></i>
        </div>
    </div>

    <!-- BARANG KELUAR -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500">Barang Keluar</p>
            <h2 class="text-3xl font-bold text-red-500 mt-1">
                {{ \App\Models\BarangKeluar::sum('jumlah') }}
            </h2>
        </div>
        <div class="bg-red-100 text-red-500 p-3 rounded-full">
            <i data-lucide="arrow-up-circle"></i>
        </div>
    </div>

</div>

<!-- AKTIVITAS TERBARU -->
<div class="bg-white p-6 rounded-2xl shadow">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-700">
            Aktivitas Terbaru
        </h2>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left text-gray-600">

            <thead class="bg-pink-50 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Barang</th>
                    <th class="px-4 py-3">Jenis</th>
                    <th class="px-4 py-3">Jumlah</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @foreach(\App\Models\BarangMasuk::latest()->take(5)->get() as $m)
                <tr class="hover:bg-pink-50 transition">
                    <td class="px-4 py-3">{{ $m->tanggal }}</td>
                    <td class="px-4 py-3">{{ $m->barang->nama_barang ?? '-' }}</td>
                    <td class="px-4 py-3">
                        <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full">
                            Masuk
                        </span>
                    </td>
                    <td class="px-4 py-3 font-semibold">{{ $m->jumlah }}</td>
                </tr>
                @endforeach

                @foreach(\App\Models\BarangKeluar::latest()->take(5)->get() as $k)
                <tr class="hover:bg-pink-50 transition">
                    <td class="px-4 py-3">{{ $k->tanggal }}</td>
                    <td class="px-4 py-3">{{ $k->barang->nama_barang ?? '-' }}</td>
                    <td class="px-4 py-3">
                        <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">
                            Keluar
                        </span>
                    </td>
                    <td class="px-4 py-3 font-semibold">{{ $k->jumlah }}</td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection