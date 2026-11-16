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
    <body class="h-full bg-[#fbf8f0] text-[#26241f] font-sans antialiased selection:bg-[#b0922f]/20">
        <div class="min-h-full flex flex-col items-center justify-center p-4 sm:p-6 py-10 sm:py-14">
            <!-- Brand Logo Header -->
            <div class="flex items-center justify-center gap-2.5 mb-7">
                <div class="w-8 h-8 rounded-lg bg-[#b0922f] flex items-center justify-center text-[#26241f] shadow-xs">
                    <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="7" y1="4.5" x2="7" y2="19.5" />
                        <line x1="11.5" y1="4.5" x2="11.5" y2="19.5" />
                        <line x1="15.5" y1="4.5" x2="19.5" y2="19.5" />
                    </svg>
                </div>
                <span class="text-base font-semibold tracking-tight text-[#26241f]">Perpus Mini</span>
            </div>

            <!-- Card Content -->
            <div class="w-full max-w-[360px] bg-[#fffdf6] rounded-[28px] border border-[#f0ebd9] p-7 sm:p-8 shadow-[0_2px_16px_rgba(40,30,10,0.03)]">
                @yield('content')
            </div>
        </div>
    </body>
</html>

