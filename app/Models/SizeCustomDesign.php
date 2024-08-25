<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeCustomDesign extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'transaksi_custom_design_id',
        'co_s',
        'co_m',
        'co_l',
        'co_xl',
        'co_xxl',
        'ce_s',
        'ce_m',
        'ce_l',
        'ce_xl',
        'ce_xxl',
    ];

}
