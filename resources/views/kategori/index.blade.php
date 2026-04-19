@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen space-y-6">

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

                <!-- ICON -->
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4" />
                    </svg>
                </div>

                <input 
                    name="nama_kategori" 
                    placeholder="Masukkan nama kategori..."
                    class="w-full pl-10 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >

            </div>

            <button 
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 shadow transition w-full md:w-auto">
                + Tambah
            </button>

        </form>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow-md border overflow-hidden">

        <!-- HEADER TABLE -->
        <div class="bg-gray-800 text-white px-4 py-3 font-semibold">
            Daftar Kategori
        </div>

        <table class="w-full text-sm text-left text-gray-600">

            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Kategori</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($kategori as $i => $k)

                <tr class="border-t hover:bg-gray-50 transition">

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
                                class="flex items-center gap-1 bg-yellow-400 text-white px-3 py-1.5 rounded-lg hover:bg-yellow-500 text-xs">

                                ✏ Edit
                            </button>

                            <!-- DELETE -->
                            <form method="POST" action="/kategori/{{ $k->id }}"
                                  onsubmit="return confirm('Yakin mau hapus kategori ini?')">
                                @csrf
                                @method('DELETE')

                                <button 
                                    class="flex items-center gap-1 bg-red-500 text-white px-3 py-1.5 rounded-lg hover:bg-red-600 text-xs">

                                    🗑 Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                <!-- MODAL EDIT (FLOWBITE STYLE) -->
                <div id="editModal{{ $k->id }}" tabindex="-1"
                     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

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
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4 focus:ring-2 focus:ring-blue-500"
                            >

                            <div class="flex justify-end gap-2">

                                <button type="button"
                                    data-modal-hide="editModal{{ $k->id }}"
                                    class="px-4 py-2 border rounded-lg hover:bg-gray-100">
                                    Batal
                                </button>

                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
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