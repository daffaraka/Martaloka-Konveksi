<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            [
                'nama_kategori' => 'Polo',

            ],
            [
                'nama_kategori' => 'Jersey',

            ],
            [
                'nama_kategori' => 'V Neck',

            ],
            [
                'nama_kategori' => 'Hoodie',

            ],
            [
                'nama_kategori' => 'Kemeja',

            ],
            [
                'nama_kategori' => 'Tanktop',

            ],
            [
                'nama_kategori' => 'Sweatshirt',

            ],
            [
                'nama_kategori' => 'Kaos',

            ],
            [
                'nama_kategori' => 'Striped Shirt',

            ],
        ]);
    }
}
