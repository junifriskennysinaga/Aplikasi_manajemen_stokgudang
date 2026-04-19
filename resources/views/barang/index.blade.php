@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen space-y-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center">

        <div>
            <h2 class="text-2xl font-bold text-gray-800">Data Barang</h2>
            <p class="text-gray-500">Kelola data barang gudang</p>
        </div>

        <a href="/barang/create"
           class="flex items-center gap-2 bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition">

            <!-- ICON PLUS -->
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4" />
            </svg>

            Tambah Barang
        </a>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow-md border overflow-hidden">

        <div class="bg-gray-800 text-white px-4 py-3 font-semibold">
            Data Barang Gudang
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Nama Barang</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3 text-center">Stok</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($barang as $b)

                    <tr class="border-b hover:bg-gray-50 transition">

                        <!-- NAMA -->
                        <td class="px-6 py-4 font-semibold text-gray-800">
                            {{ $b->nama_barang }}
                        </td>

                        <!-- KATEGORI -->
                        <td class="px-6 py-4 text-gray-600">
                            {{ $b->kategori->nama_kategori ?? '-' }}
                        </td>

                        <!-- STOK -->
                        <td class="px-6 py-4 text-center">

                            <span class="inline-flex px-3 py-1 rounded-full text-sm font-semibold
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

                        <!-- AKSI -->
                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <!-- ✏ EDIT BUTTON (FIX & JELAS) -->
                                <a href="/barang/{{ $b->id }}/edit"
                                   class="flex items-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1.5 rounded-lg text-xs shadow transition">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-4 h-4"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-5-8l5 5M15 3l5 5" />
                                    </svg>

                                    Edit
                                </a>

                                <!-- 🗑 DELETE -->
                                <form action="/barang/{{ $b->id }}" method="POST"
                                      onsubmit="return confirm('Hapus barang ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs shadow transition">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M6 18L18 6M6 6l12 12" />
                                        </svg>

                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center py-8 text-gray-400">
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