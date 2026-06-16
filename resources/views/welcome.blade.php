<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GudangKu - Sistem Manajemen Gudang</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-800">

    <!-- Navbar -->
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-3xl font-extrabold">
                GudangKu
            </h1>

            <div class="flex gap-3">

                <a href="{{ route('login') }}"
                   class="px-5 py-2 bg-slate-900 text-white rounded-xl hover:bg-slate-700 transition">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="px-5 py-2 border border-slate-300 rounded-xl hover:bg-slate-100 transition">
                    Register
                </a>

            </div>

        </div>
    </nav>

    <!-- Hero -->
    <section class="max-w-7xl mx-auto px-6 py-24">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <div>

                <span class="px-4 py-2 bg-slate-200 rounded-full text-sm font-semibold">
                    Sistem Manajemen Gudang Modern
                </span>

                <h1 class="text-6xl font-extrabold mt-6 leading-tight">
                    Kelola Stok Gudang
                    <span class="text-slate-500">
                        Lebih Mudah
                    </span>
                </h1>

                <p class="mt-6 text-lg text-slate-500">
                    GudangKu membantu perusahaan mengelola stok barang,
                    supplier, barang masuk, barang keluar,
                    laporan dan monitoring persediaan secara real-time.
                </p>

                <div class="flex gap-4 mt-10">

                    <a href="{{ route('login') }}"
                       class="px-8 py-4 bg-slate-900 text-white rounded-2xl font-bold hover:bg-slate-700 transition">
                        Mulai Sekarang
                    </a>

                    <a href="#fitur"
                       class="px-8 py-4 border border-slate-300 rounded-2xl font-bold hover:bg-slate-100 transition">
                        Lihat Fitur
                    </a>

                </div>

            </div>

            <div>

                <div class="bg-white p-8 rounded-3xl shadow-xl">

                    <h3 class="text-xl font-bold mb-6">
                        Ringkasan Sistem
                    </h3>

                    <div class="grid grid-cols-2 gap-4">

                        <div class="bg-slate-100 p-5 rounded-2xl">
                            <h4 class="font-bold">Barang</h4>
                            <p class="text-sm text-slate-500 mt-2">
                                Kelola seluruh data stok.
                            </p>
                        </div>

                        <div class="bg-slate-100 p-5 rounded-2xl">
                            <h4 class="font-bold">Supplier</h4>
                            <p class="text-sm text-slate-500 mt-2">
                                Data pemasok terintegrasi.
                            </p>
                        </div>

                        <div class="bg-slate-100 p-5 rounded-2xl">
                            <h4 class="font-bold">Barang Masuk</h4>
                            <p class="text-sm text-slate-500 mt-2">
                                Monitoring stok masuk.
                            </p>
                        </div>

                        <div class="bg-slate-100 p-5 rounded-2xl">
                            <h4 class="font-bold">Barang Keluar</h4>
                            <p class="text-sm text-slate-500 mt-2">
                                Monitoring stok keluar.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Fitur -->
    <section id="fitur" class="bg-white py-24">

        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-4xl font-extrabold text-center mb-16">
                Fitur Unggulan
            </h2>

            <div class="grid md:grid-cols-4 gap-6">

                <div class="bg-slate-50 p-6 rounded-3xl">
                    <h3 class="font-bold text-xl">
                        Dashboard
                    </h3>

                    <p class="text-slate-500 mt-3">
                        Statistik gudang secara real-time.
                    </p>
                </div>

                <div class="bg-slate-50 p-6 rounded-3xl">
                    <h3 class="font-bold text-xl">
                        Supplier
                    </h3>

                    <p class="text-slate-500 mt-3">
                        Kelola supplier dengan mudah.
                    </p>
                </div>

                <div class="bg-slate-50 p-6 rounded-3xl">
                    <h3 class="font-bold text-xl">
                        Laporan
                    </h3>

                    <p class="text-slate-500 mt-3">
                        Cetak laporan stok kapan saja.
                    </p>
                </div>

                <div class="bg-slate-50 p-6 rounded-3xl">
                    <h3 class="font-bold text-xl">
                        Multi Role
                    </h3>

                    <p class="text-slate-500 mt-3">
                        Admin & Manajer Read Only.
                    </p>
                </div>

            </div>

        </div>

    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-10">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="font-bold text-2xl">
                GudangKu
            </h2>

            <p class="text-slate-400 mt-2">
                aplikasi manajemen stok gudang
            </p>

            <p class="text-slate-500 mt-4 text-sm">
                © {{ date('Y') }} GudangKu. All Rights Reserved.
            </p>

        </div>

    </footer>

</body>
</html>