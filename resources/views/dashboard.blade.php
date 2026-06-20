@extends('layouts.app')
@section('title', 'Dashboard - GudangKu')

@section('content')

<div class="space-y-7">

    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3">
        <div>
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">
                Dashboard
            </h1>
            <p class="text-slate-400 text-sm mt-1 font-medium">
                Monitoring stok gudang secara realtime
            </p>
        </div>
        <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-full bg-white border border-slate-200 text-xs font-semibold text-slate-500">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            {{ now()->translatedFormat('d F Y') }}
        </div>
    </div>

    <!-- STAT CARDS -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
            <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center mb-4">
                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <p class="text-slate-400 text-xs font-semibold uppercase tracking-wide">Total Barang</p>
            <h2 class="text-3xl font-extrabold text-slate-900 mt-1">{{ $totalBahan }}</h2>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center mb-4">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0-16l-5 5m5-5l5 5"/></svg>
            </div>
            <p class="text-slate-400 text-xs font-semibold uppercase tracking-wide">Barang Masuk</p>
            <h2 class="text-3xl font-extrabold text-blue-600 mt-1">{{ $totalMasuk }}</h2>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
            <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center mb-4">
                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20V4m0 16l-5-5m5 5l5-5"/></svg>
            </div>
            <p class="text-slate-400 text-xs font-semibold uppercase tracking-wide">Barang Keluar</p>
            <h2 class="text-3xl font-extrabold text-amber-600 mt-1">{{ $totalKeluar }}</h2>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
            <div class="w-10 h-10 rounded-xl bg-rose-50 flex items-center justify-center mb-4">
                <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
            </div>
            <p class="text-slate-400 text-xs font-semibold uppercase tracking-wide">Stok Menipis</p>
            <h2 class="text-3xl font-extrabold text-rose-600 mt-1">{{ $stokMenipis }}</h2>
        </div>

    </div>

    <!-- CHART -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200/80">
        <h3 class="font-bold text-slate-900 mb-1">Distribusi Stok Barang</h3>
        <p class="text-slate-400 text-xs font-medium mb-5">Proporsi stok untuk setiap jenis barang</p>
        <div style="height:340px">
            <canvas id="stokChart"></canvas>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-5">

        <div class="bg-white p-6 rounded-2xl border border-slate-200/80">
            <div class="flex items-center gap-2 mb-5">
                <div class="w-8 h-8 rounded-lg bg-rose-50 flex items-center justify-center">
                    <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                </div>
                <h3 class="font-bold text-slate-900">Peringatan Stok Rendah</h3>
            </div>

            @forelse($alertBahan as $item)
                <div class="flex justify-between items-center py-3 border-b border-slate-100 last:border-0">
                    <span class="text-sm font-medium text-slate-700">{{ $item->nama_barang }}</span>
                    <span class="bg-rose-50 text-rose-600 px-2.5 py-1 rounded-lg text-xs font-bold">{{ $item->stok }}</span>
                </div>
            @empty
                <div class="flex items-center gap-2 text-emerald-600 text-sm font-semibold py-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Semua stok aman
                </div>
            @endforelse
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200/80">
            <div class="flex items-center gap-2 mb-5">
                <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center">
                    <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-bold text-slate-900">Aktivitas Terbaru</h3>
            </div>

            @forelse($aktivitas as $item)
                <div class="py-3 border-b border-slate-100 last:border-0">
                    <p class="text-sm font-medium text-slate-700">{{ $item }}</p>
                </div>
            @empty
                <p class="text-sm text-slate-400">Belum ada aktivitas</p>
            @endforelse
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('stokChart');

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: @json($chartLabel),
        datasets: [{
            data: @json($chartData),
            backgroundColor: ['#0f766e','#14b8a6','#5eead4','#f59e0b','#fb923c','#f43f5e','#6366f1','#8b5cf6','#06b6d4','#84cc16'],
            borderWidth: 0,
            hoverOffset: 6
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '65%',
        plugins: {
            legend: {
                position: 'bottom',
                labels: { padding: 16, usePointStyle: true, pointStyle: 'circle', font: { family: 'Plus Jakarta Sans', size: 12 } }
            }
        }
    }
});
</script>

@endsection
