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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status_pembayaran', ['Dalam Transaksi', 'Belum Dibayar', 'Dibayar','Diterima', 'Selesai','Dibatalkan']);
            $table->string('nama_pemesan')->nullable();
            $table->string('alamat_pemesan')->nullable();
            $table->string('email_pemesan')->nullable();
            $table->string('nomor_hp_pemesan')->nullable();
            $table->string('catatan')->nullable();
            $table->integer('total_harga');
            $table->string('metode_bayar')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->dateTime('tgl_bayar')->nullable();
            $table->dateTime('tgl_kadaluarsa')->nullable();
            $table->text('no_resi')->nullable();
            $table->string('kurir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
