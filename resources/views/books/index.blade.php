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
                                    <form method="POST" action="{{ route('books.toggle-status', $book) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-[#fffdf6] hover:bg-[#fbf8f0] border border-[#ded8cb] rounded-xl text-xs font-medium text-[#26241f] transition shadow-2xs cursor-pointer"
                                            title="Ubah status ketersediaan"
                                        >
                                            <svg class="w-3.5 h-3.5 text-[#57534e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="1" y="5" width="22" height="14" rx="7" ry="7" />
                                                <circle cx="8" cy="12" r="3" />
                                            </svg>
                                            Ubah status
                                        </button>
                                    </form>

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
                                        class="btn-delete-book inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-[#fffdf6] hover:bg-[#fbf8f0] border border-[#ded8cb] rounded-xl text-xs font-medium text-[#26241f] transition shadow-2xs cursor-pointer"
                                        data-title="{{ $book->judul }}"
                                        data-action="{{ route('books.destroy', $book) }}"
                                        title="Hapus buku"
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

    <!-- Modal Konfirmasi Hapus -->
    <div
        id="delete-modal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-xs p-4 transition-opacity"
        aria-hidden="true"
    >
        <div
            class="bg-[#fffdf6] rounded-3xl border border-[#f0ebd9] p-6 sm:p-8 max-w-lg w-full shadow-[0_12px_40px_rgba(0,0,0,0.12)] transform transition-all"
            role="dialog"
            aria-modal="true"
            aria-labelledby="delete-modal-title"
        >
            <div class="flex items-start gap-4 sm:gap-5">
                <!-- Icon Badge -->
                <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-[#efe3b8] flex items-center justify-center shrink-0 text-[#776529]">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-[#776529]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                    </svg>
                </div>

                <!-- Content -->
                <div class="flex-1 pt-0.5">
                    <h3 id="delete-modal-title" class="text-xl sm:text-2xl font-bold tracking-tight text-[#1f1e1a]">
                        Hapus buku ini?
                    </h3>
                    <p id="delete-modal-description" class="text-xs sm:text-sm text-[#57534e] mt-2 leading-relaxed">
                        Buku <span id="delete-book-title" class="font-normal text-[#1f1e1a]"></span> akan dihapus dari koleksi. Kamu tidak bisa membatalkan penghapusan ini.
                    </p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 mt-7">
                <button
                    type="button"
                    id="btn-cancel-delete"
                    class="px-5 sm:px-6 py-2.5 bg-[#fffdf6] hover:bg-[#fbf8f0] border border-[#ded8cb] text-[#26241f] font-semibold text-xs sm:text-sm rounded-xl transition shadow-2xs cursor-pointer"
                >
                    Batal
                </button>
                <form id="delete-form" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="px-5 sm:px-6 py-2.5 bg-[#26241f] hover:bg-black active:bg-neutral-900 text-white font-semibold text-xs sm:text-sm rounded-xl transition shadow-xs cursor-pointer"
                    >
                        Ya, hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Script Modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('delete-modal');
            const deleteForm = document.getElementById('delete-form');
            const bookTitleSpan = document.getElementById('delete-book-title');
            const btnCancel = document.getElementById('btn-cancel-delete');

            function openModal(title, actionUrl) {
                bookTitleSpan.textContent = title;
                deleteForm.action = actionUrl;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            }

            function closeModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }

            document.querySelectorAll('.btn-delete-book').forEach(function (button) {
                button.addEventListener('click', function () {
                    const title = this.getAttribute('data-title');
                    const action = this.getAttribute('data-action');
                    openModal(title, action);
                });
            });

            if (btnCancel) {
                btnCancel.addEventListener('click', closeModal);
            }

            modal.addEventListener('click', function (e) {
                if (e.target === modal) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        });
    </script>
@endsection
