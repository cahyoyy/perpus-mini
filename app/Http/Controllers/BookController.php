<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse|View
    {
        $books = Book::all();

        if ($request->wantsJson() || ! view()->exists('books.index')) {
            return response()->json($books);
        }

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): JsonResponse|View
    {
        if (! view()->exists('books.create')) {
            return response()->json([
                'message' => 'Form tambah buku belum tersedia.',
            ]);
        }

        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'tahun_terbit' => ['required', 'integer'],
            'tersedia' => ['sometimes', 'boolean'],
        ]);

        $book = Book::create($validated);

        return response()->json($book, 201);
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
    public function edit(Book $book): JsonResponse|View
    {
        if (! view()->exists('books.edit')) {
            return response()->json([
                'message' => 'Form edit buku belum tersedia.',
                'book' => $book,
            ]);
        }

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book): JsonResponse
    {
        $validated = $request->validate([
            'judul' => ['sometimes', 'required', 'string', 'max:255'],
            'penulis' => ['sometimes', 'required', 'string', 'max:255'],
            'tahun_terbit' => ['sometimes', 'required', 'integer'],
            'tersedia' => ['sometimes', 'boolean'],
        ]);

        $book->update($validated);

        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): JsonResponse
    {
        $book->delete();

        return response()->json([
            'message' => 'Buku berhasil dihapus.',
        ]);
    }
}
