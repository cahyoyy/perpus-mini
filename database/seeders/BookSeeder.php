<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'tahun_terbit' => 2005,
                'tersedia' => true,
            ],
            [
                'judul' => 'Bumi Manusia',
                'penulis' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => 1980,
                'tersedia' => true,
            ],
            [
                'judul' => 'Negeri 5 Menara',
                'penulis' => 'Ahmad Fuadi',
                'tahun_terbit' => 2009,
                'tersedia' => false,
            ],
            [
                'judul' => 'Filosofi Kopi',
                'penulis' => 'Dee Lestari',
                'tahun_terbit' => 2006,
                'tersedia' => true,
            ],
            [
                'judul' => 'Cantik Itu Luka',
                'penulis' => 'Eka Kurniawan',
                'tahun_terbit' => 2002,
                'tersedia' => true,
            ],
            [
                'judul' => 'Ronggeng Dukuh Paruk',
                'penulis' => 'Ahmad Tohari',
                'tahun_terbit' => 1982,
                'tersedia' => false,
            ],
        ];

        foreach ($books as $book) {
            Book::firstOrCreate(
                [
                    'judul' => $book['judul'],
                    'penulis' => $book['penulis'],
                ],
                $book
            );
        }
    }
}
