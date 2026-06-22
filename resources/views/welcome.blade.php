<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GudangKu — Sistem Manajemen Gudang</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50:  '#f1f0ff',
                            100: '#e4e1ff',
                            200: '#cbc6ff',
                            300: '#a79dff',
                            400: '#8b7bff',
                            500: '#7458ff',
                            600: '#6437f5',
                            700: '#5527d8',
                            800: '#4621ae',
                            900: '#3a1f8a',
                            950: '#241261',
                        },
                    },
                    animation: {
                        'blob': 'blob 14s infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 9s ease-in-out infinite',
                        'fade-up': 'fadeUp 0.8s ease-out forwards',
                    },
                    keyframes: {
                        blob: {
                            '0%, 100%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -40px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 25px) scale(0.95)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-14px)' },
                        },
                        fadeUp: {
                            '0%': { opacity: '0', transform: 'translateY(24px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                    },
                }
            }
        }
    </script>
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display { font-family: 'Outfit', sans-serif; }

        .grid-bg {
            background-image: radial-gradient(circle, rgba(116,88,255,0.18) 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .hero-glow {
            background: radial-gradient(ellipse 80% 60% at 50% 0%, rgba(116,88,255,0.16), transparent 70%);
        }

        .text-gradient {
            background: linear-gradient(115deg, #6437f5 0%, #a855f7 50%, #6366f1 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .card-gradient-border {
            position: relative;
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #cbc6ff, #f1f0ff, #cbc6ff) border-box;
            border: 1.5px solid transparent;
        }

        .glass {
            background: rgba(255,255,255,0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        .delay-1 { animation-delay: .1s; opacity: 0; }
        .delay-2 { animation-delay: .25s; opacity: 0; }
        .delay-3 { animation-delay: .4s; opacity: 0; }
        .delay-4 { animation-delay: .55s; opacity: 0; }

        ::selection { background: #cbc6ff; color: #241261; }
    </style>
</head>

<body class="bg-white text-slate-900 antialiased overflow-x-hidden">

    <!-- Background ambient blobs -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] left-[-5%] w-[500px] h-[500px] bg-brand-300/30 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute top-[15%] right-[-10%] w-[450px] h-[450px] bg-fuchsia-300/25 rounded-full blur-3xl animate-blob" style="animation-delay:3s"></div>
        <div class="absolute bottom-[5%] left-[20%] w-[400px] h-[400px] bg-indigo-300/20 rounded-full blur-3xl animate-blob" style="animation-delay:6s"></div>
    </div>

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 glass border-b border-brand-100/60">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <a href="/" class="flex items-center gap-2.5 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-600 to-fuchsia-500 flex items-center justify-center shadow-lg shadow-brand-500/30 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <span class="font-display text-lg font-bold tracking-tight">GudangKu</span>
            </a>

            <div class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
                <a href="#fitur" class="hover:text-brand-600 transition">Fitur</a>
                <a href="#alur" class="hover:text-brand-600 transition">Cara Kerja</a>
                <a href="#kenapa" class="hover:text-brand-600 transition">Kenapa Kami</a>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('login') }}"
                   class="px-4 py-2 text-sm font-semibold text-slate-600 hover:text-brand-600 transition">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                   class="px-5 py-2.5 bg-gradient-to-r from-brand-600 to-fuchsia-500 text-white text-sm font-bold rounded-xl hover:shadow-lg hover:shadow-brand-500/30 hover:-translate-y-0.5 transition-all">
                    Daftar
                </a>
            </div>

        </div>
    </nav>

    <!-- Hero -->
    <section class="relative hero-glow grid-bg">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/40 to-white"></div>
        <div class="relative max-w-7xl mx-auto px-6 pt-16 pb-10 lg:pt-20 lg:pb-16">

            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <!-- Left: copy -->
                <div class="text-center lg:text-left">
                    <span class="animate-fade-up inline-flex items-center gap-2 px-4 py-1.5 bg-white border border-brand-200 rounded-full text-xs font-bold text-brand-700 shadow-sm">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        Sistem Manajemen Gudang 
                    </span>

                    <h1 class="animate-fade-up delay-1 font-display text-4xl sm:text-5xl lg:text-[3.4rem] font-bold mt-7 leading-[1.08] tracking-tight">
                        Kelola Stok Gudang
                        <span class="block text-gradient">Lebih Cepat & Rapi</span>
                    </h1>

                    <p class="animate-fade-up delay-2 mt-6 text-base lg:text-lg text-slate-500 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                        GudangKu membantu mengelola stok barang, supplier, barang masuk-keluar,
                        dan laporan persediaan secara <span class="text-slate-700 font-semibold">real-time</span> dalam satu sistem terpadu.
                    </p>

                    <div class="animate-fade-up delay-3 flex flex-col sm:flex-row justify-center lg:justify-start gap-3 mt-10">
                        <a href="{{ route('login') }}"
                           class="group px-7 py-3.5 bg-gradient-to-r from-brand-600 to-fuchsia-500 text-white rounded-xl font-bold hover:shadow-xl hover:shadow-brand-500/30 hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2">
                            Mulai Sekarang
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="#fitur"
                           class="px-7 py-3.5 bg-white border border-slate-200 rounded-xl font-bold text-slate-700 hover:border-brand-300 hover:bg-brand-50/50 transition-all">
                            Lihat Fitur
                        </a>
                    </div>

                    <div class="animate-fade-up delay-4 flex items-center justify-center lg:justify-start gap-6 mt-12 text-sm">
                        <div>
                            <p class="font-display text-2xl font-bold text-slate-900">2 Role</p>
                            <p class="text-slate-400 font-medium">Admin & Manajer</p>
                        </div>
                        <div class="w-px h-9 bg-slate-200"></div>
                        <div>
                            <p class="font-display text-2xl font-bold text-slate-900">Real-time</p>
                            <p class="text-slate-400 font-medium">Update Stok</p>
                        </div>
                        <div class="w-px h-9 bg-slate-200"></div>
                        <div>
                            <p class="font-display text-2xl font-bold text-slate-900">Excel</p>
                            <p class="text-slate-400 font-medium">Export Laporan</p>
                        </div>
                    </div>
                </div>

                <!-- Right: hero illustration -->
                <div class="relative animate-fade-up delay-2">
                    <div class="absolute -inset-6 bg-gradient-to-tr from-brand-200/40 via-fuchsia-100/30 to-transparent rounded-[3rem] blur-2xl"></div>

                    <div class="relative animate-float">
                        <svg viewBox="0 0 560 480" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto drop-shadow-2xl">
    <defs>
        <linearGradient id="gWall" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="#7458ff"/>
            <stop offset="100%" stop-color="#5527d8"/>
        </linearGradient>
        <linearGradient id="gWallSide" x1="0" y1="0" x2="1" y2="0">
            <stop offset="0%" stop-color="#4621ae"/>
            <stop offset="100%" stop-color="#3a1f8a"/>
        </linearGradient>
        <linearGradient id="gRoof" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="#a79dff"/>
            <stop offset="100%" stop-color="#8b7bff"/>
        </linearGradient>
        <linearGradient id="gBox1" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="#93c5fd"/>
            <stop offset="100%" stop-color="#60a5fa"/>
        </linearGradient>
        <linearGradient id="gBox2" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="#c4b5fd"/>
            <stop offset="100%" stop-color="#a78bfa"/>
        </linearGradient>
        <linearGradient id="gBox3" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="#f0abfc"/>
            <stop offset="100%" stop-color="#e879f9"/>
        </linearGradient>
        <linearGradient id="gFloor" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="#ede9fe"/>
            <stop offset="100%" stop-color="#ddd6fe"/>
        </linearGradient>
        <filter id="softShadow" x="-30%" y="-30%" width="160%" height="160%">
            <feDropShadow dx="0" dy="10" stdDeviation="14" flood-color="#3a1f8a" flood-opacity="0.18"/>
        </filter>
    </defs>

    <!-- Floor ellipse shadow -->
    <ellipse cx="280" cy="430" rx="220" ry="26" fill="#5527d8" opacity="0.08"/>

    <!-- Warehouse building -->
    <g filter="url(#softShadow)">
        <!-- back wall -->
        <rect x="80" y="130" width="320" height="240" rx="10" fill="url(#gWall)"/>
        <!-- side wall (3D effect) -->
        <polygon points="400,130 460,160 460,370 400,370" fill="url(#gWallSide)"/>
        <!-- roof -->
        <polygon points="60,140 240,70 420,140 400,130 240,90 80,130" fill="url(#gRoof)"/>
        <polygon points="400,130 420,140 460,160 400,160" fill="#8b7bff"/>

        <!-- big door -->
        <rect x="150" y="220" width="140" height="150" rx="8" fill="#241261" opacity="0.85"/>
        <rect x="160" y="230" width="56" height="60" rx="4" fill="#5527d8"/>
        <rect x="224" y="230" width="56" height="60" rx="4" fill="#5527d8"/>
        <rect x="160" y="298" width="56" height="60" rx="4" fill="#4621ae"/>
        <rect x="224" y="298" width="56" height="60" rx="4" fill="#4621ae"/>

        <!-- side small window -->
        <rect x="410" y="190" width="34" height="44" rx="4" fill="#ede9fe" opacity="0.85"/>
        <rect x="410" y="250" width="34" height="44" rx="4" fill="#ede9fe" opacity="0.6"/>

        <!-- front windows -->
        <rect x="100" y="160" width="34" height="34" rx="6" fill="#ede9fe" opacity="0.9"/>
        <rect x="320" y="160" width="34" height="34" rx="6" fill="#ede9fe" opacity="0.9"/>
    </g>

    <!-- Ground -->
    <rect x="0" y="370" width="560" height="60" fill="url(#gFloor)"/>
    <rect x="0" y="370" width="560" height="6" fill="#c4b5fd"/>

    <!-- Stacked boxes (left, in front of warehouse) -->
    <g filter="url(#softShadow)">
        <rect x="20" y="330" width="70" height="55" rx="6" fill="url(#gBox2)"/>
        <rect x="20" y="330" width="70" height="14" rx="6" fill="#7c3aed" opacity="0.4"/>
        <rect x="100" y="350" width="60" height="35" rx="6" fill="url(#gBox1)"/>
        <rect x="100" y="350" width="60" height="10" rx="6" fill="#3b82f6" opacity="0.4"/>
    </g>

    <!-- Stacked boxes (right) -->
    <g filter="url(#softShadow)">
        <rect x="455" y="300" width="58" height="48" rx="6" fill="url(#gBox3)"/>
        <rect x="455" y="300" width="58" height="12" rx="6" fill="#d946ef" opacity="0.4"/>
        <rect x="470" y="352" width="65" height="33" rx="6" fill="url(#gBox1)"/>
        <rect x="470" y="352" width="65" height="10" rx="6" fill="#3b82f6" opacity="0.4"/>
    </g>

    <!-- Forklift -->
    <g filter="url(#softShadow)" transform="translate(295,300)">
        <!-- fork mast -->
        <rect x="0" y="-18" width="6" height="78" rx="2" fill="#3a1f8a"/>
        <rect x="14" y="-18" width="6" height="78" rx="2" fill="#3a1f8a"/>
        <!-- forks -->
        <rect x="-26" y="44" width="40" height="6" rx="2" fill="#4621ae"/>
        <rect x="-26" y="54" width="40" height="6" rx="2" fill="#4621ae"/>
        <!-- carried box -->
        <rect x="-30" y="6" width="46" height="38" rx="5" fill="url(#gBox2)"/>
        <rect x="-30" y="6" width="46" height="10" rx="5" fill="#7c3aed" opacity="0.4"/>
        <!-- body -->
        <rect x="14" y="20" width="58" height="36" rx="8" fill="#facc15"/>
        <rect x="14" y="20" width="58" height="36" rx="8" fill="#fbbf24" opacity="0.3"/>
        <!-- cabin -->
        <rect x="46" y="-6" width="30" height="30" rx="6" fill="#fde68a"/>
        <rect x="50" y="-2" width="22" height="16" rx="3" fill="#ede9fe" opacity="0.85"/>
        <!-- wheels -->
        <circle cx="30" cy="60" r="11" fill="#241261"/>
        <circle cx="30" cy="60" r="4.5" fill="#8b7bff"/>
        <circle cx="66" cy="60" r="11" fill="#241261"/>
        <circle cx="66" cy="60" r="4.5" fill="#8b7bff"/>
    </g>

    <!-- Decorative dashed path -->
    <path d="M 30 410 Q 280 440 530 410" stroke="#a79dff" stroke-width="2.5" stroke-dasharray="2 10" stroke-linecap="round" fill="none" opacity="0.6"/>

    <!-- Small floating package top-right of roof -->
    <g transform="translate(360,40)" opacity="0.9">
        <rect x="0" y="0" width="34" height="34" rx="6" fill="url(#gBox3)"/>
        <path d="M0 9 L17 17 L34 9" stroke="#a21caf" stroke-width="1.5" fill="none" opacity="0.5"/>
        <line x1="17" y1="17" x2="17" y2="34" stroke="#a21caf" stroke-width="1.5" opacity="0.5"/>
    </g>
</svg>
                    </div>

                    <!-- floating stat chips -->
                    <div class="absolute top-6 -left-4 sm:-left-8 animate-float-slow">
                        <div class="card-gradient-border rounded-2xl shadow-xl shadow-brand-900/10 px-4 py-3 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-emerald-100 flex items-center justify-center">
                                <svg class="w-4.5 h-4.5 text-emerald-600" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                            </div>
                            <div>
                                <p class="text-[11px] text-slate-400 font-semibold leading-none">Barang Masuk</p>
                                <p class="text-base font-display font-bold text-slate-900 mt-1">+42 hari ini</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute bottom-8 -right-4 sm:-right-8 animate-float-slow" style="animation-delay:1.5s">
                        <div class="card-gradient-border rounded-2xl shadow-xl shadow-brand-900/10 px-4 py-3 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-brand-100 flex items-center justify-center">
                                <svg class="w-4.5 h-4.5 text-brand-600" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m6 10v-4M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <p class="text-[11px] text-slate-400 font-semibold leading-none">Total Stok</p>
                                <p class="text-base font-display font-bold text-slate-900 mt-1">1.284 unit</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Dashboard preview card -->
            <div class="mt-20 lg:mt-24 max-w-5xl mx-auto animate-fade-up delay-3">
                <div class="bg-white/80 backdrop-blur rounded-[28px] shadow-2xl shadow-brand-900/10 border border-brand-100 p-2.5">
                    <div class="bg-gradient-to-br from-slate-50 to-brand-50/60 rounded-[20px] p-6 lg:p-8">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-rose-300"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-300"></div>
                                <div class="w-3 h-3 rounded-full bg-emerald-300"></div>
                            </div>
                            <span class="text-xs font-semibold text-slate-400">Dashboard — GudangKu</span>
                        </div>
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 text-left">
                            <div class="bg-white p-4 rounded-xl border border-slate-100 hover:shadow-md transition-shadow">
                                <p class="text-xs text-slate-400 font-semibold">Total Barang</p>
                                <p class="font-display text-2xl font-bold text-slate-900 mt-1">128</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl border border-slate-100 hover:shadow-md transition-shadow">
                                <p class="text-xs text-slate-400 font-semibold">Barang Masuk</p>
                                <p class="font-display text-2xl font-bold text-brand-600 mt-1">42</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl border border-slate-100 hover:shadow-md transition-shadow">
                                <p class="text-xs text-slate-400 font-semibold">Barang Keluar</p>
                                <p class="font-display text-2xl font-bold text-fuchsia-600 mt-1">31</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl border border-slate-100 hover:shadow-md transition-shadow">
                                <p class="text-xs text-slate-400 font-semibold">Stok Menipis</p>
                                <p class="font-display text-2xl font-bold text-rose-500 mt-1">6</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Logo strip / trust bar -->
    <section class="py-10 border-y border-slate-100 bg-slate-50/60">
        <div class="max-w-6xl mx-auto px-6">
            <p class="text-center text-xs font-bold tracking-widest text-slate-400 uppercase mb-6">Dipercaya untuk mengelola operasional gudang</p>
            <div class="flex flex-wrap justify-center items-center gap-x-12 gap-y-4 text-slate-400 font-display font-bold text-lg">
                <span class="hover:text-brand-500 transition-colors">Retail</span>
                <span class="hover:text-brand-500 transition-colors">Distribusi</span>
                <span class="hover:text-brand-500 transition-colors">Manufaktur</span>
                <span class="hover:text-brand-500 transition-colors">E-commerce</span>
                <span class="hover:text-brand-500 transition-colors">UMKM</span>
            </div>
        </div>
    </section>

    <!-- Fitur -->
    <section id="fitur" class="py-24 lg:py-28">
        <div class="max-w-6xl mx-auto px-6">

            <div class="text-center max-w-xl mx-auto mb-16">
                <span class="text-xs font-bold tracking-widest text-brand-600 uppercase">Fitur</span>
                <h2 class="font-display text-3xl lg:text-4xl font-bold tracking-tight mt-3">Semua yang Kamu Butuhkan</h2>
                <p class="text-slate-500 mt-3">Satu platform terpadu untuk mengelola seluruh operasional gudang.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">

                <div class="group p-6 rounded-2xl border border-slate-100 hover:border-brand-200 bg-white hover:shadow-xl hover:shadow-brand-100/60 hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-brand-600 to-brand-400 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform shadow-md shadow-brand-500/20">
                        <svg class="w-5.5 h-5.5 text-white" width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-lg">Dashboard</h3>
                    <p class="text-slate-500 text-sm mt-2 leading-relaxed">Statistik gudang secara real-time dan mudah dipantau.</p>
                </div>

                <div class="group p-6 rounded-2xl border border-slate-100 hover:border-brand-200 bg-white hover:shadow-xl hover:shadow-brand-100/60 hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-fuchsia-500 to-brand-500 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform shadow-md shadow-fuchsia-500/20">
                        <svg class="w-5.5 h-5.5 text-white" width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 7l1.5 12a2 2 0 002 2h11a2 2 0 002-2L21 7M3 7l2-4h14l2 4M9 11v6m6-6v6"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-lg">Supplier</h3>
                    <p class="text-slate-500 text-sm mt-2 leading-relaxed">Kelola data supplier dan kontak pemasok dengan mudah.</p>
                </div>

                <div class="group p-6 rounded-2xl border border-slate-100 hover:border-brand-200 bg-white hover:shadow-xl hover:shadow-brand-100/60 hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-brand-500 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform shadow-md shadow-indigo-500/20">
                        <svg class="w-5.5 h-5.5 text-white" width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m6 10v-4M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-lg">Laporan</h3>
                    <p class="text-slate-500 text-sm mt-2 leading-relaxed">Cetak dan unduh laporan stok kapan saja dibutuhkan.</p>
                </div>

                <div class="group p-6 rounded-2xl border border-slate-100 hover:border-brand-200 bg-white hover:shadow-xl hover:shadow-brand-100/60 hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-500 to-fuchsia-400 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform shadow-md shadow-violet-500/20">
                        <svg class="w-5.5 h-5.5 text-white" width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm6 0a4 4 0 10-4-4"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-lg">Multi Role</h3>
                    <p class="text-slate-500 text-sm mt-2 leading-relaxed">Admin pengelola penuh & Manajer dengan akses pemantauan.</p>
                </div>

            </div>

        </div>
    </section>

    <!-- Cara Kerja -->
    <section id="alur" class="py-24 lg:py-28 bg-gradient-to-b from-white via-brand-50/40 to-white relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-6 relative">

            <div class="text-center max-w-xl mx-auto mb-16">
                <span class="text-xs font-bold tracking-widest text-brand-600 uppercase">Cara Kerja</span>
                <h2 class="font-display text-3xl lg:text-4xl font-bold tracking-tight mt-3">Mulai dalam 3 Langkah</h2>
                <p class="text-slate-500 mt-3">Tidak perlu instalasi rumit, langsung pakai dari browser.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 relative">
                <div class="hidden md:block absolute top-8 left-[16.5%] right-[16.5%] h-0.5 bg-gradient-to-r from-brand-200 via-fuchsia-200 to-brand-200"></div>

                <div class="relative text-center">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-brand-600 to-fuchsia-500 text-white font-display font-bold text-2xl flex items-center justify-center shadow-lg shadow-brand-500/30 relative z-10">1</div>
                    <h3 class="font-display font-bold text-lg mt-5">Buat Akun</h3>
                    <p class="text-slate-500 text-sm mt-2 leading-relaxed max-w-xs mx-auto">Daftar sebagai Admin Gudang atau Manajer dalam hitungan detik.</p>
                </div>

                <div class="relative text-center">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-brand-600 to-fuchsia-500 text-white font-display font-bold text-2xl flex items-center justify-center shadow-lg shadow-brand-500/30 relative z-10">2</div>
                    <h3 class="font-display font-bold text-lg mt-5">Input Data</h3>
                    <p class="text-slate-500 text-sm mt-2 leading-relaxed max-w-xs mx-auto">Tambahkan kategori, supplier, dan catat barang masuk-keluar.</p>
                </div>

                <div class="relative text-center">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-brand-600 to-fuchsia-500 text-white font-display font-bold text-2xl flex items-center justify-center shadow-lg shadow-brand-500/30 relative z-10">3</div>
                    <h3 class="font-display font-bold text-lg mt-5">Pantau & Laporkan</h3>
                    <p class="text-slate-500 text-sm mt-2 leading-relaxed max-w-xs mx-auto">Lihat dashboard real-time dan ekspor laporan ke Excel.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Kenapa Kami -->
    <section id="kenapa" class="py-24 lg:py-28">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-14 items-center">

                <div>
                    <span class="text-xs font-bold tracking-widest text-brand-600 uppercase">Kenapa GudangKu</span>
                    <h2 class="font-display text-3xl lg:text-4xl font-bold tracking-tight mt-3 leading-tight">
                        Dibangun untuk Kecepatan & <span class="text-gradient">Akurasi Stok</span>
                    </h2>
                    <p class="text-slate-500 mt-4 leading-relaxed">
                        GudangKu dirancang agar tim gudang tidak lagi bergantung pada catatan manual.
                        Setiap perubahan stok tercatat otomatis dan bisa dipantau siapa pun yang punya akses.
                    </p>

                    <div class="mt-8 space-y-5">
                        <div class="flex gap-4">
                            <div class="w-9 h-9 rounded-lg bg-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4.5 h-4.5 text-emerald-600" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Data Selalu Akurat</h4>
                                <p class="text-slate-500 text-sm mt-1 leading-relaxed">Stok otomatis terupdate setiap ada transaksi barang masuk atau keluar.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-9 h-9 rounded-lg bg-brand-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4.5 h-4.5 text-brand-600" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Akses Berbasis Peran</h4>
                                <p class="text-slate-500 text-sm mt-1 leading-relaxed">Admin Gudang mengelola penuh, Manajer fokus memantau dan menganalisis.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-9 h-9 rounded-lg bg-fuchsia-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4.5 h-4.5 text-fuchsia-600" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Laporan Siap Pakai</h4>
                                <p class="text-slate-500 text-sm mt-1 leading-relaxed">Export laporan stok ke Excel hanya dengan sekali klik.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-tr from-brand-200/40 to-fuchsia-200/30 rounded-[2.5rem] blur-2xl"></div>
                    <div class="relative bg-gradient-to-br from-brand-600 via-brand-700 to-fuchsia-600 rounded-[2rem] p-8 lg:p-10 text-white shadow-2xl shadow-brand-900/30 overflow-hidden">
                        <div class="absolute -top-10 -right-10 w-44 h-44 bg-white/10 rounded-full blur-2xl"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-fuchsia-400/20 rounded-full blur-2xl"></div>

                        <div class="relative space-y-6">
                            <div class="flex items-center justify-between bg-white/10 rounded-xl px-5 py-4 backdrop-blur-sm border border-white/10">
                                <span class="text-sm font-semibold text-white/80">Stok Aman</span>
                                <span class="font-display text-xl font-bold">94%</span>
                            </div>
                            <div class="flex items-center justify-between bg-white/10 rounded-xl px-5 py-4 backdrop-blur-sm border border-white/10">
                                <span class="text-sm font-semibold text-white/80">Akurasi Pencatatan</span>
                                <span class="font-display text-xl font-bold">99,2%</span>
                            </div>
                            <div class="flex items-center justify-between bg-white/10 rounded-xl px-5 py-4 backdrop-blur-sm border border-white/10">
                                <span class="text-sm font-semibold text-white/80">Waktu Respon</span>
                                <span class="font-display text-xl font-bold">&lt; 1 detik</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 px-6">
        <div class="max-w-4xl mx-auto bg-gradient-to-br from-brand-700 via-brand-600 to-fuchsia-600 rounded-[2.5rem] px-8 py-16 text-center relative overflow-hidden shadow-2xl shadow-brand-900/30">
            <div class="absolute -top-20 -right-16 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-16 -left-10 w-56 h-56 bg-fuchsia-400/20 rounded-full blur-3xl"></div>
            <div class="absolute inset-0 grid-bg opacity-20"></div>
            <div class="relative">
                <h2 class="font-display text-2xl lg:text-4xl font-bold text-white leading-tight">Siap mengelola gudangmu<br class="hidden sm:block"> lebih efisien?</h2>
                <p class="text-brand-100 mt-4 max-w-md mx-auto">Daftar sekarang dan mulai pantau stok barangmu secara real-time, gratis.</p>
                <a href="{{ route('register') }}"
                   class="inline-flex items-center gap-2 mt-8 px-8 py-4 bg-white text-brand-700 rounded-xl font-bold hover:bg-brand-50 hover:-translate-y-0.5 hover:shadow-xl transition-all">
                    Buat Akun 
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-slate-100 py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-brand-600 to-fuchsia-500 flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <span class="font-display font-bold text-slate-800">GudangKu</span>
            </div>
            <p class="text-slate-400 text-sm">© {{ date('Y') }} GudangKu. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
