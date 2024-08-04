<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $kategori = Kategori::pluck('id')->toArray();

        DB::table('produks')->insert([
            [
                'nama_produk' => 'Baju Biru',
                'kategori_id' => $kategori[array_rand($kategori)],
                'deskripsi' => 'Baju yang dibuat dengan warna biru.',
                'harga_produk' => 1500000,
                'stok' => 10,
                'gambar_produk' => 'baju_biru.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kaos ini itu',
                'kategori_id' => $kategori[array_rand($kategori)],
                'deskripsi' => 'Baju yang dibuat dengan warna mencolok.',
                'harga_produk' => 1500000,
                'stok' => 10,
                'gambar_produk' => 'baju_Merah.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kaos Polos',
                'kategori_id' => $kategori[array_rand($kategori)],
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
