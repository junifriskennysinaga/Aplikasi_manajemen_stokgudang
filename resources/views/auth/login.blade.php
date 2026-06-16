<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - Gudangku</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-[Inter]">

<div class="min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-5xl bg-white rounded-2xl shadow-lg overflow-hidden grid md:grid-cols-2">

        <!-- LEFT SIDE (INFO) -->
        <div class="hidden md:flex flex-col justify-center bg-gray-900 text-white p-12">

            <h1 class="text-4xl font-bold">Gudangku</h1>

            <p class="text-gray-300 mt-4 leading-relaxed">
                Sistem manajemen gudang untuk mengelola stok barang,
                supplier, barang masuk, dan barang keluar secara efisien.
            </p>

            <div class="mt-10 space-y-4 text-gray-300 text-sm">

                <p>✔ Manajemen stok barang</p>
                <p>✔ Data supplier terstruktur</p>
                <p>✔ Barang masuk & keluar</p>
                <p>✔ Laporan otomatis</p>

            </div>

        </div>

        <!-- RIGHT SIDE (FORM) -->
        <div class="p-10 md:p-14 flex items-center">

            <div class="w-full">

                <h2 class="text-3xl font-bold text-gray-800">Login</h2>
                <p class="text-gray-500 mt-1">Masuk ke akun Anda</p>

                <!-- ERROR -->
                @if ($errors->any())
                    <div class="bg-red-100 text-red-600 px-4 py-3 rounded-lg mt-6">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- FORM -->
                <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-5">

                    @csrf

                    <!-- EMAIL -->
                    <div>
                        <label class="text-sm text-gray-600">Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full mt-1 px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                            placeholder="Masukkan email"
                        >
                    </div>

                    <!-- PASSWORD -->
                    <div>
                        <label class="text-sm text-gray-600">Password</label>
                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full mt-1 px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"
                            placeholder="Masukkan password"
                        >
                    </div>

                    <!-- REMEMBER -->
                    <div class="flex items-center justify-between text-sm">

                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="checkbox" name="remember">
                            Remember me
                        </label>

                        <a href="#" class="text-gray-500 hover:text-gray-700">
                            Lupa password?
                        </a>

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="w-full bg-gray-900 hover:bg-gray-800 text-white font-semibold py-3 rounded-lg transition"
                    >
                        Login
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>