<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiProdukController extends Controller
{

    public function detailProduk(Produk $produk)
    {

        return view('home.detail-produk', compact('produk'));
    }


    public function addToCart(Produk $Produk)
    {
        $keranjang = new Keranjang();
        $qty = 1;
        $user_id = Auth::user()->id;
        // dd($keranjang->where('user_id', $user_id)->where('produk_id', $Produk->id)->where('status', 'Di Keranjang')->exists());
        if ($keranjang->where('user_id', $user_id)->where('produk_id', $Produk->id)->where('status', 'Di Keranjang')->exists()) {
            $keranjang->where('user_id', $user_id)->where('status', 'Di Keranjang')->where('produk_id', $Produk->id)->increment('qty', $qty);
        } else {

            $keranjang->produk_id = $Produk->id;
            $keranjang->user_id = $user_id;
            $keranjang->qty = $qty;
            $keranjang->status = 'Di Keranjang';
            $keranjang->save();
        }

        return to_route('home.keranjang');
    }
}
