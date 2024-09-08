<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiProduk;
use Illuminate\Support\Facades\Auth;

class TransaksiProdukController extends Controller
{

    public function detailProduk(Produk $produk)
    {

        return view('home.detail-produk', compact('produk'));
    }

    public function keranjang()
    {
        $user_id = Auth::user()->id;
        $keranjangs = Keranjang::with(['produk.kategori', 'user'])->where('status', 'Di Keranjang')->where('user_id', $user_id)->get();

        // dd(($keranjangs));
        return view('home.pembelian-produk.keranjang', compact('keranjangs'));
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



    public function checkout(Request $request)
    {


        if ($request->has('id_')) {
            $keranjangs = Keranjang::with(['produk.kategori', 'user'])->whereIn('id', $request->id_)->update(['status' => 'Dalam Transaksi']);
            $newKeranjang =  Keranjang::with(['produk.kategori', 'user'])->whereIn('id', $request->id_)->get();
        } else {
            $keranjangs = Keranjang::with(['produk.kategori', 'user'])->where('user_id', Auth::user()->id)->update(['status' => 'Dalam Transaksi']);
            $newKeranjang =  Keranjang::with(['produk.kategori', 'user'])->where('user_id', Auth::user()->id)->get();
        }

        $total_harga = 0;


        foreach ($newKeranjang as $item) {
            $price = $item->qty * $item->produk->harga_produk;
            $total_harga += $price;
        }


        $transaksi = new Transaksi();
        $transaksi->user_id = Auth::user()->id;
        $transaksi->status_pembayaran = 'Pending';
        $transaksi->total_harga = $total_harga;
        $transaksi->save();

        // dd($keranjangs[0]->produk->id);


        foreach ($newKeranjang as $cart) {
            $transaksiProduk = new TransaksiProduk();
            $transaksiProduk->transaksi_id = $transaksi->id;
            $transaksiProduk->produk_id = $cart->produk->id;
            $transaksiProduk->total_price = $cart->produk->harga_produk * $cart->qty;
            $transaksiProduk->qty = $cart->qty;
            $transaksiProduk->save();
        }


        return to_route('home.formLengkapiTransaksi', ['transaksi' => $transaksi]);
    }


    public function formLengkapiPembelian(Transaksi $transaksi)
    {
        $transaksi =  $transaksi->with(['detailTransaksi.produk.kategori', 'user'])->where('id', $transaksi->id)->first();

        return view('home.pembelian-produk.formulir-pembelian-produk', compact('transaksi'));
    }


    public function storeDataTransaksi(Request $request, Transaksi $transaksi)
    {

        // dd($request->all());
        $transaksi->update([
            'user_id' => Auth::id(), // atau gunakan $request->user_id jika ada
            'nama_pemesan' => $request->nama_pemesan,
            'alamat_pemesan' => $request->alamat_pemesan,
            'email_pemesan' => $request->Email_pemesan,
            'nomor_hp_pemesan' => $request->nomor_hp_pemesan,
            'catatan' => $request->catatan,
            'status_pembayaran' => 'Pending', // Atur status default sebagai 'Pending'
            'metode_bayar' => 'Bank Transfer', // Misalkan metode pembayaran default
        ]);



        return to_route('home.formUploadBuktiTransaksiPembelian', ['transaksi' => $transaksi]);
    }



    public function formUploadBuktiTransaksiPembelian(Transaksi $transaksi)
    {
        $transaksi =  $transaksi->with(['detailTransaksi.produk.kategori', 'user'])->where('id', $transaksi->id)->first();

        return view('home.pembelian-produk.formulir-pembayaran-produk', compact('transaksi'));
    }



    public function uploadBuktiTransaksi(Request $request, Transaksi $transaksi)
    {
        $transaksi = $transaksi->with('user')->where('id', $transaksi->id)->first();
        $file = $request->file('bukti_pembayaran');
        $fileName = $file->getClientOriginalName();
        $time = now()->format('Y-m-d H-i-s');
        $fileSaved = 'Bukti Pembayaran' . '-' . $transaksi->user->name . '-' . $time . $fileName;
        $file->move('bukti_pembayaran', $fileSaved);


        $transaksi->with(['detailTransaksi.produk', 'user'])->where('id', $transaksi->id)->first();
        $transaksi->bukti_pembayaran = $fileSaved;
        $transaksi->status_pembayaran = 'Diterima';
        $transaksi->save();


        return redirect()->back();
    }
}
