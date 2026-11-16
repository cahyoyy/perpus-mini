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
     * Test create page can be rendered by authenticated user.
     */
    public function test_can_render_create_book_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('books.create'));

        $response->assertOk();
        $response->assertViewIs('books.create');
        $response->assertSee('Tambah Buku');
        $response->assertSee('Isi data buku baru, lalu simpan.');
        $response->assertSee('Judul');
        $response->assertSee('Penulis');
        $response->assertSee('Tahun terbit');
        $response->assertSee('Tersedia untuk dipinjam');
        $response->assertSee('Buku baru otomatis berstatus Tersedia.');
        $response->assertSee('Simpan');
        $response->assertSee('Batal');
    }

    /**
     * Test creating a new book via form submission and redirect.
     */
    public function test_can_create_a_book_via_form(): void
    {
        $user = User::factory()->create();
        $payload = [
            'judul' => 'Tenggelamnya Kapal Van der Wijck',
            'penulis' => 'Hamka',
            'tahun_terbit' => '1938',
            'tersedia' => '1',
        ];

        $response = $this->actingAs($user)->post(route('books.store'), $payload);

        $response->assertRedirect(route('books.index'));
        $response->assertSessionHas('success', 'Buku berhasil ditambahkan.');
        $this->assertDatabaseHas('books', [
            'judul' => 'Tenggelamnya Kapal Van der Wijck',
            'penulis' => 'Hamka',
            'tahun_terbit' => 1938,
            'tersedia' => true,
        ]);
    }

    /**
     * Test creating a new book with tersedia unchecked (false).
     */
    public function test_can_create_a_book_with_tersedia_false(): void
    {
        $user = User::factory()->create();
        $payload = [
            'judul' => 'Catatan Seorang Demonstran',
            'penulis' => 'Soe Hok Gie',
            'tahun_terbit' => '1983',
        ];

        $response = $this->actingAs($user)->post(route('books.store'), $payload);

        $response->assertRedirect(route('books.index'));
        $this->assertDatabaseHas('books', [
            'judul' => 'Catatan Seorang Demonstran',
            'penulis' => 'Soe Hok Gie',
            'tahun_terbit' => 1983,
            'tersedia' => false,
        ]);
    }

    /**
     * Test validation failure on create with Indonesian messages.
     */
    public function test_store_validation_errors(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->from(route('books.create'))
            ->post(route('books.store'), [
                'judul' => '',
                'penulis' => '',
                'tahun_terbit' => 'dua ribu lima',
            ]);

        $response->assertRedirect(route('books.create'));
        $response->assertSessionHasErrors([
            'judul' => 'Judul wajib diisi.',
            'penulis' => 'Penulis wajib diisi.',
            'tahun_terbit' => 'Tahun terbit harus berupa angka.',
        ]);
    }

    /**
     * Test creating a new book via JSON API.
     */
    public function test_can_create_a_book_json(): void
    {
        $user = User::factory()->create();
        $payload = [
            'judul' => 'Gadis Pantai',
            'penulis' => 'Pramoedya Ananta Toer',
            'tahun_terbit' => 1982,
            'tersedia' => true,
        ];

        $response = $this->actingAs($user)->postJson(route('books.store'), $payload);

        $response->assertStatus(201);
        $this->assertDatabaseHas('books', [
            'judul' => 'Gadis Pantai',
            'penulis' => 'Pramoedya Ananta Toer',
            'tahun_terbit' => 1982,
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
     * Test edit page can be rendered by authenticated user.
     */
    public function test_can_render_edit_book_page(): void
    {
        $user = User::factory()->create();
        $book = Book::factory()->create([
            'judul' => 'Negeri 5 Menara',
            'penulis' => 'Ahmad Fuadi',
            'tahun_terbit' => 2009,
            'tersedia' => false,
        ]);

        $response = $this->actingAs($user)->get(route('books.edit', $book));

        $response->assertOk();
        $response->assertViewIs('books.edit');
        $response->assertSee('Ubah Buku');
        $response->assertSee('Perbarui data buku, lalu simpan perubahannya.');
        $response->assertSee('Negeri 5 Menara');
        $response->assertSee('Ahmad Fuadi');
        $response->assertSee('2009');
        $response->assertSee('Hapus centang jika buku sedang dipinjam.');
        $response->assertSee('Simpan Perubahan');
        $response->assertSee('Batal');
    }

    /**
     * Test updating a book via form submission and redirect.
     */
    public function test_can_update_a_book_via_form(): void
    {
        $user = User::factory()->create();
        $book = Book::factory()->create([
            'judul' => 'Buku Lama',
            'penulis' => 'Penulis Lama',
            'tahun_terbit' => 2000,
            'tersedia' => false,
        ]);

        $response = $this->actingAs($user)->put(route('books.update', $book), [
            'judul' => 'Buku Baru',
            'penulis' => 'Penulis Baru',
            'tahun_terbit' => '2024',
            'tersedia' => '1',
        ]);

        $response->assertRedirect(route('books.index'));
        $response->assertSessionHas('success', 'Buku berhasil diperbarui.');
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'judul' => 'Buku Baru',
            'penulis' => 'Penulis Baru',
            'tahun_terbit' => 2024,
            'tersedia' => true,
        ]);
    }

    /**
     * Test validation failure on update with Indonesian messages.
     */
    public function test_update_validation_errors(): void
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $response = $this->actingAs($user)
            ->from(route('books.edit', $book))
            ->put(route('books.update', $book), [
                'judul' => '',
                'penulis' => '',
                'tahun_terbit' => '',
            ]);

        $response->assertRedirect(route('books.edit', $book));
        $response->assertSessionHasErrors([
            'judul' => 'Judul wajib diisi.',
            'penulis' => 'Penulis wajib diisi.',
            'tahun_terbit' => 'Tahun terbit wajib diisi.',
        ]);
    }

    /**
     * Test updating a book via JSON API.
     */
    public function test_can_update_a_book_json(): void
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
