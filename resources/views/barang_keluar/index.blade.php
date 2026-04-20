@extends('layouts.app')

@section('content')

<div class="p-6 bg-gradient-to-br from-pink-50 via-white to-rose-50 min-h-screen">

    <div class="mb-8 flex items-center justify-between">

        <div>
            <h1 class="text-4xl font-black flex items-center gap-3">

                <!-- ICON -->
                <span class="w-12 h-12 flex items-center justify-center rounded-xl 
                             bg-gradient-to-tr from-pink-500 to-rose-500 text-white shadow-lg">
                </span>

                <!-- TEXT -->
                <span>
                    <span class="bg-gradient-to-r from-pink-500 via-rose-500 to-pink-600 
                                 bg-clip-text text-transparent">
                        Barang
                    </span>
                    <span class="text-gray-700 italic">Keluar</span>
                </span>

            </h1>

            <p class="text-gray-500 mt-2 text-sm tracking-wide">
                Kelola stok barang keluar dengan cepat & rapi
            </p>
        </div>

        <!-- BADGE -->
        <div class="hidden md:block">
            <span class="px-4 py-2 text-sm font-semibold rounded-full 
                         bg-gradient-to-r from-pink-500 to-rose-500 text-white shadow">
                E-Ware System
            </span>
        </div>

    </div>

    <!-- CARD -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-pink-100">

        <!-- TITLE CARD -->
        <div class="bg-gradient-to-r from-pink-500 to-rose-500 
                    text-white px-6 py-4 font-semibold text-lg tracking-wide">
            Data Barang Keluar
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <!-- HEAD -->
                <thead class="bg-pink-50 text-gray-600 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="p-4 text-left">Barang</th>
                        <th class="p-4 text-center">Stok</th>
                        <th class="p-4 text-center">Input</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody>

                @forelse($barang as $b)

                    <tr class="border-b hover:bg-pink-50 transition duration-200">

                        <!-- BARANG -->
                        <td class="p-4">
                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-xl 
                                            bg-gradient-to-tr from-pink-100 to-rose-100 
                                            flex items-center justify-center shadow-inner">

                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                         class="w-6 h-6 text-pink-600"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                    </svg>

                                </div>

                                <div>
                                    <div class="font-semibold text-gray-800">
                                        {{ $b->nama_barang }}
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        ID: {{ $b->id }}
                                    </div>
                                </div>

                            </div>
                        </td>

                        <!-- STOK -->
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-bold tracking-wide
                                @if($b->stok <= 5)
                                    bg-red-100 text-red-600
                                @elseif($b->stok <= 15)
                                    bg-yellow-100 text-yellow-700
                                @else
                                    bg-pink-100 text-pink-600
                                @endif">
                                {{ $b->stok }} pcs
                            </span>
                        </td>

                        <!-- FORM INPUT -->
                        <td class="p-4 text-center">
                            <form method="POST" action="/barang-keluar" class="flex justify-center gap-2 items-center">
                                @csrf
                                <input type="hidden" name="barang_id" value="{{ $b->id }}">

                                <input 
                                    type="number"
                                    name="jumlah"
                                    class="w-20 px-2 py-1 border rounded-lg text-center 
                                    focus:ring-2 focus:ring-pink-400 focus:border-pink-400 outline-none"
                                    placeholder="-"
                                    required
                                >

                                <input 
                                    type="date"
                                    name="tanggal"
                                    class="px-2 py-1 border rounded-lg 
                                    focus:ring-2 focus:ring-pink-400 focus:border-pink-400 outline-none"
                                    required
                                >
                        </td>

                        <!-- BUTTON -->
                        <td class="p-4 text-center">
                                <button class="px-4 py-2 rounded-xl text-white text-sm font-semibold
                                               bg-gradient-to-r from-pink-500 to-rose-500
                                               hover:scale-105 hover:shadow-lg
                                               transition duration-200">
                                    - Keluar
                                </button>
                            </form>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="p-6 text-center text-gray-400">
                             Belum ada data barang
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection