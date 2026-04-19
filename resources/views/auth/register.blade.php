<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - E-Ware</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-5xl bg-white shadow-lg rounded-xl overflow-hidden flex">

        <!-- LEFT -->
        <div class="hidden md:flex w-1/2 bg-blue-600 text-white p-10 flex-col justify-center">
            <h1 class="text-3xl font-bold mb-4">E-Ware</h1>
            <p class="mb-6">
                Buat akun untuk mulai mengelola stok barang dengan sistem yang modern dan efisien.
            </p>

            <ul class="space-y-2 text-sm">
                <li> Monitoring stok real-time</li>
                <li> Laporan otomatis</li>
                <li> Multi user (Admin & Manager)</li>
            </ul>
        </div>

        <!-- RIGHT -->
        <div class="w-full md:w-1/2 p-10">
            <h2 class="text-2xl font-semibold mb-2">Register</h2>
            <p class="text-gray-500 mb-6">Buat akun baru</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1 text-sm">Nama</label>
                    <input type="text" name="name"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm">Email</label>
                    <input type="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm">Password</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                    Register
                </button>
            </form>

            <p class="text-center text-sm mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-500">Login disini</a>
            </p>
        </div>

    </div>
</div>

</body>
</html>
