<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - E-Ware</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-pink-50 font-[Inter]">

<div class="min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-5xl bg-white shadow-xl rounded-2xl overflow-hidden flex">

        <!-- LEFT SIDE -->
        <div class="hidden md:flex w-1/2 bg-gradient-to-br from-pink-500 to-purple-500 text-white p-10 flex-col justify-center">

            <h1 class="text-4xl font-extrabold mb-4">E-Ware</h1>

            <p class="mb-6 text-pink-100">
                Sistem manajemen stok gudang modern untuk membantu mengelola 
                barang masuk dan keluar dengan lebih mudah dan efisien.
            </p>

            <ul class="space-y-2 text-sm text-pink-100">
                <li> Monitoring stok real-time</li>
                <li> Laporan otomatis</li>
                <li> Multi user (Admin & Manager)</li>
            </ul>
        </div>

        <!-- RIGHT SIDE -->
        <div class="w-full md:w-1/2 p-10">

            <h2 class="text-3xl font-bold mb-2 text-gray-800">Login</h2>
            <p class="text-gray-500 mb-6">Masuk ke akun Anda</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm text-gray-700">Email</label>
                    <input type="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm text-gray-700">Password</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
                </div>

                <!-- Remember -->
                <div class="flex justify-between items-center mb-4 text-sm">
                    <label class="flex items-center gap-2 text-gray-600">
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>
                    <a href="#" class="text-pink-500 hover:underline">Lupa password?</a>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-pink-500 text-white py-2 rounded-lg hover:bg-pink-600 transition font-semibold">
                    Login
                </button>
            </form>

            <!-- Register -->
            <p class="text-center text-sm mt-4 text-gray-600">
                Belum punya akun?
                <a href="#" class="text-pink-500 hover:underline">Daftar disini</a>
            </p>

        </div>

    </div>

</div>

</body>
</html>