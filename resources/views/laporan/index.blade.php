@extends('layouts.app')

@section('content')

<div class="p-6 bg-gradient-to-br from-pink-50 via-rose-50 to-white min-h-screen">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold tracking-tight text-gray-800">
            Laporan Stok Gudang
        </h1>
        <p class="text-gray-500 font-medium mt-1">
            Monitoring barang masuk dan keluar
        </p>
    </div>

    <!-- FILTER -->
    <div class="bg-white p-4 rounded-xl shadow mb-6 border border-pink-100">

        <form method="GET" class="flex flex-wrap gap-3 items-end">

            <div>
                <label class="text-sm text-gray-600 font-medium">Dari</label>
                <input type="date" name="dari" value="{{ $dari }}"
                    class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-pink-400">
            </div>

            <div>
                <label class="text-sm text-gray-600 font-medium">Sampai</label>
                <input type="date" name="sampai" value="{{ $sampai }}"
                    class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-pink-400">
            </div>

            <button class="bg-pink-500 hover:bg-pink-600 text-white px-5 py-2 rounded-lg shadow font-semibold">
                Tampilkan
            </button>

        </form>

    </div>

    <!-- SUMMARY -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

        <!-- MASUK -->
        <div class="bg-pink-500 text-white p-5 rounded-xl shadow">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm opacity-90 font-medium">Total Barang Masuk</p>
                    <h2 class="text-4xl font-black tracking-tight">
                        {{ $totalMasuk }}
                    </h2>
                </div>

                <div class="bg-white/20 p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6 text-white"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20 13V7a2 2 0 00-2-2h-4m-6 0H6a2 2 0 00-2 2v6m0 4v2a2 2 0 002 2h4m6-4h4a2 2 0 002-2v-2" />
                    </svg>
                </div>

            </div>
        </div>

        <!-- KELUAR -->
        <div class="bg-rose-400 text-white p-5 rounded-xl shadow">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm opacity-90 font-medium">Total Barang Keluar</p>
                    <h2 class="text-4xl font-black tracking-tight">
                        {{ $totalKeluar }}
                    </h2>
                </div>

                <div class="bg-white/20 p-3 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6 text-white"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>

            </div>

        </div>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden border border-pink-100">

        <div class="bg-pink-600 text-white px-4 py-3 font-bold tracking-wide">
            Detail Transaksi Barang
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-pink-50 text-gray-700">
                    <tr class="font-semibold">
                        <th class="p-3 text-left">Tanggal</th>
                        <th class="p-3 text-left">Nama Barang</th>
                        <th class="p-3 text-center">Masuk</th>
                        <th class="p-3 text-center">Keluar</th>
                    </tr>
                </thead>

                <tbody class="font-medium">

                @forelse($barangMasuk as $m)

                    <tr class="border-b hover:bg-pink-50 transition">

                        <td class="p-3 text-gray-600">
                            {{ $m->tanggal }}
                        </td>

                        <td class="p-3 text-gray-800 font-semibold">
                            {{ $m->barang->nama_barang ?? '-' }}
                        </td>

                        <td class="p-3 text-center">
                            <span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full font-semibold">
                                +{{ $m->jumlah }}
                            </span>
                        </td>

                        <td class="p-3 text-center text-gray-400">-</td>

                    </tr>

                @empty
                @endforelse

                @forelse($barangKeluar as $k)

                    <tr class="border-b hover:bg-pink-50 transition">

                        <td class="p-3 text-gray-600">
                            {{ $k->tanggal }}
                        </td>

                        <td class="p-3 text-gray-800 font-semibold">
                            {{ $k->barang->nama_barang ?? '-' }}
                        </td>

                        <td class="p-3 text-center text-gray-400">-</td>

                        <td class="p-3 text-center">
                            <span class="bg-pink-200 text-pink-800 px-3 py-1 rounded-full font-semibold">
                                -{{ $k->jumlah }}
                            </span>
                        </td>

                    </tr>

                @empty
                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection