<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Perpus Mini — Atur koleksi dan peminjaman buku dalam satu aplikasi</title>
        <meta name="description" content="Kelola buku, lacak peminjam, dan pantau ketersediaan dengan mudah untuk perpustakaan sekolah, taman baca, komunitas, maupun koleksi pribadi.">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />
        @fonts

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#fbf8f0] text-[#26241f] font-sans antialiased selection:bg-[#b0922f]/20">
        <!-- Navigation Bar -->
        <header class="bg-[#fffdf6]/90 backdrop-blur-md border-b border-[#f0ebd9] sticky top-0 z-40">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-[#b0922f] flex items-center justify-center text-[#26241f] shadow-xs">
                        <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="7" y1="4.5" x2="7" y2="19.5" />
                            <line x1="11.5" y1="4.5" x2="11.5" y2="19.5" />
                            <line x1="15.5" y1="4.5" x2="19.5" y2="19.5" />
                        </svg>
                    </div>
                    <span class="text-base font-bold tracking-tight text-[#26241f]">Perpus Mini</span>
                </a>

                <!-- Nav Links -->
                <nav class="hidden md:flex items-center gap-6">
                    <a href="#fitur" class="text-xs sm:text-sm font-medium text-[#6b675e] hover:text-[#26241f] transition">
                        Fitur
                    </a>
                    <a href="#cara-kerja" class="text-xs sm:text-sm font-medium text-[#6b675e] hover:text-[#26241f] transition">
                        Cara Kerja
                    </a>
                    <a href="#faq" class="text-xs sm:text-sm font-medium text-[#6b675e] hover:text-[#26241f] transition">
                        FAQ
                    </a>
                </nav>

                <!-- Auth Action Buttons -->
                <div class="flex items-center gap-2.5 sm:gap-3">
                    @auth
                        <a
                            href="{{ route('books.index') }}"
                            class="inline-flex items-center gap-1.5 px-4 py-2 bg-[#b0922f] hover:bg-[#9f8226] text-[#26241f] font-semibold text-xs sm:text-sm rounded-full transition shadow-xs"
                        >
                            Buka Koleksi Buku
                            <span aria-hidden="true">→</span>
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="text-xs sm:text-sm font-semibold text-[#26241f] hover:text-[#b0922f] px-3 py-2 transition"
                        >
                            Masuk
                        </a>
                        <a
                            href="{{ route('register') }}"
                            class="inline-flex items-center gap-1.5 px-4 sm:px-5 py-2 border border-[#ded8cb] hover:bg-[#fbf8f0] rounded-full text-xs sm:text-sm font-semibold text-[#26241f] transition shadow-2xs"
                        >
                            Mulai Sekarang
                            <span aria-hidden="true">→</span>
                        </a>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="pt-14 sm:pt-20 pb-14 sm:pb-20 px-4 sm:px-6 lg:px-8 text-center max-w-4xl mx-auto">
            <!-- Pill Badge -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-medium bg-[#efe3b8] text-[#776529] mb-6">
                <span>✨</span>
                <span>Aplikasi Perpustakaan Digital</span>
            </div>

            <!-- Main Headline -->
            <h1 class="text-3xl sm:text-5xl lg:text-[54px] font-bold text-[#1f1e1a] tracking-tight leading-[1.18] mb-5">
                Atur koleksi dan<br>peminjaman buku dalam<br>satu aplikasi.
            </h1>

            <!-- Subtitle -->
            <p class="text-xs sm:text-base text-[#6b675e] max-w-2xl mx-auto leading-relaxed mb-6">
                Kelola buku, lacak peminjam, dan pantau ketersediaan dengan mudah. Cocok untuk perpustakaan sekolah, taman baca, komunitas, maupun koleksi pribadi.
            </p>

            <!-- Trust Points -->
            <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-6 text-xs text-[#78716c] font-medium mb-8">
                <span class="inline-flex items-center gap-1.5 text-[#776529]">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    Gratis & Cepat
                </span>
                <span class="inline-flex items-center gap-1.5 text-[#776529]">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    Tanpa Ribet
                </span>
                <span class="inline-flex items-center gap-1.5 text-[#776529]">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    Berbasis Web
                </span>
            </div>

            <!-- Hero Action Buttons -->
            <div class="flex flex-wrap items-center justify-center gap-3">
                <a
                    href="{{ route('register') }}"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#26241f] hover:bg-black active:bg-neutral-900 text-white font-semibold text-xs sm:text-sm rounded-full transition shadow-xs cursor-pointer"
                >
                    Mulai Sekarang
                    <span aria-hidden="true">→</span>
                </a>
                <a
                    href="{{ route('login') }}"
                    class="px-6 py-3 bg-[#fffdf6] hover:bg-[#fbf8f0] border border-[#ded8cb] text-[#26241f] font-semibold text-xs sm:text-sm rounded-full transition shadow-2xs"
                >
                    Masuk
                </a>
            </div>

            <!-- "Cocok untuk" Category Pills -->
            <div class="mt-14 pt-8 border-t border-[#f0ebd9]/70">
                <p class="text-[11px] uppercase tracking-wider text-[#9e988b] font-semibold mb-4">
                    Cocok untuk:
                </p>
                <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-4 text-xs font-medium text-[#4b473e]">
                    <div class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#fffdf6] border border-[#ede7dc] rounded-xl shadow-2xs">
                        🎓 Perpustakaan sekolah
                    </div>
                    <div class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#fffdf6] border border-[#ede7dc] rounded-xl shadow-2xs">
                        📖 Taman baca
                    </div>
                    <div class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#fffdf6] border border-[#ede7dc] rounded-xl shadow-2xs">
                        👥 Komunitas
                    </div>
                    <div class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#fffdf6] border border-[#ede7dc] rounded-xl shadow-2xs">
                        📚 Koleksi pribadi
                    </div>
                </div>
            </div>
        </section>

        <!-- Bento Grid Feature Section -->
        <section id="fitur" class="py-16 sm:py-20 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <div class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-medium bg-[#efe3b8] text-[#776529] mb-3">
                    Fitur Utama
                </div>
                <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-[#1f1e1a] mb-3">
                    Dari katalog sampai riwayat peminjaman.
                </h2>
                <p class="text-xs sm:text-sm text-[#6b675e] leading-relaxed">
                    Semua fitur yang kamu butuhkan untuk mengelola koleksi buku secara rapi dan profesional tanpa repot.
                </p>
            </div>

            <!-- Bento Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
                <!-- Card 1: Katalog Buku -->
                <div class="bg-[#fffdf6] rounded-3xl border border-[#f0ebd9] p-6 sm:p-7 shadow-[0_2px_16px_rgba(40,30,10,0.03)] flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base sm:text-lg font-bold text-[#1f1e1a]">Katalog Buku</h3>
                            <div class="w-8 h-8 rounded-xl bg-[#efe3b8] text-[#776529] flex items-center justify-center">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-[#6b675e] leading-relaxed mb-6">
                            Simpan informasi buku lengkap dari judul, penulis, tahun terbit, hingga status ketersediaannya.
                        </p>
                    </div>

                    <!-- Mini UI Mockup -->
                    <div class="bg-[#fbf8f0] border border-[#ede7dc] rounded-2xl p-3.5 space-y-2.5">
                        <div class="flex items-center justify-between text-xs pb-2 border-b border-[#f0ebd9]">
                            <span class="font-semibold text-[#1f1e1a]">Laskar Pelangi</span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-medium bg-[#efe3b8] text-[#776529]">Tersedia</span>
                        </div>
                        <div class="flex items-center justify-between text-xs pb-2 border-b border-[#f0ebd9]">
                            <span class="font-semibold text-[#1f1e1a]">Bumi Manusia</span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-medium bg-[#efe3b8] text-[#776529]">Tersedia</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="font-semibold text-[#1f1e1a]">Negeri 5 Menara</span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-medium bg-[#ede7dc] text-[#78716c]">Dipinjam</span>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Peminjaman -->
                <div class="bg-[#fffdf6] rounded-3xl border border-[#f0ebd9] p-6 sm:p-7 shadow-[0_2px_16px_rgba(40,30,10,0.03)] flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base sm:text-lg font-bold text-[#1f1e1a]">Peminjaman</h3>
                            <div class="w-8 h-8 rounded-xl bg-[#efe3b8] text-[#776529] flex items-center justify-center">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="1" y="5" width="22" height="14" rx="7" ry="7" />
                                    <circle cx="8" cy="12" r="3" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-[#6b675e] leading-relaxed mb-6">
                            Catat peminjaman dan pengembalian buku dalam satu klik praktis.
                        </p>
                    </div>

                    <!-- Mini UI Mockup -->
                    <div class="bg-[#fbf8f0] border border-[#ede7dc] rounded-2xl p-4 text-center">
                        <div class="inline-flex items-center gap-1.5 p-1 bg-[#ede7dc] rounded-full mb-3 text-[11px] font-medium">
                            <span class="px-2.5 py-0.5 rounded-full bg-[#b0922f] text-white">Tersedia</span>
                            <span class="px-2.5 py-0.5 rounded-full text-[#78716c]">Dipinjam</span>
                        </div>
                        <div class="flex items-center justify-between text-xs pt-2 border-t border-[#f0ebd9]">
                            <span class="text-[#6b675e]">Negeri 5 Menara</span>
                            <span class="px-2 py-1 bg-[#26241f] text-white rounded-lg text-[10px] font-medium">Ubah status</span>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Data Anggota -->
                <div class="bg-[#fffdf6] rounded-3xl border border-[#f0ebd9] p-6 sm:p-7 shadow-[0_2px_16px_rgba(40,30,10,0.03)] flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base sm:text-lg font-bold text-[#1f1e1a]">Data Anggota</h3>
                            <div class="w-8 h-8 rounded-xl bg-[#efe3b8] text-[#776529] flex items-center justify-center">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-[#6b675e] leading-relaxed mb-6">
                            Pantau siapa saja yang sedang meminjam buku secara terstruktur.
                        </p>
                    </div>

                    <!-- Mini UI Mockup -->
                    <div class="bg-[#fbf8f0] border border-[#ede7dc] rounded-2xl p-3.5 space-y-2">
                        <div class="flex items-center gap-2.5 text-xs">
                            <div class="w-6 h-6 rounded-full bg-[#efe3b8] text-[#776529] font-bold text-[10px] flex items-center justify-center">BS</div>
                            <span class="font-medium text-[#1f1e1a]">Budi Santoso</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs">
                            <div class="w-6 h-6 rounded-full bg-[#efe3b8] text-[#776529] font-bold text-[10px] flex items-center justify-center">SR</div>
                            <span class="font-medium text-[#1f1e1a]">Siti Rahma</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs">
                            <div class="w-6 h-6 rounded-full bg-[#efe3b8] text-[#776529] font-bold text-[10px] flex items-center justify-center">EN</div>
                            <span class="font-medium text-[#1f1e1a]">Eko Nugroho</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Row: 2 Wider Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Card 4: Statistik Koleksi -->
                <div class="bg-[#fffdf6] rounded-3xl border border-[#f0ebd9] p-6 sm:p-7 shadow-[0_2px_16px_rgba(40,30,10,0.03)] flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base sm:text-lg font-bold text-[#1f1e1a]">Statistik Koleksi</h3>
                            <div class="w-8 h-8 rounded-xl bg-[#efe3b8] text-[#776529] flex items-center justify-center">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="20" x2="18" y2="10"/>
                                    <line x1="12" y1="20" x2="12" y2="4"/>
                                    <line x1="6" y1="20" x2="6" y2="14"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-[#6b675e] leading-relaxed mb-6">
                            Informasi langsung jumlah buku, yang dipinjam, dan sisa stok di perpustakaan.
                        </p>
                    </div>

                    <!-- Mini UI Mockup -->
                    <div class="grid grid-cols-3 gap-2.5">
                        <div class="bg-[#fbf8f0] border border-[#ede7dc] rounded-2xl p-3 text-center">
                            <div class="text-[10px] uppercase font-semibold text-[#8a857b]">Total</div>
                            <div class="text-xl font-bold text-[#1f1e1a] mt-0.5">24</div>
                        </div>
                        <div class="bg-[#fbf8f0] border border-[#ede7dc] rounded-2xl p-3 text-center">
                            <div class="text-[10px] uppercase font-semibold text-[#776529]">Tersedia</div>
                            <div class="text-xl font-bold text-[#776529] mt-0.5">18</div>
                        </div>
                        <div class="bg-[#fbf8f0] border border-[#ede7dc] rounded-2xl p-3 text-center">
                            <div class="text-[10px] uppercase font-semibold text-[#8a857b]">Dipinjam</div>
                            <div class="text-xl font-bold text-[#1f1e1a] mt-0.5">6</div>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Riwayat Aktivitas -->
                <div class="bg-[#fffdf6] rounded-3xl border border-[#f0ebd9] p-6 sm:p-7 shadow-[0_2px_16px_rgba(40,30,10,0.03)] flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base sm:text-lg font-bold text-[#1f1e1a]">Riwayat Aktivitas</h3>
                            <div class="w-8 h-8 rounded-xl bg-[#efe3b8] text-[#776529] flex items-center justify-center">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-[#6b675e] leading-relaxed mb-6">
                            Catatan jelas riwayat peminjaman buku yang selalu tersimpan rapi.
                        </p>
                    </div>

                    <!-- Mini UI Mockup -->
                    <div class="bg-[#fbf8f0] border border-[#ede7dc] rounded-2xl p-3.5 space-y-2 text-xs">
                        <div class="flex items-center justify-between">
                            <span class="font-medium text-[#1f1e1a]">Laskar Pelangi dikembalikan</span>
                            <span class="text-[11px] text-[#8a857b]">10 mnt</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-medium text-[#1f1e1a]">Bumi Manusia dipinjam</span>
                            <span class="text-[11px] text-[#8a857b]">1 jam</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-medium text-[#1f1e1a]">Negeri 5 Menara dipinjam</span>
                            <span class="text-[11px] text-[#8a857b]">2 hari</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Manfaat ("Pekerjaan pustakawan jadi lebih ringan") -->
        <section class="py-16 sm:py-20 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
                <!-- Left Column -->
                <div class="lg:col-span-5">
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-medium bg-[#efe3b8] text-[#776529] mb-4">
                        Manfaat
                    </div>
                    <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-[#1f1e1a] leading-snug mb-4">
                        Pekerjaan pustakawan jadi lebih ringan.
                    </h2>
                    <p class="text-xs sm:text-sm text-[#6b675e] leading-relaxed mb-6">
                        Tinggalkan pencatatan manual di buku besar. Beralih ke sistem digital yang praktis, cepat, dan mudah dipelajari.
                    </p>

                    <!-- Feature Tags -->
                    <div class="flex flex-wrap gap-2 text-xs font-medium text-[#57534e]">
                        <span class="px-3 py-1.5 bg-[#fffdf6] border border-[#ede7dc] rounded-xl shadow-2xs">Katalog digital</span>
                        <span class="px-3 py-1.5 bg-[#fffdf6] border border-[#ede7dc] rounded-xl shadow-2xs">Status otomatis</span>
                        <span class="px-3 py-1.5 bg-[#fffdf6] border border-[#ede7dc] rounded-xl shadow-2xs">Akses mudah</span>
                        <span class="px-3 py-1.5 bg-[#fffdf6] border border-[#ede7dc] rounded-xl shadow-2xs">Desain ramah</span>
                    </div>
                </div>

                <!-- Right Column: 5 Feature Items -->
                <div class="lg:col-span-7 space-y-4">
                    <!-- Item 1 -->
                    <div class="p-4 sm:p-5 bg-[#fffdf6] rounded-2xl border border-[#f0ebd9] shadow-2xs flex items-start gap-4">
                        <div class="w-8 h-8 rounded-xl bg-[#efe3b8] text-[#776529] flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#1f1e1a]">Pencatatan lebih cepat</h4>
                            <p class="text-xs text-[#6b675e] mt-1 leading-relaxed">Input dan cari buku hanya dalam hitungan detik tanpa membuka buku catatan tebal.</p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="p-4 sm:p-5 bg-[#fffdf6] rounded-2xl border border-[#f0ebd9] shadow-2xs flex items-start gap-4">
                        <div class="w-8 h-8 rounded-xl bg-[#efe3b8] text-[#776529] flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" y1="16" x2="12" y2="12" />
                                <line x1="12" y1="8" x2="12.01" y2="8" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#1f1e1a]">Status transparan</h4>
                            <p class="text-xs text-[#6b675e] mt-1 leading-relaxed">Langsung tahu apakah buku tersedia atau sedang dipinjam tanpa mengecek rak secara manual.</p>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="p-4 sm:p-5 bg-[#fffdf6] rounded-2xl border border-[#f0ebd9] shadow-2xs flex items-start gap-4">
                        <div class="w-8 h-8 rounded-xl bg-[#efe3b8] text-[#776529] flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <line x1="3" y1="9" x2="21" y2="9"/>
                                <line x1="9" y1="21" x2="9" y2="9"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#1f1e1a]">Struktur data rapi</h4>
                            <p class="text-xs text-[#6b675e] mt-1 leading-relaxed">Setiap buku tercatat lengkap dengan judul, penulis, tahun terbit, hingga status ketersediaan.</p>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="p-4 sm:p-5 bg-[#fffdf6] rounded-2xl border border-[#f0ebd9] shadow-2xs flex items-start gap-4">
                        <div class="w-8 h-8 rounded-xl bg-[#efe3b8] text-[#776529] flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#1f1e1a]">Aman dan terjaga</h4>
                            <p class="text-xs text-[#6b675e] mt-1 leading-relaxed">Data perpustakaan tersimpan di database dan siap diakses kapan pun dibutuhkan.</p>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="p-4 sm:p-5 bg-[#fffdf6] rounded-2xl border border-[#f0ebd9] shadow-2xs flex items-start gap-4">
                        <div class="w-8 h-8 rounded-xl bg-[#efe3b8] text-[#776529] flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#1f1e1a]">Mudah untuk siapa saja</h4>
                            <p class="text-xs text-[#6b675e] mt-1 leading-relaxed">Tampilan bersih dan sederhana yang mudah digunakan tanpa perlu keahlian teknis khusus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Cara Kerja -->
        <section id="cara-kerja" class="py-16 sm:py-20 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <div class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-medium bg-[#efe3b8] text-[#776529] mb-3">
                    Cara Kerja
                </div>
                <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-[#1f1e1a]">
                    Dari akun baru sampai peminjaman pertama.
                </h2>
            </div>

            <!-- Steps Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                <!-- Step 01 -->
                <div class="bg-[#fffdf6] rounded-3xl border border-[#f0ebd9] p-7 shadow-[0_2px_16px_rgba(40,30,10,0.03)]">
                    <div class="text-4xl sm:text-5xl font-extrabold text-[#b0922f]/80 mb-4 tracking-tight">
                        01
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-[#1f1e1a] mb-2">
                        Buat akun
                    </h3>
                    <p class="text-xs sm:text-sm text-[#6b675e] leading-relaxed">
                        Daftar cepat hanya dengan nama dan email dalam hitungan menit tanpa syarat rumit.
                    </p>
                </div>

                <!-- Step 02 -->
                <div class="bg-[#fffdf6] rounded-3xl border border-[#f0ebd9] p-7 shadow-[0_2px_16px_rgba(40,30,10,0.03)]">
                    <div class="text-4xl sm:text-5xl font-extrabold text-[#b0922f]/80 mb-4 tracking-tight">
                        02
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-[#1f1e1a] mb-2">
                        Masukkan koleksi
                    </h3>
                    <p class="text-xs sm:text-sm text-[#6b675e] leading-relaxed">
                        Tambahkan data buku pertama beserta penulis, tahun terbit, dan status ketersediaannya.
                    </p>
                </div>

                <!-- Step 03 -->
                <div class="bg-[#fffdf6] rounded-3xl border border-[#f0ebd9] p-7 shadow-[0_2px_16px_rgba(40,30,10,0.03)]">
                    <div class="text-4xl sm:text-5xl font-extrabold text-[#b0922f]/80 mb-4 tracking-tight">
                        03
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-[#1f1e1a] mb-2">
                        Kelola peminjaman
                    </h3>
                    <p class="text-xs sm:text-sm text-[#6b675e] leading-relaxed">
                        Ubah status buku kapan saja saat ada peminjaman dan pengembalian hanya dalam satu klik.
                    </p>
                </div>
            </div>
        </section>

        <!-- Section: FAQ -->
        <section id="faq" class="py-16 sm:py-20 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
                <!-- Left Column -->
                <div class="lg:col-span-5">
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-medium bg-[#efe3b8] text-[#776529] mb-4">
                        FAQ
                    </div>
                    <h2 class="text-2xl sm:text-4xl font-bold tracking-tight text-[#1f1e1a] leading-snug mb-4">
                        Pertanyaan yang sering muncul.
                    </h2>
                    <p class="text-xs sm:text-sm text-[#6b675e] leading-relaxed mb-6">
                        Punya pertanyaan seputar Perpus Mini? Berikut beberapa jawaban untuk pertanyaan yang paling sering diajukan.
                    </p>
                    <a
                        href="mailto:support@perpusmini.id"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#fffdf6] hover:bg-[#fbf8f0] border border-[#ded8cb] text-[#26241f] font-semibold text-xs rounded-xl transition shadow-2xs"
                    >
                        Hubungi kami
                    </a>
                </div>

                <!-- Right Column: Accordion-like Q&A Cards -->
                <div class="lg:col-span-7 space-y-4">
                    <!-- Question 1 -->
                    <div class="p-5 sm:p-6 bg-[#fffdf6] rounded-2xl border border-[#f0ebd9] shadow-2xs">
                        <h4 class="text-sm font-bold text-[#1f1e1a] mb-2">
                            Apakah Perpus Mini gratis digunakan?
                        </h4>
                        <p class="text-xs text-[#6b675e] leading-relaxed">
                            Ya, Perpus Mini sepenuhnya gratis untuk perpustakaan kecil, komunitas, dan taman baca yang ingin merapikan pencatatan bukunya.
                        </p>
                    </div>

                    <!-- Question 2 -->
                    <div class="p-5 sm:p-6 bg-[#fffdf6] rounded-2xl border border-[#f0ebd9] shadow-2xs">
                        <h4 class="text-sm font-bold text-[#1f1e1a] mb-2">
                            Data apa yang dapat saya kelola?
                        </h4>
                        <p class="text-xs text-[#6b675e] leading-relaxed">
                            Kamu dapat mengelola seluruh koleksi mulai dari judul buku, nama penulis, tahun terbit, hingga status ketersediaan apakah siap dipinjam atau sedang dipinjam.
                        </p>
                    </div>

                    <!-- Question 3 -->
                    <div class="p-5 sm:p-6 bg-[#fffdf6] rounded-2xl border border-[#f0ebd9] shadow-2xs">
                        <h4 class="text-sm font-bold text-[#1f1e1a] mb-2">
                            Apakah data perpustakaan saya aman?
                        </h4>
                        <p class="text-xs text-[#6b675e] leading-relaxed">
                            Semua data tersimpan dengan aman di database dan hanya dapat diakses serta dikelola oleh akun yang terdaftar dan terautentikasi.
                        </p>
                    </div>

                    <!-- Question 4 -->
                    <div class="p-5 sm:p-6 bg-[#fffdf6] rounded-2xl border border-[#f0ebd9] shadow-2xs">
                        <h4 class="text-sm font-bold text-[#1f1e1a] mb-2">
                            Apakah ada batasan jumlah buku yang bisa dimasukkan?
                        </h4>
                        <p class="text-xs text-[#6b675e] leading-relaxed">
                            Tidak ada batasan. Kamu bebas mencatat seluruh koleksi buku yang ada di perpustakaanmu tanpa biaya tambahan.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Banner Section -->
        <section class="py-12 sm:py-16 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
            <div class="bg-[#201e19] text-white rounded-3xl p-8 sm:p-14 text-center shadow-[0_12px_40px_rgba(0,0,0,0.15)]">
                <h2 class="text-2xl sm:text-4xl font-bold tracking-tight mb-3">
                    Mulai rapikan perpustakaanmu hari ini.
                </h2>
                <p class="text-xs sm:text-sm text-stone-300 max-w-md mx-auto mb-8 leading-relaxed">
                    Gratis digunakan untuk mengelola koleksi buku dan peminjaman dengan mudah.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <a
                        href="{{ route('register') }}"
                        class="px-6 py-3 bg-[#b0922f] hover:bg-[#9f8226] text-[#201e19] font-bold text-xs sm:text-sm rounded-xl transition shadow-xs cursor-pointer"
                    >
                        Mulai Sekarang
                    </a>
                    <a
                        href="{{ route('login') }}"
                        class="px-6 py-3 bg-transparent hover:bg-white/10 border border-stone-600 hover:border-stone-400 text-white font-medium text-xs sm:text-sm rounded-xl transition"
                    >
                        Masuk
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <footer class="border-t border-[#f0ebd9] bg-[#fffdf6]/60 pt-12 pb-8 px-4 sm:px-6 lg:px-8 mt-6">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 mb-10">
                    <!-- Brand info -->
                    <div class="md:col-span-6">
                        <div class="flex items-center gap-2.5 mb-3">
                            <div class="w-7 h-7 rounded-lg bg-[#b0922f] flex items-center justify-center text-[#26241f] shadow-xs">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="7" y1="4.5" x2="7" y2="19.5" />
                                    <line x1="11.5" y1="4.5" x2="11.5" y2="19.5" />
                                    <line x1="15.5" y1="4.5" x2="19.5" y2="19.5" />
                                </svg>
                            </div>
                            <span class="text-base font-bold tracking-tight text-[#26241f]">Perpus Mini</span>
                        </div>
                        <p class="text-xs text-[#6b675e] max-w-sm leading-relaxed">
                            Aplikasi pengelolaan perpustakaan sederhana, rapi, dan mudah digunakan untuk semua kalangan.
                        </p>
                    </div>

                    <!-- Links Columns -->
                    <div class="md:col-span-6 grid grid-cols-3 gap-6">
                        <div>
                            <h5 class="text-xs font-bold text-[#1f1e1a] uppercase tracking-wider mb-3">Produk</h5>
                            <ul class="space-y-2 text-xs text-[#6b675e]">
                                <li><a href="#fitur" class="hover:text-[#26241f] transition">Fitur</a></li>
                                <li><a href="#cara-kerja" class="hover:text-[#26241f] transition">Cara Kerja</a></li>
                                <li><a href="#faq" class="hover:text-[#26241f] transition">FAQ</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="text-xs font-bold text-[#1f1e1a] uppercase tracking-wider mb-3">Bantuan</h5>
                            <ul class="space-y-2 text-xs text-[#6b675e]">
                                <li><a href="#faq" class="hover:text-[#26241f] transition">Panduan</a></li>
                                <li><a href="mailto:support@perpusmini.id" class="hover:text-[#26241f] transition">Kontak</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="text-xs font-bold text-[#1f1e1a] uppercase tracking-wider mb-3">Akun</h5>
                            <ul class="space-y-2 text-xs text-[#6b675e]">
                                <li><a href="{{ route('login') }}" class="hover:text-[#26241f] transition">Masuk</a></li>
                                <li><a href="{{ route('register') }}" class="hover:text-[#26241f] transition">Daftar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-[#f0ebd9] flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-[#8a857b]">
                    <p>© 2026 Perpus Mini. Hak cipta dilindungi.</p>
                    <p>Dibuat untuk perpustakaan dan komunitas literasi.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
