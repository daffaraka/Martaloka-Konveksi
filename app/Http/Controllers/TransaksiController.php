<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiCustomDesign;
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
        // $transaksi = Transaksi::with(['user','detailTransaksi.produk'])->where('user_id',$transaksi->user_id)->find($transaksi->id);

        // dd($transaksi);

        return view('admin.transaksi.transaksi-detail',compact('transaksi'));
    }


    public function dibayar(Transaksi $transaksi)
    {
        $transaksi->update(['status_pembayaran' => 'Selesai']);
        return redirect()->back()->with('success','Transaksi Telah Diterima');
    }

    public function batal(Transaksi $transaksi)
    {
        // dd($transaksi);
        $transaksi->update(['status_pembayaran' => 'Dibatalkan']);
        return redirect()->back()->with('success','Transaksi Telah Diterima');
    }


    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->back()->with('success','Transaksi Telah dihapus');
    }


    public function riwayatTransaksi()
    {
        $transaksiSelesai = Transaksi::with(['user','detailTransaksi.produk'])->where('status_pembayaran', 'Selesai')->get();

        return view('admin.transaksi.transaksi-riwayat',compact('transaksiSelesai'));
    }

    public function riwayatTransaksiCustom()
    {
        $transaksiSelesai = TransaksiCustomDesign::with(['user','detailTransaksi.produk'])->where('status_pembayaran', 'Selesai')->get();

        return view('admin.transaksi.transaksi-riwayat',compact('transaksiSelesai'));
    }
}
