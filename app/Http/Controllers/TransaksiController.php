<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with(['user','detailTransaksi.produk'])->get();
        return view('admin.transaksi.transaksi-index',compact('transaksi'));
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi = Transaksi::with(['user','detailTransaksi.produk'])->where('user_id',$transaksi->user_id)->first();

        // dd($transaksi);

        return view('admin.transaksi.transaksi-detail',compact('transaksi'));
    }


    public function dibayar(Transaksi $transaksi)
    {
        $transaksi->update(['status' => 'Selesai']);
        return redirect()->back()->with('success','Transaksi Telah Diterima');
    }

    public function batal(Transaksi $transaksi)
    {
        $transaksi->update(['status' => 'Dibatalkan']);
        return redirect()->back()->with('success','Transaksi Telah Diterima');
    }


    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->back()->with('success','Transaksi Telah dihapus');
    }
}
