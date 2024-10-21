<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class ResponseController extends Controller
{


    public function detailTransaksi($id)
    {
        $transaksi = Transaksi::with('detailTransaksi')->find($id);

        return response()->json($transaksi);
    }
}
