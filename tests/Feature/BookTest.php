<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Database\Seeders\BookSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that guests cannot access books list and are redirected to login.
     */
    public function test_guests_cannot_access_books_index(): void
    {
        $response = $this->get(route('books.index'));

        $response->assertRedirect(route('login'));
    }

    /**
     * Test that seeder populates exactly 6 books with required columns matching the design.
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
            'judul' => 'Bumi Manusia',
            'penulis' => 'Pramoedya A. Toer',
            'tahun_terbit' => 1980,
            'tersedia' => true,
        ]);
        $this->assertDatabaseHas('books', [
            'judul' => 'Negeri 5 Menara',
            'penulis' => 'Ahmad Fuadi',
            'tahun_terbit' => 2009,
            'tersedia' => false,
        ]);
        $this->assertDatabaseHas('books', [
            'judul' => 'Sang Pemimpi',
            'penulis' => 'Andrea Hirata',
            'tahun_terbit' => 2006,
            'tersedia' => true,
        ]);
        $this->assertDatabaseHas('books', [
            'judul' => 'Perahu Kertas',
            'penulis' => 'Dee Lestari',
            'tahun_terbit' => 2009,
            'tersedia' => false,
        ]);
        $this->assertDatabaseHas('books', [
            'judul' => 'Ayat-Ayat Cinta',
            'penulis' => 'Habiburrahman El Shirazy',
            'tahun_terbit' => 2004,
            'tersedia' => true,
        ]);
    }

    /**
     * Test authenticated users can view books index blade view with correct elements.
     */
    public function test_authenticated_user_can_view_books_page(): void
    {
        $user = User::factory()->create([
            'name' => 'Ahmad Dahlan',
            'email' => 'ahmad@example.com',
        ]);

        $this->seed(BookSeeder::class);

        $response = $this->actingAs($user)->get(route('books.index'));

        $response->assertOk();
        $response->assertViewIs('books.index');
        $response->assertSee('Perpus Mini');
        $response->assertSee('Daftar Buku');
        $response->assertSee('Tambah Buku');
        $response->assertSee('Keluar');
        $response->assertSee('AD'); // initials
        $response->assertSee('6 buku di koleksi. 4 tersedia, 2 dipinjam.');
        $response->assertSee('Laskar Pelangi');
        $response->assertSee('Andrea Hirata');
        $response->assertSee('Tersedia');
        $response->assertSee('Dipinjam');
        $response->assertSee('Ubah status');
        $response->assertSee('Ubah');
        $response->assertSee('Hapus');
    }

    /**
     * Test listing books via controller index with JSON header.
     */
    public function test_can_list_books_json(): void
    {
        $user = User::factory()->create();
        Book::factory()->count(3)->create();

        $response = $this->actingAs($user)->getJson(route('books.index'));

        $response->assertOk();
        $response->assertJsonCount(3);
    }

    /**
     * Test create endpoint returns response.
     */
    public function test_can_access_create(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('books.create'));

        $response->assertOk();
    }

    /**
     * Test creating a new book via controller store.
     */
    public function test_can_create_a_book(): void
    {
        $user = User::factory()->create();
        $payload = [
            'judul' => 'Tenggelamnya Kapal Van der Wijck',
            'penulis' => 'Hamka',
            'tahun_terbit' => 1938,
            'tersedia' => true,
        ];

        $response = $this->actingAs($user)->postJson(route('books.store'), $payload);

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
        $user = User::factory()->create();
        $book = Book::factory()->create([
            'judul' => 'Atheis',
            'penulis' => 'Achdiat K. Mihardja',
        ]);

        $response = $this->actingAs($user)->getJson(route('books.show', $book));

        $response->assertOk();
        $response->assertJsonFragment([
            'judul' => 'Atheis',
            'penulis' => 'Achdiat K. Mihardja',
        ]);
    }

    /**
     * Test edit endpoint returns response.
     */
    public function test_can_access_edit(): void
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $response = $this->actingAs($user)->get(route('books.edit', $book));

        $response->assertOk();
    }

    /**
     * Test updating a book via controller update.
     */
    public function test_can_update_a_book(): void
    {
        $user = User::factory()->create();
        $book = Book::factory()->create([
            'tersedia' => true,
        ]);

        $response = $this->actingAs($user)->putJson(route('books.update', $book), [
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
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $response = $this->actingAs($user)->deleteJson(route('books.destroy', $book));

        $response->assertOk();
        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);
    }
}
