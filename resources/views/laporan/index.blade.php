@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-pink-50 via-rose-50 to-fuchsia-50 p-6">

    <!-- HEADER -->
    <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-r from-pink-500 via-fuchsia-500 to-rose-500 p-8 shadow-[0_20px_60px_rgba(236,72,153,0.25)] mb-8">

        <!-- BLUR -->
        <div class="absolute -top-20 -right-20 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>

                <p class="uppercase tracking-[5px] text-pink-100 text-xs font-bold animate-pulse">
                    E-Ware Monitoring System
                </p>

                <h1 class="text-4xl md:text-5xl font-black text-white mt-3 leading-tight animate-bounce">
                    Laporan Stok Gudang
                </h1>

                <p class="text-pink-100 mt-4 text-sm md:text-base max-w-2xl leading-relaxed">
                    Monitoring barang masuk dan keluar secara real-time dengan tampilan modern dan profesional.
                </p>

            </div>

            <!-- INFO CARD -->
            <div class="bg-white/15 backdrop-blur-xl border border-white/20 rounded-[30px] p-6 min-w-[280px]">

                <p class="text-pink-100 text-sm">
                    Total Aktivitas
                </p>

                <h2 class="text-white text-5xl font-black mt-2">
                    {{ $barangMasuk->count() + $barangKeluar->count() }}
                </h2>

                <div class="mt-4 flex items-center gap-2">

                    <span class="bg-white/20 px-4 py-2 rounded-full text-xs font-bold text-white">
                        LIVE REPORT
                    </span>

                    <span class="w-3 h-3 rounded-full bg-green-300 animate-ping"></span>

                </div>

            </div>

        </div>

    </div>

    <!-- FILTER -->
    <div class="bg-white rounded-[30px] p-6 border border-pink-100 shadow-[0_10px_40px_rgba(236,72,153,0.08)] mb-8">

        <div class="flex items-center gap-3 mb-5">

            <div class="w-12 h-12 rounded-2xl bg-pink-100 flex items-center justify-center">
                📅
            </div>

            <div>

                <h2 class="text-2xl font-black text-gray-800">
                    Filter Laporan
                </h2>

                <p class="text-gray-400 text-sm">
                    Pilih tanggal untuk melihat laporan tertentu
                </p>

            </div>

        </div>

        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-5 items-end">

            <div>

                <label class="text-sm font-bold text-gray-700 mb-2 block">
                    Dari Tanggal
                </label>

                <input type="date"
                       name="dari"
                       value="{{ $dari }}"
                       class="w-full rounded-2xl border border-pink-200 bg-pink-50 px-4 py-3 focus:outline-none focus:ring-4 focus:ring-pink-200 transition">

            </div>

            <div>

                <label class="text-sm font-bold text-gray-700 mb-2 block">
                    Sampai Tanggal
                </label>

                <input type="date"
                       name="sampai"
                       value="{{ $sampai }}"
                       class="w-full rounded-2xl border border-pink-200 bg-pink-50 px-4 py-3 focus:outline-none focus:ring-4 focus:ring-pink-200 transition">

            </div>

            <button class="h-[52px] rounded-2xl bg-gradient-to-r from-pink-500 to-fuchsia-500 text-white font-bold shadow-lg hover:scale-105 transition duration-300">
                Tampilkan Laporan
            </button>

        </form>

    </div>

    <!-- SUMMARY -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <!-- BARANG MASUK -->
        <div class="relative overflow-hidden rounded-[30px] bg-gradient-to-r from-pink-500 to-fuchsia-500 p-7 text-white shadow-[0_20px_50px_rgba(236,72,153,0.2)] hover:scale-[1.02] transition duration-300">

            <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full"></div>

            <div class="relative z-10 flex justify-between items-center">

                <div>

                    <p class="uppercase tracking-[4px] text-pink-100 text-xs font-bold">
                        Total Barang Masuk
                    </p>

                    <h2 class="text-5xl font-black mt-4 animate-pulse">
                        {{ $totalMasuk }}
                    </h2>

                    <p class="mt-3 text-pink-100 text-sm">
                        Barang diterima gudang
                    </p>

                </div>

                <div class="w-20 h-20 rounded-[25px] bg-white/20 backdrop-blur flex items-center justify-center text-4xl floating">
                    📦
                </div>

            </div>

        </div>

        <!-- BARANG KELUAR -->
        <div class="relative overflow-hidden rounded-[30px] bg-gradient-to-r from-rose-400 to-pink-500 p-7 text-white shadow-[0_20px_50px_rgba(244,63,94,0.2)] hover:scale-[1.02] transition duration-300">

            <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full"></div>

            <div class="relative z-10 flex justify-between items-center">

                <div>

                    <p class="uppercase tracking-[4px] text-pink-100 text-xs font-bold">
                        Total Barang Keluar
                    </p>

                    <h2 class="text-5xl font-black mt-4 animate-pulse">
                        {{ $totalKeluar }}
                    </h2>

                    <p class="mt-3 text-pink-100 text-sm">
                        Barang keluar gudang
                    </p>

                </div>

                <div class="w-20 h-20 rounded-[25px] bg-white/20 backdrop-blur flex items-center justify-center text-4xl floating">
                    🚚
                </div>

            </div>

        </div>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-[35px] border border-pink-100 overflow-hidden shadow-[0_15px_50px_rgba(0,0,0,0.05)]">

        <!-- HEADER TABLE -->
        <div class="bg-gradient-to-r from-pink-500 via-fuchsia-500 to-rose-500 px-7 py-5 flex items-center justify-between">

            <div>

                <h2 class="text-2xl font-black text-white">
                    Detail Aktivitas Gudang
                </h2>

                <p class="text-pink-100 text-sm mt-1">
                    Riwayat transaksi barang masuk dan keluar
                </p>

            </div>

            <div class="bg-white/20 px-4 py-2 rounded-full text-white text-xs font-bold animate-pulse">
                REALTIME DATA
            </div>

        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-pink-50 text-gray-700">

                        <th class="px-6 py-5 text-left text-xs uppercase tracking-[3px] font-black">
                            Tanggal
                        </th>

                        <th class="px-6 py-5 text-left text-xs uppercase tracking-[3px] font-black">
                            Nama Barang
                        </th>

                        <th class="px-6 py-5 text-center text-xs uppercase tracking-[3px] font-black">
                            Barang Masuk
                        </th>

                        <th class="px-6 py-5 text-center text-xs uppercase tracking-[3px] font-black">
                            Barang Keluar
                        </th>

                        <th class="px-6 py-5 text-center text-xs uppercase tracking-[3px] font-black">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($barangMasuk as $m)

                    <tr class="border-b border-pink-50 hover:bg-pink-50/60 transition duration-300">

                        <td class="px-6 py-5 text-gray-500 font-medium">
                            {{ $m->tanggal }}
                        </td>

                        <td class="px-6 py-5">

                            <div class="flex items-center gap-3">

                                <div class="w-12 h-12 rounded-2xl bg-pink-100 flex items-center justify-center">
                                    📦
                                </div>

                                <div>

                                    <h3 class="font-bold text-gray-800">
                                        {{ $m->barang->nama_barang ?? '-' }}
                                    </h3>

                                    <p class="text-xs text-gray-400">
                                        Barang Masuk Gudang
                                    </p>

                                </div>

                            </div>

                        </td>

                        <td class="px-6 py-5 text-center">

                            <span class="bg-pink-100 text-pink-700 font-bold px-5 py-2 rounded-full text-sm shadow-sm">
                                +{{ $m->jumlah }}
                            </span>

                        </td>

                        <td class="px-6 py-5 text-center text-gray-300">
                            —
                        </td>

                        <td class="px-6 py-5 text-center">

                            <span class="bg-emerald-100 text-emerald-600 text-xs font-bold px-4 py-2 rounded-full animate-pulse">
                                Masuk
                            </span>

                        </td>

                    </tr>

                    @empty
                    @endforelse

                    @forelse($barangKeluar as $k)

                    <tr class="border-b border-pink-50 hover:bg-pink-50/60 transition duration-300">

                        <td class="px-6 py-5 text-gray-500 font-medium">
                            {{ $k->tanggal }}
                        </td>

                        <td class="px-6 py-5">

                            <div class="flex items-center gap-3">

                                <div class="w-12 h-12 rounded-2xl bg-rose-100 flex items-center justify-center">
                                    🚚
                                </div>

                                <div>

                                    <h3 class="font-bold text-gray-800">
                                        {{ $k->barang->nama_barang ?? '-' }}
                                    </h3>

                                    <p class="text-xs text-gray-400">
                                        Barang Keluar Gudang
                                    </p>

                                </div>

                            </div>

                        </td>

                        <td class="px-6 py-5 text-center text-gray-300">
                            —
                        </td>

                        <td class="px-6 py-5 text-center">

                            <span class="bg-rose-100 text-rose-600 font-bold px-5 py-2 rounded-full text-sm shadow-sm">
                                -{{ $k->jumlah }}
                            </span>

                        </td>

                        <td class="px-6 py-5 text-center">

                            <span class="bg-rose-100 text-rose-600 text-xs font-bold px-4 py-2 rounded-full animate-pulse">
                                Keluar
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

<style>

    .floating{
        animation: floating 3s ease-in-out infinite;
    }

    @keyframes floating{
        0%{
            transform:translateY(0px);
        }
        50%{
            transform:translateY(-8px);
        }
        100%{
            transform:translateY(0px);
        }
    }

</style>

@endsection