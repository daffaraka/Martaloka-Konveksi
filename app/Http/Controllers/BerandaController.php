<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{

    public function index()
    {

        $data['products'] = Produk::with('kategori')->get();

        // dd(Auth::user());
        return view('home.homepage', $data);
    }


    public function detailProduk(Produk $produk)
    {

        return view('home.detail-produk', compact('produk'));
    }


    public function addToCart(Produk $Produk)
    {
        $keranjang = new Keranjang();

        $keranjang->user_id = auth()->user()->id;
        $keranjang->produk_id = $Produk->id;
        $keranjang->qty = 1;
        $keranjang->save();


        return to_route('home.keranjang');
    }


    public function keranjang()
    {
        $user_id = Auth::user()->id;
        $keranjangs = Keranjang::with(['produk.kategori','user'])->where('user_id',$user_id)->get();



        return view('home.keranjang',compact('keranjangs'));
    }
}
