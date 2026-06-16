@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-slate-800">
            Dashboard GudangKu
        </h1>

        <p class="text-slate-500">
            Monitoring stok gudang secara realtime
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-5">

        <div class="bg-white p-5 rounded-3xl shadow border">
            <p class="text-gray-500">Total Barang</p>
            <h2 class="text-4xl font-bold mt-2">
                {{ $totalBahan }}
            </h2>
        </div>

        <div class="bg-white p-5 rounded-3xl shadow border">
            <p class="text-gray-500">Barang Masuk</p>
            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                {{ $totalMasuk }}
            </h2>
        </div>

        <div class="bg-white p-5 rounded-3xl shadow border">
            <p class="text-gray-500">Barang Keluar</p>
            <h2 class="text-4xl font-bold text-orange-500 mt-2">
                {{ $totalKeluar }}
            </h2>
        </div>

        <div class="bg-white p-5 rounded-3xl shadow border">
            <p class="text-gray-500">Stok Menipis</p>
            <h2 class="text-4xl font-bold text-red-500 mt-2">
                {{ $stokMenipis }}
            </h2>
        </div>

    </div>

    <div class="bg-white p-6 rounded-3xl shadow border">

        <h3 class="font-bold text-lg mb-4">
            Distribusi Stok Barang
        </h3>

        <div style="height:400px">
            <canvas id="stokChart"></canvas>
        </div>

    </div>

    <div class="grid md:grid-cols-2 gap-6">

        <div class="bg-white p-6 rounded-3xl shadow border">

            <h3 class="font-bold mb-4 text-red-600">
                ⚠️ Peringatan Stok Rendah
            </h3>

            @forelse($alertBahan as $item)

                <div class="flex justify-between items-center py-3 border-b">

                    <span>
                        {{ $item->nama_barang }}
                    </span>

                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-lg font-bold">
                        {{ $item->stok }}
                    </span>

                </div>

            @empty

                <p class="text-green-600">
                    Semua stok aman
                </p>

            @endforelse

        </div>

        <div class="bg-white p-6 rounded-3xl shadow border">

            <h3 class="font-bold mb-4">
                Aktivitas Terbaru
            </h3>

            @foreach($aktivitas as $item)

                <div class="border-b py-3">

                    <p class="font-semibold">
                        {{ $item }}
                    </p>

                </div>

            @endforeach

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('stokChart');

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: @json($chartLabel),
        datasets: [{
            data: @json($chartData),
            backgroundColor: [
                '#3B82F6',
                '#10B981',
                '#F59E0B',
                '#EF4444',
                '#8B5CF6',
                '#06B6D4',
                '#84CC16',
                '#F97316',
                '#EC4899',
                '#14B8A6'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});

</script>

@endsection