<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiProduk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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


    public function addToCart(Produk $Produk, Request $request)
    {

        $failsStatus = [];


        // Cek stok
        if ($Produk->stok < $request->qty) {
            $failsStatus = [
                'nama_produk' => $Produk->nama_produk,
                'stok_tersedia' => $Produk->stok,
                'qty_dipesan' => $request->qty
            ];
        }


        // Jika ada produk yang stoknya tidak mencukupi
        if (!empty($failsStatus)) {
            return redirect()->back()->with('errors', $failsStatus);
        }
        // dd($request->all());
        $keranjang = new Keranjang();
        $qty = $request->qty ?? 1;
        $user_id = Auth::user()->id;
        // dd($keranjang->where('user_id', $user_id)->where('produk_id', $Produk->id)->where('status', 'Di Keranjang')->exists());
        if ($keranjang->where('user_id', $user_id)->where('produk_id', $Produk->id)->where('status', 'Di Keranjang')->exists()) {
            $keranjang->where('user_id', $user_id)->where('status', 'Di Keranjang')->where('produk_id', $Produk->id)->increment('qty', $qty);
        } else {

            $keranjang->produk_id = $Produk->id;
            $keranjang->user_id = $user_id;
            $keranjang->qty = $qty;
            $keranjang->status = 'Di Keranjang';
            $keranjang->size = $request->size;
            $keranjang->save();
        }

        return to_route('home.keranjang');
    }



    public function checkout(Request $request)
    {
        $total_harga = 0;


        // if ($request->has('id_')) {
        //     $newKeranjang =  Keranjang::with(['produk.kategori', 'user'])->whereIn('id', array_keys($request->produk_id))->get();
        // } else {

        //     $newKeranjang =  Keranjang::with(['produk.kategori', 'user'])->where('user_id', Auth::user()->id)->get();
        // }



        // Cek jika produk ada di transaksi
        $productExist = Keranjang::with(['produk.kategori', 'user', 'produk' => function ($query) use ($request) {
            $query->whereIn('id', array_keys($request->produk_id));
        }])
            ->where('status', 'Di Keranjang')
            ->where('user_id', Auth::user()->id);

        $productExistCheck = $productExist->get();



        try {
            DB::beginTransaction();

            // Jika request punya yang di checkbox
            if ($request->has('id_')) {
                $newKeranjang =  Keranjang::with(['produk.kategori', 'user'])->whereIn('id', $request->id_)->where('user_id', Auth::user()->id)->get();
            } else {
                // Jika tidak
                $newKeranjang =  Keranjang::with(['produk.kategori', 'user'])->where('user_id', Auth::user()->id)->get();
            }



            // if ($productExistCheck->isNotEmpty()) {
            //     foreach ($request->produk_id as $keyProduk => $productQty) {
            //         $addedProduct = Keranjang::where('status', 'Di Keranjang')->where('produk_id', $keyProduk)->where('user_id', Auth::user()->id)->first();
            //         $addedProduct->qty += $productQty;
            //         $addedProduct->status = 'Dalam Transaksi';
            //         $addedProduct->save();
            //     }
            // }



            foreach ($newKeranjang as $item) {
                $price = $item->qty * $item->produk->harga_produk;
                $total_harga += $price;
            }


            $transaksi = new Transaksi();
            $transaksi->user_id = Auth::user()->id;
            $transaksi->status_pembayaran = 'Dalam Transaksi';
            $transaksi->total_harga = $total_harga;
            $transaksi->save();


            foreach ($newKeranjang as $cart) {
                $transaksiProduk = new TransaksiProduk();
                $transaksiProduk->transaksi_id = $transaksi->id;
                $transaksiProduk->produk_id = $cart->produk->id;
                $transaksiProduk->total_price = $cart->produk->harga_produk * $cart->qty;
                $transaksiProduk->qty = $cart->qty;
                $transaksiProduk->size = $cart->size;
                $transaksiProduk->save();
            }

            DB::commit();
            return to_route('home.formTransaksiPembelian', ['transaksi' => $transaksi]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat melakukan checkout.');
        }
    }


    public function formLengkapiPembelian(Transaksi $transaksi)
    {
        $transaksi =  $transaksi->with(['detailTransaksi.produk.kategori', 'user'])->where('id', $transaksi->id)->first();

        return view('home.pembelian-produk.formulir-pembelian-produk', compact('transaksi'));
    }


    public function storeDataTransaksi(Request $request, Transaksi $transaksi)
    {

        $transaksi->update([
            'user_id' => Auth::id(), // atau gunakan $request->user_id jika ada
            'nama_pemesan' => $request->nama_pemesan,
            'alamat_pemesan' => $request->alamat_pemesan,
            'email_pemesan' => $request->email_pemesan,
            'nomor_hp_pemesan' => $request->nomor_hp_pemesan,
            'catatan' => $request->catatan,
            'status_pembayaran' => 'Dalam Transaksi', // Atur status default sebagai 'Dalam Transaksi'
            'metode_bayar' => $request->metode_bayar, // Misalkan metode pembayaran default
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
        $transaksi->status_pembayaran = 'Dibayar';
        $transaksi->save();


        return redirect()->back();
    }


    public function daftarTransaksiPembelian()
    {
        $data['judul'] = 'Daftar transaksi pembelian anda';

        $data['transaksis'] = Transaksi::with(['detailTransaksi.produk', 'user','progress'])->where('user_id', Auth::id())->get();
        // dd($data['transaksis']);
        return view('home.pembelian-produk.transaksi', $data);
    }
}
