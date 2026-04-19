@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">📥 Barang Masuk</h1>
        <p class="text-gray-500">Kelola data barang masuk</p>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">

        <div class="bg-green-500 text-white px-4 py-3 font-semibold">
            Data Barang Masuk
        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3 text-left">Barang</th>
                        <th class="p-3 text-center">Stok</th>
                        <th class="p-3 text-center">Jumlah Masuk</th>
                        <th class="p-3 text-center">Tanggal</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($barang as $b)

                    <tr class="border-b hover:bg-gray-50 transition">

                        <!-- BARANG + IKON -->
                        <td class="p-3">
                            <div class="flex items-center gap-3">

                                <!-- ICON CLEAN (BUKAN GAMBAR AI) -->
                                <div class="w-11 h-11 rounded-lg bg-green-100 flex items-center justify-center">

                                    <!-- ICON BOX / PACKAGE -->
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                         class="w-6 h-6 text-green-600"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-14L4 7m8 4v10m0-10L4 7m0 0v10l8 4" />
                                    </svg>

                                </div>

                                <!-- TEXT -->
                                <div>
                                    <div class="font-semibold text-gray-800">
                                        {{ $b->nama_barang }}
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        Barang gudang
                                    </div>
                                </div>

                            </div>
                        </td>

                        <!-- STOK -->
                        <td class="p-3 text-center">
                            <span class="px-3 py-1 rounded-full text-sm font-semibold
                                @if($b->stok <= 5)
                                    bg-red-100 text-red-600
                                @elseif($b->stok <= 15)
                                    bg-yellow-100 text-yellow-700
                                @else
                                    bg-green-100 text-green-700
                                @endif
                            ">
                                {{ $b->stok }} pcs
                            </span>
                        </td>

                        <!-- FORM -->
                        <form method="POST" action="/barang-masuk">
                            @csrf
                            <input type="hidden" name="barang_id" value="{{ $b->id }}">

                            <td class="p-3 text-center">
                                <input 
                                    type="number"
                                    name="jumlah"
                                    class="w-20 text-center px-2 py-1 border rounded-lg focus:ring-2 focus:ring-green-400"
                                    placeholder="+"
                                    required
                                >
                            </td>

                            <td class="p-3 text-center">
                                <input 
                                    type="date"
                                    name="tanggal"
                                    class="px-2 py-1 border rounded-lg focus:ring-2 focus:ring-green-400"
                                    required
                                >
                            </td>

                            <td class="p-3 text-center">
                                <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow">
                                    + Masuk
                                </button>
                            </td>

                        </form>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">
                            Tidak ada data barang
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection