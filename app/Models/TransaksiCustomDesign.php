<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiCustomDesign extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'kategori_id',
        'user_id',
        'nama_pemesan',
        'alamat_pemesan',
        'email_pemesan',
        'nomor_hp_pemesan',
        'catatan',
        'total_pesanan',
        'status_pembayaran',
        'total_harga',
        'metode_bayar',
        'bukti_pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }


    public function sizes()
    {
        return $this->hasOne(SizeCustomDesign::class);
    }

    public function designs()
    {
        return $this->hasMany(CustomDesign::class);
    }
}