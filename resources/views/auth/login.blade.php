<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - E-Ware</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-5xl bg-white shadow-lg rounded-xl overflow-hidden flex">

        <!-- LEFT SIDE -->
        <div class="hidden md:flex w-1/2 bg-blue-600 text-white p-10 flex-col justify-center">
            <h1 class="text-3xl font-bold mb-4">E-Ware</h1>
            <p class="mb-6">
                Sistem Manajemen Stok Gudang modern untuk membantu mengelola 
                barang masuk dan keluar dengan mudah.
            </p>

            <ul class="space-y-2 text-sm">
                <li> Monitoring stok real-time</li>
                <li> Laporan otomatis</li>
                <li> Multi user (Admin & Manager)</li>
            </ul>
        </div>

        <!-- RIGHT SIDE (LOGIN FORM) -->
        <div class="w-full md:w-1/2 p-10">
            <h2 class="text-2xl font-semibold mb-2">Login</h2>
            <p class="text-gray-500 mb-6">Masuk ke akun Anda</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm">Email</label>
                    <input type="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block mb-1 text-sm">Password</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Remember & Forgot -->
                <div class="flex justify-between items-center mb-4 text-sm">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>
                    <a href="#" class="text-blue-500 hover:underline">Lupa password?</a>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Login
                </button>
            </form>

            <!-- Register -->
            <p class="text-center text-sm mt-4">
                Belum punya akun?
                <a href="#" class="text-blue-500 hover:underline">Daftar disini</a>
            </p>
        </div>

    </div>
</div>

</body>
</html>
