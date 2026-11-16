@extends('layouts.app')

@section('title', 'Tambah Buku - Perpus Mini')

@section('content')
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-1.5 text-xs text-[#78716c] mb-3">
        <a href="{{ route('books.index') }}" class="hover:text-[#26241f] transition">Daftar Buku</a>
        <span>/</span>
        <span class="font-medium text-[#26241f]">Tambah Buku</span>
    </nav>

    <!-- Page Title & Subtitle -->
    <div class="mb-6">
        <h1 class="text-3xl font-medium tracking-tight text-[#1f1e1a]">
            Tambah Buku
        </h1>
        <p class="text-xs sm:text-sm text-[#6b675e] mt-1">
            Isi data buku baru, lalu simpan.
        </p>
    </div>

    <!-- Form Card -->
    <div class="bg-[#fffdf6] rounded-2xl sm:rounded-3xl border border-[#f0ebd9] p-6 sm:p-8 max-w-xl shadow-[0_2px_16px_rgba(40,30,10,0.03)]">
        @if ($errors->any())
            <div class="mb-6 p-3.5 bg-[#fdf2f2] border border-[#f8d7da] rounded-xl flex items-center gap-2.5 text-xs font-medium text-[#991b1b]">
                <svg class="w-4 h-4 shrink-0 text-[#991b1b]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                <span>Ada {{ $errors->count() }} isian yang perlu diperbaiki sebelum buku disimpan.</span>
            </div>
        @endif

        <form method="POST" action="{{ route('books.store') }}" class="space-y-5">
            @csrf

            <!-- Field Judul -->
            <div>
                <label for="judul" class="block text-xs font-medium text-[#26241f] mb-1.5">
                    Judul
                </label>
                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul') }}"
                    placeholder="Contoh: Laskar Pelangi"
                    class="w-full px-3.5 py-2.5 bg-[#fbf8f0] border @error('judul') border-[#d9534f] focus:border-[#d9534f] focus:ring-1 focus:ring-[#d9534f] @else border-[#ded8cb] focus:border-[#b0922f] focus:ring-1 focus:ring-[#b0922f] @enderror rounded-xl text-xs sm:text-sm text-[#26241f] placeholder-[#a6a095] focus:outline-none transition"
                >
                @error('judul')
                    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-[#b91c1c]">
                        <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <!-- Field Penulis -->
            <div>
                <label for="penulis" class="block text-xs font-medium text-[#26241f] mb-1.5">
                    Penulis
                </label>
                <input
                    type="text"
                    id="penulis"
                    name="penulis"
                    value="{{ old('penulis') }}"
                    placeholder="Contoh: Andrea Hirata"
                    class="w-full px-3.5 py-2.5 bg-[#fbf8f0] border @error('penulis') border-[#d9534f] focus:border-[#d9534f] focus:ring-1 focus:ring-[#d9534f] @else border-[#ded8cb] focus:border-[#b0922f] focus:ring-1 focus:ring-[#b0922f] @enderror rounded-xl text-xs sm:text-sm text-[#26241f] placeholder-[#a6a095] focus:outline-none transition"
                >
                @error('penulis')
                    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-[#b91c1c]">
                        <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <!-- Field Tahun Terbit -->
            <div>
                <label for="tahun_terbit" class="block text-xs font-medium text-[#26241f] mb-1.5">
                    Tahun terbit
                </label>
                <input
                    type="text"
                    id="tahun_terbit"
                    name="tahun_terbit"
                    value="{{ old('tahun_terbit') }}"
                    placeholder="Contoh: 2005"
                    class="w-full px-3.5 py-2.5 bg-[#fbf8f0] border @error('tahun_terbit') border-[#d9534f] focus:border-[#d9534f] focus:ring-1 focus:ring-[#d9534f] @else border-[#ded8cb] focus:border-[#b0922f] focus:ring-1 focus:ring-[#b0922f] @enderror rounded-xl text-xs sm:text-sm text-[#26241f] placeholder-[#a6a095] focus:outline-none transition"
                >
                @error('tahun_terbit')
                    <div class="flex items-center gap-1.5 mt-1.5 text-xs text-[#b91c1c]">
                        <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <!-- Checkbox Tersedia -->
            <div class="p-3.5 sm:p-4 bg-[#fbf8f0] border border-[#ede7dc] rounded-xl">
                <label class="flex items-start gap-3 cursor-pointer select-none">
                    <input
                        type="checkbox"
                        name="tersedia"
                        value="1"
                        {{ old('tersedia', true) ? 'checked' : '' }}
                        class="mt-0.5 w-4.5 h-4.5 rounded border-[#ded8cb] accent-[#b0922f] cursor-pointer"
                    >
                    <div>
                        <span class="block text-xs font-semibold text-[#26241f]">
                            Tersedia untuk dipinjam
                        </span>
                        <span class="block text-[11px] text-[#78716c] mt-0.5">
                            Buku baru otomatis berstatus Tersedia.
                        </span>
                    </div>
                </label>
            </div>

            <!-- Tombol Aksi Form -->
            <div class="flex items-center gap-2.5 pt-2">
                <button
                    type="submit"
                    class="px-5 py-2.5 bg-[#b0922f] hover:bg-[#9f8226] active:bg-[#8f7420] text-[#26241f] font-semibold text-xs sm:text-sm rounded-xl transition shadow-xs cursor-pointer"
                >
                    Simpan
                </button>
                <a
                    href="{{ route('books.index') }}"
                    class="px-5 py-2.5 bg-[#fffdf6] hover:bg-[#fbf8f0] border border-[#ded8cb] text-[#26241f] font-medium text-xs sm:text-sm rounded-xl transition shadow-2xs"
                >
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection

