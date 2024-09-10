<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomDesign;
use App\Models\TransaksiCustomDesign;
use Illuminate\Http\Request;

class TransaksiCustomDashboardController extends Controller
{
    public function index()
    {
        $data['transaksi'] = TransaksiCustomDesign::with(['user','sizes','designs'])->get();
        $data['judul'] = 'Daftar Custom Design';
        return view('admin.custom-design.transaksi-custom-index',$data);
    }

    public function show(TransaksiCustomDesign $transaksi)
    {
        // $transaksi = Transaksi::with(['user','detailTransaksi.produk'])->where('user_id',$transaksi->user_id)->find($transaksi->id);

        // dd($transaksi);

        return view('admin.custom-design.transaksi-custom-detail',compact('transaksi'));
    }


    public function dibayar(TransaksiCustomDesign $transaksi)
    {
        $transaksi->update(['status_pembayaran' => 'Selesai']);
        return redirect()->back()->with('success','Transaksi Telah Diterima');
    }

    public function batal(TransaksiCustomDesign $transaksi)
    {
        // dd($transaksi);
        $transaksi->update(['status_pembayaran' => 'Dibatalkan']);
        return redirect()->back()->with('success','Transaksi Telah Diterima');
    }


    public function destroy(TransaksiCustomDesign $transaksi)
    {
        $transaksi->delete();
        return redirect()->back()->with('success','Transaksi Telah dihapus');
    }


    public function riwayatTransaksi()
    {
        $transaksiSelesai = TransaksiCustomDesign::with(['user','detailTransaksi.produk'])->whereIn('status_pembayaran', ['Selesai','Dibatalkan'])->get();

        return view('admin.custom-design.transaksi-custom-riwayat',compact('transaksiSelesai'));
    }

    public function riwayatTransaksiCustom()
    {
        $transaksiSelesai = TransaksiCustomDesign::with(['user','detailTransaksi.produk'])->where('status_pembayaran', 'Selesai')->get();

        return view('admin.custom-design.transaksi-custom-riwayat',compact('transaksiSelesai'));
    }
}
