<?php

namespace Tests\Feature;

use App\Models\Book;
use Database\Seeders\BookSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that seeder populates exactly 6 books with required columns.
     */
    public function test_book_seeder_populates_six_books(): void
    {
        $this->seed(BookSeeder::class);

        $this->assertDatabaseCount('books', 6);
        $this->assertDatabaseHas('books', [
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'tahun_terbit' => 2005,
            'tersedia' => true,
        ]);
        $this->assertDatabaseHas('books', [
            'judul' => 'Ronggeng Dukuh Paruk',
            'penulis' => 'Ahmad Tohari',
            'tahun_terbit' => 1982,
            'tersedia' => false,
        ]);
    }

    /**
     * Test listing books via controller index.
     */
    public function test_can_list_books(): void
    {
        Book::factory()->count(3)->create();

        $response = $this->get(route('books.index'));

        $response->assertOk();
        $response->assertJsonCount(3);
    }

    /**
     * Test creating a new book via controller store.
     */
    public function test_can_create_a_book(): void
    {
        $payload = [
            'judul' => 'Tenggelamnya Kapal Van der Wijck',
            'penulis' => 'Hamka',
            'tahun_terbit' => 1938,
            'tersedia' => true,
        ];

        $response = $this->post(route('books.store'), $payload);

        $response->assertStatus(201);
        $this->assertDatabaseHas('books', [
            'judul' => 'Tenggelamnya Kapal Van der Wijck',
            'penulis' => 'Hamka',
            'tahun_terbit' => 1938,
            'tersedia' => true,
        ]);
    }

    /**
     * Test reading a single book via controller show.
     */
    public function test_can_show_a_book(): void
    {
        $book = Book::factory()->create([
            'judul' => 'Atheis',
            'penulis' => 'Achdiat K. Mihardja',
        ]);

        $response = $this->get(route('books.show', $book));

        $response->assertOk();
        $response->assertJsonFragment([
            'judul' => 'Atheis',
            'penulis' => 'Achdiat K. Mihardja',
        ]);
    }

    /**
     * Test updating a book via controller update.
     */
    public function test_can_update_a_book(): void
    {
        $book = Book::factory()->create([
            'tersedia' => true,
        ]);

        $response = $this->put(route('books.update', $book), [
            'tersedia' => false,
        ]);

        $response->assertOk();
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'tersedia' => false,
        ]);
    }

    /**
     * Test deleting a book via controller destroy.
     */
    public function test_can_delete_a_book(): void
    {
        $book = Book::factory()->create();

        $response = $this->delete(route('books.destroy', $book));

        $response->assertOk();
        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);
    }
}
