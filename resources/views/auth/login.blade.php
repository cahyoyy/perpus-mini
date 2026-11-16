@extends('layouts.auth')

@section('title', 'Masuk - Perpus Mini')

@section('content')
    <div class="mb-4">
        <h1 class="text-3xl font-medium tracking-tight text-[#1f1e1a]">Masuk</h1>
        <p class="text-xs text-[#6b675e] mt-1">Masuk dengan email dan password kamu.</p>
    </div>

    <!-- Notice Banner -->
    <div class="mb-5 flex items-center gap-2.5 px-3.5 py-2.5 bg-[#efe3b8] rounded-xl text-[#776529]">
        <svg class="w-4 h-4 shrink-0 text-[#776529]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
        </svg>
        <span class="text-xs font-medium text-[#776529] leading-snug">
            Masuk dulu untuk membuka daftar buku.
        </span>
    </div>

    @if (session('status'))
        <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Field -->
        <div>
            <label for="email" class="block text-xs font-medium text-[#26241f] mb-1.5">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="nama@email.com"
                class="w-full px-3.5 py-2.5 bg-[#fbf8f0] border @error('email') border-red-400 focus:border-red-400 focus:ring-red-300 @else border-[#ded8cb] focus:border-[#b0922f] focus:ring-[#b0922f]/30 @enderror rounded-xl text-xs text-[#26241f] placeholder-[#a6a095] focus:outline-none focus:ring-2 transition"
            >
            @error('email')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password Field -->
        <div>
            <label for="password" class="block text-xs font-medium text-[#26241f] mb-1.5">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Masukkan password"
                class="w-full px-3.5 py-2.5 bg-[#fbf8f0] border @error('password') border-red-400 focus:border-red-400 focus:ring-red-300 @else border-[#ded8cb] focus:border-[#b0922f] focus:ring-[#b0922f]/30 @enderror rounded-xl text-xs text-[#26241f] placeholder-[#a6a095] focus:outline-none focus:ring-2 transition"
            >
            @error('password')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button
            type="submit"
            class="w-full mt-2 py-2.5 px-4 bg-[#b0922f] hover:bg-[#9f8226] active:bg-[#8f7420] text-[#26241f] font-semibold text-xs sm:text-sm rounded-xl transition shadow-xs cursor-pointer"
        >
            Masuk
        </button>
    </form>

    <div class="border-t border-[#f2ede0] my-5"></div>

    <p class="text-center text-xs text-[#78716c]">
        Belum punya akun?
        <a href="{{ route('register') }}" class="font-semibold text-[#846b1f] hover:underline">Daftar</a>
    </p>
@endsection

