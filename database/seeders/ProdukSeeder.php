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

        // Array produk yang akan diinsert
        $produks = [
            [
                'nama_produk' => 'Baju Biru',
                'deskripsi' => 'Baju yang dibuat dengan warna biru.',
                'harga_produk' => 1500000,
                'stok' => 10,
                'gambar_produk' => 'baju_biru.jpg',
            ],
            [
                'nama_produk' => 'Kaos ini itu',
                'deskripsi' => 'Baju yang dibuat dengan warna mencolok.',
                'harga_produk' => 1500000,
                'stok' => 10,
                'gambar_produk' => 'baju_Merah.jpg',
            ],
            [
                'nama_produk' => 'Kaos Polos',
                'deskripsi' => 'Baju yang dibuat dengan warna merah.',
                'harga_produk' => 1500000,
                'stok' => 10,
                'gambar_produk' => 'baju_Merah.jpg',
            ],
        ];

        $inserts = [];

        // Pastikan setiap kategori memiliki minimal 1 produk
        foreach ($kategori as $kategori_id) {
            $produk = $produks[array_rand($produks)]; // Pilih produk secara acak
            $produk['kategori_id'] = $kategori_id;
            $produk['created_at'] = now();
            $produk['updated_at'] = now();
            $inserts[] = $produk;
        }

        // Insert produk yang sudah dikumpulkan ke dalam database
        DB::table('produks')->insert($inserts);
    }
}
