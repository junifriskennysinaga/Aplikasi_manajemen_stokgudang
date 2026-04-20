@extends('layouts.app')

@section('content')

<div class="p-6 bg-pink-50 min-h-screen space-y-6">

    <!-- HEADER -->
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Data Kategori</h2>
        <p class="text-gray-500">Kelola kategori barang gudang</p>
    </div>

    <!-- FORM TAMBAH -->
    <div class="bg-white p-5 rounded-xl shadow-md border">

        <form method="POST" action="/kategori" class="flex flex-col md:flex-row gap-3 items-center">
            @csrf

            <div class="relative w-full">

                <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-pink-400">
                </div>

                <input 
                    name="nama_kategori" 
                    placeholder="Masukkan nama kategori..."
                    class="w-full pl-10 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-400 focus:outline-none"
                >

            </div>

            <button 
                class="bg-pink-500 text-white px-6 py-2 rounded-lg hover:bg-pink-600 shadow transition w-full md:w-auto">
                Tambah
            </button>

        </form>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow-md border overflow-hidden">

        <div class="bg-pink-500 text-white px-4 py-3 font-semibold">
            Daftar Kategori
        </div>

        <table class="w-full text-sm text-left text-gray-600">

            <thead class="bg-pink-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Kategori</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($kategori as $i => $k)

                <tr class="border-t hover:bg-pink-50 transition">

                    <td class="px-6 py-3 font-medium">
                        {{ $i + 1 }}
                    </td>

                    <td class="px-6 py-3 font-semibold text-gray-800">
                        {{ $k->nama_kategori }}
                    </td>

                    <td class="px-6 py-3">

                        <div class="flex justify-center gap-2">

                            <!-- EDIT -->
                            <button 
                                data-modal-target="editModal{{ $k->id }}" 
                                data-modal-toggle="editModal{{ $k->id }}"
                                class="flex items-center gap-1 bg-pink-100 text-pink-600 px-3 py-1.5 rounded-lg hover:bg-pink-200 text-xs transition">

                                 Edit
                            </button>

                            <!-- DELETE -->
                            <form method="POST" action="/kategori/{{ $k->id }}"
                                  onsubmit="return confirm('Yakin mau hapus kategori ini?')">
                                @csrf
                                @method('DELETE')

                                <button 
                                    class="flex items-center gap-1 bg-gray-100 text-gray-600 px-3 py-1.5 rounded-lg hover:bg-red-100 hover:text-red-500 text-xs transition">

                                     Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                <!-- MODAL EDIT -->
                <div id="editModal{{ $k->id }}" tabindex="-1"
                     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">

                    <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-md">

                        <h3 class="text-lg font-semibold mb-4 text-gray-800">
                            Edit Kategori
                        </h3>

                        <form method="POST" action="/kategori/{{ $k->id }}">
                            @csrf
                            @method('PUT')

                            <input 
                                type="text"
                                name="nama_kategori"
                                value="{{ $k->nama_kategori }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4 focus:ring-2 focus:ring-pink-400"
                            >

                            <div class="flex justify-end gap-2">

                                <button type="button"
                                    data-modal-hide="editModal{{ $k->id }}"
                                    class="px-4 py-2 border rounded-lg hover:bg-gray-100">
                                    Batal
                                </button>

                                <button class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">
                                    Update
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

                @empty

                <tr>
                    <td colspan="3" class="text-center py-6 text-gray-400">
                        Belum ada data kategori
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection