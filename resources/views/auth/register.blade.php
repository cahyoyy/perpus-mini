@extends('layouts.auth')

@section('title', 'Daftar - Perpus Mini')

@section('content')
    <div class="mb-5">
        <h1 class="text-3xl font-medium tracking-tight text-[#1f1e1a]">Daftar</h1>
        <p class="text-xs text-[#6b675e] mt-1">Buat akun baru untuk mengelola koleksi buku.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Nama Field -->
        <div>
            <label for="name" class="block text-xs font-medium text-[#26241f] mb-1.5">Nama</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                placeholder="Nama lengkap"
                class="w-full px-3.5 py-2.5 bg-[#fbf8f0] border @error('name') border-red-400 focus:border-red-400 focus:ring-red-300 @else border-[#ded8cb] focus:border-[#b0922f] focus:ring-[#b0922f]/30 @enderror rounded-xl text-xs text-[#26241f] placeholder-[#a6a095] focus:outline-none focus:ring-2 transition"
            >
            @error('name')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Field -->
        <div>
            <label for="email" class="block text-xs font-medium text-[#26241f] mb-1.5">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
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
                autocomplete="new-password"
                placeholder="Buat password"
                class="w-full px-3.5 py-2.5 bg-[#fbf8f0] border @error('password') border-red-400 focus:border-red-400 focus:ring-red-300 @else border-[#ded8cb] focus:border-[#b0922f] focus:ring-[#b0922f]/30 @enderror rounded-xl text-xs text-[#26241f] placeholder-[#a6a095] focus:outline-none focus:ring-2 transition"
            >
            <p class="text-[11px] text-[#78716c] mt-1">Minimal 8 karakter.</p>
            @error('password')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Konfirmasi Password Field -->
        <div>
            <label for="password_confirmation" class="block text-xs font-medium text-[#26241f] mb-1.5">Konfirmasi password</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Ulangi password"
                class="w-full px-3.5 py-2.5 bg-[#fbf8f0] border border-[#ded8cb] focus:border-[#b0922f] focus:ring-[#b0922f]/30 rounded-xl text-xs text-[#26241f] placeholder-[#a6a095] focus:outline-none focus:ring-2 transition"
            >
        </div>

        <!-- Submit Button -->
        <button
            type="submit"
            class="w-full mt-2 py-2.5 px-4 bg-[#b0922f] hover:bg-[#9f8226] active:bg-[#8f7420] text-[#26241f] font-semibold text-xs sm:text-sm rounded-xl transition shadow-xs cursor-pointer"
        >
            Daftar
        </button>
    </form>

    <div class="border-t border-[#f2ede0] my-5"></div>

    <p class="text-center text-xs text-[#78716c]">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="font-semibold text-[#846b1f] hover:underline">Masuk</a>
    </p>
@endsection

