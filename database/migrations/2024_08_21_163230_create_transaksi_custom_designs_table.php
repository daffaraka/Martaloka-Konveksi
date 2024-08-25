<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_custom_designs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_pemesan');
            $table->string('alamat_pemesan');
            $table->string('email_pemesan');
            $table->string('nomor_hp_pemesan');
            $table->string('catatan')->nullable();
            $table->integer('total_pesanan');
            $table->enum('status_pembayaran', ['Pending', 'Diterima', 'Dibayar', 'Dibatalkan']);
            $table->integer('total_harga')->nullable();
            $table->string('metode_bayar')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_custom_designs');
    }
};
