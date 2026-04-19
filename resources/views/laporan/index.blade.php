@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Laporan Stok Gudang</h1>
        <p class="text-gray-500">Monitoring barang masuk dan keluar</p>
    </div>

    <!-- FILTER -->
    <div class="bg-white p-4 rounded-xl shadow mb-6">

        <form method="GET" class="flex flex-wrap gap-3 items-end">

            <div>
                <label class="text-sm text-gray-600">Dari</label>
                <input type="date" name="dari" value="{{ $dari }}"
                    class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="text-sm text-gray-600">Sampai</label>
                <input type="date" name="sampai" value="{{ $sampai }}"
                    class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>

            <button class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg shadow">
                Tampilkan
            </button>

        </form>

    </div>

    <!-- SUMMARY -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

        <!-- MASUK -->
        <div class="bg-green-500 text-white p-5 rounded-xl shadow">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm opacity-90">Total Barang Masuk</p>
                    <h2 class="text-3xl font-bold">{{ $totalMasuk }}</h2>
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
        <div class="bg-red-500 text-white p-5 rounded-xl shadow">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm opacity-90">Total Barang Keluar</p>
                    <h2 class="text-3xl font-bold">{{ $totalKeluar }}</h2>
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
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="bg-gray-800 text-white px-4 py-3 font-semibold">
            Detail Transaksi Barang
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3 text-left">Tanggal</th>
                        <th class="p-3 text-left">Nama Barang</th>
                        <th class="p-3 text-center">Masuk</th>
                        <th class="p-3 text-center">Keluar</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($barangMasuk as $m)

                    <tr class="border-b hover:bg-green-50 transition">

                        <td class="p-3 text-gray-600">
                            {{ $m->tanggal }}
                        </td>

                        <td class="p-3 font-semibold text-gray-800">
                            {{ $m->barang->nama_barang ?? '-' }}
                        </td>

                        <td class="p-3 text-center">
                            <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-4 h-4"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 13l4 4L19 7" />
                                </svg>

                                +{{ $m->jumlah }}

                            </span>
                        </td>

                        <td class="p-3 text-center text-gray-400">-</td>

                    </tr>

                @empty
                @endforelse

                @forelse($barangKeluar as $k)

                    <tr class="border-b hover:bg-red-50 transition">

                        <td class="p-3 text-gray-600">
                            {{ $k->tanggal }}
                        </td>

                        <td class="p-3 font-semibold text-gray-800">
                            {{ $k->barang->nama_barang ?? '-' }}
                        </td>

                        <td class="p-3 text-center text-gray-400">-</td>

                        <td class="p-3 text-center">
                            <span class="inline-flex items-center gap-1 bg-red-100 text-red-700 px-3 py-1 rounded-full font-semibold">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-4 h-4"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 13H5m7-7l-7 7 7 7" />
                                </svg>

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