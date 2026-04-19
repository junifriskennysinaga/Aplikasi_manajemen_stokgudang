<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Ware | Sistem Manajemen Gudang</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <!-- Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-white border-b shadow-sm px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-700 flex items-center gap-2">
        <i data-lucide="box"></i>
        E-Ware
    </h1>

    <div class="space-x-2">
        <a href="/login"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Login
        </a>
        <a href="/register"
           class="border border-blue-600 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 transition">
            Register
        </a>
    </div>
</nav>

<!-- HERO -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white text-center py-24 px-6">

    <h1 class="text-4xl md:text-5xl font-bold mb-4">
        Selamat Datang di E-Ware
    </h1>

    <p class="max-w-2xl mx-auto text-lg text-blue-100 mb-6">
        Sistem manajemen stok gudang modern untuk membantu Anda mengelola barang masuk, 
        barang keluar, dan laporan dengan mudah, cepat, dan efisien.
    </p>

    <a href="/login"
       class="bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">
        Mulai Sekarang
    </a>

</section>

<!-- FITUR -->
<section class="max-w-6xl mx-auto px-6 py-16">

    <h2 class="text-2xl font-semibold text-center mb-10 text-gray-800">
        Fitur Utama E-Ware
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        <!-- Manajemen Barang -->
        <div class="bg-white p-6 rounded-xl shadow-sm border text-center hover:shadow-md transition">
            <div class="mx-auto w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl mb-4">
                <i data-lucide="package"></i>
            </div>
            <h3 class="font-semibold text-gray-800 mb-2">Manajemen Barang</h3>
            <p class="text-sm text-gray-500">
                Kelola data barang secara terstruktur dan mudah dipantau.
            </p>
        </div>

        <!-- Barang Masuk -->
        <div class="bg-white p-6 rounded-xl shadow-sm border text-center hover:shadow-md transition">
            <div class="mx-auto w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-xl mb-4">
                <i data-lucide="arrow-down"></i>
            </div>
            <h3 class="font-semibold text-gray-800 mb-2">Barang Masuk</h3>
            <p class="text-sm text-gray-500">
                Catat setiap barang yang masuk ke gudang dengan akurat.
            </p>
        </div>

        <!-- Barang Keluar -->
        <div class="bg-white p-6 rounded-xl shadow-sm border text-center hover:shadow-md transition">
            <div class="mx-auto w-12 h-12 flex items-center justify-center bg-red-100 text-red-600 rounded-xl mb-4">
                <i data-lucide="arrow-up"></i>
            </div>
            <h3 class="font-semibold text-gray-800 mb-2">Barang Keluar</h3>
            <p class="text-sm text-gray-500">
                Pantau dan kontrol barang keluar dengan sistem yang rapi.
            </p>
        </div>

    </div>

</section>

<!-- FITUR TAMBAHAN -->
<section class="max-w-6xl mx-auto px-6 pb-16">

    <div class="grid md:grid-cols-2 gap-6">

        <!-- Laporan -->
        <div class="bg-white p-6 rounded-xl border shadow-sm text-center">
            <div class="mx-auto w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl mb-4">
                <i data-lucide="bar-chart-3"></i>
            </div>
            <h3 class="font-semibold text-gray-800 mb-2">Laporan Otomatis</h3>
            <p class="text-sm text-gray-500">
                Menampilkan laporan barang masuk dan keluar secara real-time.
            </p>
        </div>

        <!-- Role -->
        <div class="bg-white p-6 rounded-xl border shadow-sm text-center">
            <div class="mx-auto w-12 h-12 flex items-center justify-center bg-purple-100 text-purple-600 rounded-xl mb-4">
                <i data-lucide="users"></i>
            </div>
            <h3 class="font-semibold text-gray-800 mb-2">Multi Role User</h3>
            <p class="text-sm text-gray-500">
                Admin dan Manajer memiliki akses yang berbeda sesuai kebutuhan.
            </p>
        </div>

    </div>

</section>

<!-- CTA -->
<section class="bg-blue-700 text-white text-center py-12">

    <h2 class="text-2xl font-bold mb-3">
        Siap Mengelola Gudang Lebih Mudah?
    </h2>

    <a href="/register"
       class="bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200">
        Daftar Sekarang
    </a>

</section>

<!-- FOOTER -->
<footer class="text-center text-sm text-gray-500 py-6">
    © {{ date('Y') }} E-Ware • Sistem Manajemen Stok Gudang
</footer>

<script>
    lucide.createIcons();
</script>

</body>
</html>