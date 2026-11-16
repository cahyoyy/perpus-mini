<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Masuk');
        $response->assertSee('Masuk dengan email dan password kamu.');
        $response->assertSee('Masuk dulu untuk membuka daftar buku.');
        $response->assertSee('Belum punya akun?');
        $response->assertSee('Perpus Mini');
    }

    public function test_register_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('Daftar');
        $response->assertSee('Buat akun baru untuk mengelola koleksi buku.');
        $response->assertSee('Minimal 8 karakter.');
        $response->assertSee('Sudah punya akun?');
        $response->assertSee('Perpus Mini');
    }

    public function test_new_users_can_register_and_are_redirected_to_books(): void
    {
        $response = $this->post('/register', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
        ]);

        $user = User::where('email', 'budi@example.com')->first();
        $this->assertNotNull($user);
        $this->assertTrue(Hash::check('password123', $user->password));

        $response->assertRedirect(route('books.index'));
    }

    public function test_registration_fails_when_password_less_than_8_characters(): void
    {
        $response = $this->post('/register', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => '1234567',
            'password_confirmation' => '1234567',
        ]);

        $response->assertSessionHasErrors(['password']);
        $this->assertGuest();
        $this->assertDatabaseMissing('users', [
            'email' => 'budi@example.com',
        ]);
    }

    public function test_registration_fails_when_password_confirmation_does_not_match(): void
    {
        $response = $this->post('/register', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => 'password123',
            'password_confirmation' => 'different123',
        ]);

        $response->assertSessionHasErrors(['password']);
        $this->assertGuest();
    }

    public function test_registration_fails_when_email_already_exists(): void
    {
        User::factory()->create([
            'email' => 'budi@example.com',
        ]);

        $response = $this->post('/register', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_users_can_authenticate_using_the_login_screen_and_redirect_to_books(): void
    {
        $user = User::factory()->create([
            'email' => 'siti@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'siti@example.com',
            'password' => 'password123',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('books.index'));
    }

    public function test_users_cannot_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'email' => 'siti@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'siti@example.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_dashboard_cannot_be_accessed_by_guests(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect(route('login'));
    }

    public function test_dashboard_can_be_accessed_by_authenticated_users(): void
    {
        $user = User::factory()->create([
            'name' => 'Dewi Lestari',
            'email' => 'dewi@example.com',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Selamat Datang!');
        $response->assertSee('Dewi Lestari');
        $response->assertSee('dewi@example.com');
        $response->assertSee('Keluar');
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_users_are_redirected_from_guest_routes(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect(route('books.index'));

        $response = $this->actingAs($user)->get('/register');
        $response->assertRedirect(route('books.index'));
    }
}
