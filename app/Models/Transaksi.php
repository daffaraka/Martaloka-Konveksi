<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'status_pembayaran',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(TransaksiProduk::class, 'transaksi_id');
    }
}
