@extends('layouts.auth')

@section('title', 'Sambutan - Perpus Mini')

@section('content')
    <div class="text-center py-2">
        <!-- Avatar Badge -->
        <div class="w-16 h-16 rounded-full bg-[#efe3b8] text-[#776529] mx-auto flex items-center justify-center text-xl font-bold mb-4 shadow-xs">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>

        <h1 class="text-2xl font-bold tracking-tight text-[#1f1e1a]">
            Selamat Datang!
        </h1>
        <p class="text-lg font-medium text-[#b0922f] mt-1">
            {{ $user->name }}
        </p>
        <p class="text-xs text-[#78716c] mt-0.5">
            {{ $user->email }}
        </p>

        <!-- Welcome Message Box -->
        <div class="my-6 p-3.5 bg-[#efe3b8]/60 border border-[#e3d4a0] rounded-xl text-xs text-[#776529] leading-relaxed">
            Akun kamu berhasil terhubung. Selamat datang di <strong>Perpus Mini</strong>!
        </div>

        <div class="border-t border-[#f2ede0] my-5"></div>

        <!-- Tombol Keluar (Logout) -->
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button
                type="submit"
                class="w-full py-2.5 px-4 bg-[#b0922f] hover:bg-[#9f8226] active:bg-[#8f7420] text-[#26241f] font-semibold text-xs sm:text-sm rounded-xl transition shadow-xs flex items-center justify-center gap-2 cursor-pointer"
            >
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                Keluar
            </button>
        </form>
    </div>
@endsection

