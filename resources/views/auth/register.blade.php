<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><title>e-Ware — Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-950 text-slate-100 font-sans flex items-center justify-center min-h-screen p-4 relative overflow-hidden">
    <div class="bg-slate-900/60 border border-slate-800 p-10 rounded-3xl max-w-md w-full shadow-2xl space-y-6 backdrop-blur-xl relative z-10">
        <div class="text-center">
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Buat Otoritas</h1>
            <p class="text-slate-500 text-xs mt-1">Daftarkan operator gudang e-Ware baru</p>
        </div>
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1">Nama Lengkap</label>
                <input type="text" name="name" class="w-full bg-slate-950/50 border border-slate-800 px-4 py-2.5 rounded-xl text-white focus:border-white focus:outline-none text-sm" required>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1">Email Karyawan</label>
                <input type="email" name="email" class="w-full bg-slate-950/50 border border-slate-800 px-4 py-2.5 rounded-xl text-white focus:border-white focus:outline-none text-sm" required>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-wider mb-1">Kata Sandi Baru</label>
                <input type="password" name="password" class="w-full bg-slate-950/50 border border-slate-800 px-4 py-2.5 rounded-xl text-white focus:border-white focus:outline-none text-sm" placeholder="Minimal 5 Karakter" required>
            </div>
            <button type="submit" class="w-full py-3 bg-white text-slate-950 rounded-xl font-bold transition-all duration-300 text-sm mt-2 shadow-lg shadow-white/5">
                Konfirmasi Registrasi
            </button>
        </form>
        <p class="text-center text-xs text-slate-500 pt-2">Sudah terdaftar? <a href="{{ route('login') }}" class="text-white font-bold underline">Login Disini</a></p>
    </div>
</body>
</html>