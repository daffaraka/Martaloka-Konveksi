<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Baju Biru',
                'deskripsi' => 'Baju yang dibuat dengan warna biru.',
                'harga_produk' => 1500000,
                'stok' => 10,
                'gambar_produk' => 'baju_biru.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Baju Merah',
                'deskripsi' => 'Baju yang dibuat dengan warna Merah.',
                'harga_produk' => 1500000,
                'stok' => 10,
                'gambar_produk' => 'baju_Merah.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Baju Merah',
                'deskripsi' => 'Baju yang dibuat dengan warna Merah.',
                'harga_produk' => 1500000,
                'stok' => 10,
                'gambar_produk' => 'baju_Merah.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
