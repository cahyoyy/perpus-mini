<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Perpus Mini')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700" rel="stylesheet" />
        @fonts

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-full bg-[#fbf8f0] text-[#26241f] font-sans antialiased selection:bg-[#b0922f]/20">
        <!-- Navbar -->
        <header class="bg-[#fffdf6] border-b border-[#f0ebd9] sticky top-0 z-40">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 h-14 flex items-center justify-between">
                <!-- Left: Logo & Brand -->
                <a href="{{ route('books.index') }}" class="flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-[#b0922f] flex items-center justify-center text-[#26241f] shadow-xs">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="7" y1="4.5" x2="7" y2="19.5" />
                            <line x1="11.5" y1="4.5" x2="11.5" y2="19.5" />
                            <line x1="15.5" y1="4.5" x2="19.5" y2="19.5" />
                        </svg>
                    </div>
                    <span class="text-sm sm:text-base font-semibold tracking-tight text-[#26241f]">Perpus Mini</span>
                </a>

                <!-- Center: Navigation Links -->
                <div class="h-full flex items-center">
                    <a href="{{ route('books.index') }}" class="h-full inline-flex items-center text-xs sm:text-sm font-medium text-[#1f1e1a] border-b-2 border-[#b0922f] px-2 pt-0.5">
                        Daftar Buku
                    </a>
                </div>

                <!-- Right: User Avatar & Logout -->
                <div class="flex items-center gap-3">
                    @auth
                        @php
                            $words = explode(' ', trim(auth()->user()->name));
                            $initials = '';
                            foreach (array_slice($words, 0, 2) as $w) {
                                $initials .= strtoupper(substr($w, 0, 1));
                            }
                        @endphp
                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#efe3b8] text-[#776529] font-bold text-xs flex items-center justify-center tracking-tight" title="{{ auth()->user()->name }}">
                            {{ $initials ?: 'U' }}
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-xs sm:text-sm font-medium text-[#26241f] hover:text-[#b0922f] transition cursor-pointer">
                                Keluar
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="py-8 sm:py-10 px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                @yield('content')
            </div>
        </main>
    </body>
</html>

