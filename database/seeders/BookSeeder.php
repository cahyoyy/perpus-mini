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
                'penulis' => 'Pramoedya A. Toer',
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
                'judul' => 'Sang Pemimpi',
                'penulis' => 'Andrea Hirata',
                'tahun_terbit' => 2006,
                'tersedia' => true,
            ],
            [
                'judul' => 'Perahu Kertas',
                'penulis' => 'Dee Lestari',
                'tahun_terbit' => 2009,
                'tersedia' => false,
            ],
            [
                'judul' => 'Ayat-Ayat Cinta',
                'penulis' => 'Habiburrahman El Shirazy',
                'tahun_terbit' => 2004,
                'tersedia' => true,
            ],
        ];

        foreach ($books as $book) {
            Book::updateOrCreate(
                [
                    'judul' => $book['judul'],
                ],
                $book
            );
        }
    }
}
