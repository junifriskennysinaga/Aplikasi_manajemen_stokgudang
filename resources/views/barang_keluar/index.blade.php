@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">📤 Barang Keluar</h1>
        <p class="text-gray-500">Kelola data barang keluar dari gudang</p>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">

        <!-- HEADER TABLE -->
        <div class="bg-red-500 text-white px-4 py-3 font-semibold">
            Data Barang Keluar
        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <!-- HEADER -->
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3 text-left">Barang</th>
                        <th class="p-3 text-center">Stok</th>
                        <th class="p-3 text-center">Jumlah Keluar</th>
                        <th class="p-3 text-center">Tanggal</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($barang as $b)

                    <tr class="border-b hover:bg-gray-50 transition">

                        <!-- BARANG + IKON CLEAN -->
                        <td class="p-3">
                            <div class="flex items-center gap-3">

                                <!-- ICON BOX (KELUAR) -->
                                <div class="w-11 h-11 rounded-lg bg-red-100 flex items-center justify-center">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-6 h-6 text-red-600"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V4m0 12v1m0-10V4" />
                                    </svg>

                                </div>

                                <!-- TEXT -->
                                <div>
                                    <div class="font-semibold text-gray-800">
                                        {{ $b->nama_barang }}
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        Barang keluar gudang
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
                        <form method="POST" action="/barang-keluar">
                            @csrf
                            <input type="hidden" name="barang_id" value="{{ $b->id }}">

                            <!-- JUMLAH -->
                            <td class="p-3 text-center">
                                <input 
                                    type="number"
                                    name="jumlah"
                                    class="w-20 text-center px-2 py-1 border rounded-lg focus:ring-2 focus:ring-red-400"
                                    placeholder="-"
                                    required
                                    min="1"
                                >
                            </td>

                            <!-- TANGGAL -->
                            <td class="p-3 text-center">
                                <input 
                                    type="date"
                                    name="tanggal"
                                    class="px-2 py-1 border rounded-lg focus:ring-2 focus:ring-red-400"
                                    required
                                >
                            </td>

                            <!-- BUTTON -->
                            <td class="p-3 text-center">
                                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow">
                                    - Keluar
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