<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse|View
    {
        $books = Book::all();

        if ($request->wantsJson()) {
            return response()->json($books);
        }

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'tahun_terbit' => ['required', 'integer'],
            'tersedia' => ['nullable'],
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'judul.string' => 'Judul harus berupa teks.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'penulis.required' => 'Penulis wajib diisi.',
            'penulis.string' => 'Penulis harus berupa teks.',
            'penulis.max' => 'Penulis maksimal 255 karakter.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
        ]);

        $validated['tersedia'] = $request->boolean('tersedia');

        $book = Book::create($validated);

        if ($request->wantsJson()) {
            return response()->json($book, 201);
        }

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Book $book): JsonResponse|View
    {
        if ($request->wantsJson() || ! view()->exists('books.show')) {
            return response()->json($book);
        }

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book): JsonResponse|RedirectResponse
    {
        $isJson = $request->wantsJson();

        $validated = $request->validate([
            'judul' => [$isJson ? 'sometimes' : 'required', 'string', 'max:255'],
            'penulis' => [$isJson ? 'sometimes' : 'required', 'string', 'max:255'],
            'tahun_terbit' => [$isJson ? 'sometimes' : 'required', 'integer'],
            'tersedia' => ['nullable'],
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'judul.string' => 'Judul harus berupa teks.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'penulis.required' => 'Penulis wajib diisi.',
            'penulis.string' => 'Penulis harus berupa teks.',
            'penulis.max' => 'Penulis maksimal 255 karakter.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
        ]);

        if ($request->has('tersedia') || ! $isJson) {
            $validated['tersedia'] = $request->boolean('tersedia');
        }

        $book->update($validated);

        if ($isJson) {
            return response()->json($book);
        }

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Book $book): JsonResponse|RedirectResponse
    {
        $book->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Buku berhasil dihapus.',
            ]);
        }

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
