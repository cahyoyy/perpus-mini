@extends('layouts.app')

@section('title', 'Daftar Buku - Perpus Mini')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-3xl font-medium tracking-tight text-[#1f1e1a]">
                Daftar Buku
            </h1>
            <p class="text-xs sm:text-sm text-[#6b675e] mt-1">
                {{ $books->count() }} buku di koleksi. {{ $books->where('tersedia', true)->count() }} tersedia, {{ $books->where('tersedia', false)->count() }} dipinjam.
            </p>
        </div>

        <div>
            <a
                href="{{ route('books.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#b0922f] hover:bg-[#9f8226] active:bg-[#8f7420] text-[#26241f] font-semibold text-xs sm:text-sm rounded-xl transition shadow-xs cursor-pointer"
            >
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Tambah Buku
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-5 p-3.5 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-medium rounded-xl flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Table Card -->
    <div class="bg-[#fffdf6] rounded-2xl sm:rounded-3xl border border-[#f0ebd9] overflow-hidden shadow-[0_2px_16px_rgba(40,30,10,0.03)]">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[#f2ede0]">
                        <th scope="col" class="px-5 sm:px-6 py-4 text-[11px] font-semibold tracking-wider text-[#8a857b] uppercase">
                            Judul
                        </th>
                        <th scope="col" class="px-4 sm:px-5 py-4 text-[11px] font-semibold tracking-wider text-[#8a857b] uppercase">
                            Penulis
                        </th>
                        <th scope="col" class="px-4 sm:px-5 py-4 text-[11px] font-semibold tracking-wider text-[#8a857b] uppercase">
                            Tahun
                        </th>
                        <th scope="col" class="px-4 sm:px-5 py-4 text-[11px] font-semibold tracking-wider text-[#8a857b] uppercase">
                            Status
                        </th>
                        <th scope="col" class="px-5 sm:px-6 py-4 text-[11px] font-semibold tracking-wider text-[#8a857b] uppercase text-right">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#f2ede0]">
                    @forelse ($books as $book)
                        <tr class="hover:bg-[#faf6eb]/50 transition">
                            <!-- Judul -->
                            <td class="px-5 sm:px-6 py-4 text-sm font-semibold text-[#1f1e1a]">
                                {{ $book->judul }}
                            </td>

                            <!-- Penulis -->
                            <td class="px-4 sm:px-5 py-4 text-xs sm:text-sm text-[#57534e]">
                                {{ $book->penulis }}
                            </td>

                            <!-- Tahun -->
                            <td class="px-4 sm:px-5 py-4 text-xs sm:text-sm text-[#57534e]">
                                {{ $book->tahun_terbit }}
                            </td>

                            <!-- Status -->
                            <td class="px-4 sm:px-5 py-4">
                                @if ($book->tersedia)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-[#efe3b8] text-[#776529]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#776529]"></span>
                                        Tersedia
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-[#ede7dc] text-[#78716c]">
                                        <span class="w-1.5 h-1.5 rounded-full border border-[#78716c]"></span>
                                        Dipinjam
                                    </span>
                                @endif
                            </td>

                            <!-- Aksi -->
                            <td class="px-5 sm:px-6 py-4 text-right whitespace-nowrap">
                                <div class="inline-flex items-center justify-end gap-1.5 sm:gap-2">
                                    <!-- Tombol Ubah status -->
                                    <button
                                        type="button"
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-[#fffdf6] hover:bg-[#fbf8f0] border border-[#ded8cb] rounded-xl text-xs font-medium text-[#26241f] transition shadow-2xs cursor-pointer"
                                    >
                                        <svg class="w-3.5 h-3.5 text-[#57534e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="1" y="5" width="22" height="14" rx="7" ry="7" />
                                            <circle cx="8" cy="12" r="3" />
                                        </svg>
                                        Ubah status
                                    </button>

                                    <!-- Tombol Ubah -->
                                    <a
                                        href="{{ route('books.edit', $book) }}"
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-[#fffdf6] hover:bg-[#fbf8f0] border border-[#ded8cb] rounded-xl text-xs font-medium text-[#26241f] transition shadow-2xs cursor-pointer"
                                    >
                                        <svg class="w-3.5 h-3.5 text-[#57534e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 20h9" />
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                                        </svg>
                                        Ubah
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button
                                        type="button"
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-[#fffdf6] hover:bg-[#fbf8f0] border border-[#ded8cb] rounded-xl text-xs font-medium text-[#26241f] transition shadow-2xs cursor-pointer"
                                    >
                                        <svg class="w-3.5 h-3.5 text-[#57534e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-xs sm:text-sm text-[#78716c]">
                                Belum ada buku di koleksi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

