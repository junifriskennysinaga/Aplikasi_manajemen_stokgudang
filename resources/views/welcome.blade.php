<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Ware | Sistem Manajemen Gudang</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FONT INTER -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-pink-50 text-gray-800 font-[Inter]">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-8 py-5 bg-white shadow-sm">
    
    <h1 class="text-xl font-bold flex items-center gap-2">
        <i data-lucide="box"></i>
        <span class="bg-gradient-to-r from-pink-500 to-purple-500 text-transparent bg-clip-text">
            E-Ware
        </span>
    </h1>

    <div class="space-x-3">
        <a href="/login" class="px-4 py-2 text-sm bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition">
            Login
        </a>
        <a href="/register" class="px-4 py-2 text-sm border border-pink-500 text-pink-500 rounded-lg hover:bg-pink-50 transition">
            Register
        </a>
    </div>
</nav>

<!-- HERO -->
<section class="text-center px-6 py-24 relative overflow-hidden">

    <!-- BACKGROUND SOFT -->
    <div class="absolute w-[400px] h-[400px] bg-pink-200/40 blur-[100px] rounded-full top-[-100px] left-[-100px]"></div>
    <div class="absolute w-[300px] h-[300px] bg-purple-200/40 blur-[100px] rounded-full bottom-[-100px] right-[-100px]"></div>

    <div class="relative z-10 max-w-3xl mx-auto">

        <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
            Sistem Manajemen Gudang
            <br>
            <span class="bg-gradient-to-r from-pink-500 to-purple-500 text-transparent bg-clip-text">
                Lebih Modern & Terorganisir
            </span>
        </h1>

        <p class="text-gray-600 text-lg leading-relaxed">
            Kelola stok barang, pantau transaksi masuk dan keluar, serta akses laporan 
            dengan sistem yang dirancang untuk efisiensi kerja.
        </p>

    </div>

</section>

<!-- FITUR -->
<section class="py-20 px-6 max-w-6xl mx-auto">

    <h2 class="text-3xl font-bold text-center mb-16 text-gray-800">
        Fitur Utama Sistem
    </h2>

    <div class="grid md:grid-cols-3 gap-8">

        <div class="bg-white border p-6 rounded-2xl shadow-sm hover:shadow-md transition">
            <i data-lucide="package" class="mb-4 text-pink-500"></i>
            <h3 class="text-lg font-semibold mb-2">Manajemen Barang</h3>
            <p class="text-gray-500 text-sm">Pengelolaan data barang secara terstruktur dan efisien.</p>
        </div>

        <div class="bg-white border p-6 rounded-2xl shadow-sm hover:shadow-md transition">
            <i data-lucide="arrow-down" class="mb-4 text-green-500"></i>
            <h3 class="text-lg font-semibold mb-2">Barang Masuk</h3>
            <p class="text-gray-500 text-sm">Pencatatan barang masuk dengan sistem yang akurat.</p>
        </div>

        <div class="bg-white border p-6 rounded-2xl shadow-sm hover:shadow-md transition">
            <i data-lucide="arrow-up" class="mb-4 text-red-500"></i>
            <h3 class="text-lg font-semibold mb-2">Barang Keluar</h3>
            <p class="text-gray-500 text-sm">Kontrol penuh terhadap distribusi barang keluar.</p>
        </div>

    </div>

</section>

<!-- CTA -->
<section class="text-center py-16">

    <h2 class="text-2xl font-bold mb-3 text-gray-800">
        Sistem Siap Digunakan
    </h2>

    <p class="text-gray-500">
        Silakan login atau register melalui menu di atas untuk mulai menggunakan sistem.
    </p>

</section>

<!-- FOOTER -->
<footer class="text-center text-sm text-gray-500 py-6">
    © {{ date('Y') }} E-Ware • Aplikasi Manajemen Stok Gudang
</footer>

<script>
    lucide.createIcons();
</script>

</body>
</html>