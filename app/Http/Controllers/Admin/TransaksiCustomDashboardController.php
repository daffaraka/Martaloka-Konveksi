<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomDesign;
use App\Models\TransaksiCustomDesign;
use Illuminate\Http\Request;

class TransaksiCustomDashboardController extends Controller
{
    public function index(Request $request)
    {

        $filter = $request->filter; // Filter berdasarkan status pembayaran
        $search = $request->search; // Pencarian berdasarkan nama user
        $paginate = 10; // Jumlah item per halaman
    
        // Query dasar untuk transaksi custom
        $query = TransaksiCustomDesign::with(['user', 'sizes', 'designs']);
    


       // Pencarian berdasarkan nama user
    if ($search) {
        $query->whereHas('user', function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        });
    }

    // Filter status pembayaran
    if ($filter) {
        $query->where('status_pembayaran', $filter);
    }

    // Pagination
    $transaksi = $query->latest()->paginate($paginate);

    return view('admin.custom-design.transaksi-custom-index', [
        'judul' => 'Daftar Transaksi Custom Design',
        'transaksi' => $transaksi,
        'filter' => $filter,
        'search' => $search,
    ]);
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
        $transaksiSelesai = TransaksiCustomDesign::with(['user','sizes','designs'])->whereIn('status_pembayaran', ['Selesai','Dibatalkan'])->get();

        return view('admin.custom-design.transaksi-custom-riwayat', [
            'judul' => 'Riwayat Transaksi Custom',
            'transaksiSelesai' => $transaksiSelesai
        ]);
    }


}
