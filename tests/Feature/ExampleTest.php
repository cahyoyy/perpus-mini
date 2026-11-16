<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Test that the landing page renders with all sections and links.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Perpus Mini');
        $response->assertSee('Atur koleksi dan');
        $response->assertSee('peminjaman buku dalam');
        $response->assertSee('satu aplikasi.');
        $response->assertSee('Mulai Sekarang');
        $response->assertSee('Masuk');
        $response->assertSee(route('register'));
        $response->assertSee(route('login'));
        $response->assertSee('Dari katalog sampai riwayat peminjaman.');
        $response->assertSee('Pekerjaan pustakawan jadi lebih ringan.');
        $response->assertSee('Dari akun baru sampai peminjaman pertama.');
        $response->assertSee('Pertanyaan yang sering muncul.');
        $response->assertSee('Mulai rapikan perpustakaanmu hari ini.');
    }
}
