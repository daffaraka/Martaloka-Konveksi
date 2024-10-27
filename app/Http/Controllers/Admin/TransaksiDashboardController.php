<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use App\Models\TransaksiCustomDesign;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TransaksiDashboardController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->filter; // Untuk filter status pembayaran
        $search = $request->search; // Untuk pencarian berdasarkan user atau produk
        $paginate = 10; // Tentukan jumlah item per halaman

        // Query dasar untuk transaksi
        $query = Transaksi::with(['user', 'detailTransaksi.produk']);

        // Pencarian
        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%'); // Pencarian berdasarkan nama user
            })
                ->orWhereHas('detailTransaksi.produk', function ($q) use ($search) {
                    $q->where('nama_produk', 'like', '%' . $search . '%'); // Pencarian berdasarkan nama produk
                });
        }

        // Filter status pembayaran
        if ($filter) {
            $query->where('status_pembayaran', $filter); // Filter berdasarkan status pembayaran
        }

        // Pagination
        $transaksi = $query->latest()->paginate($paginate);

        return view('admin.transaksi.transaksi-index', [
            'judul' => 'Data Transaksi',
            'transaksi' => $transaksi,
            'filter' => $filter,
            'search' => $search,
        ]);
        
    }


    public function show(Transaksi $transaksi)
    {
        // $transaksi = Transaksi::with(['user','detailTransaksi.produk'])->where('user_id',$transaksi->user_id)->find($transaksi->id);

        // dd($transaksi);

        return view('admin.transaksi.transaksi-detail', compact('transaksi'));
    }


    public function terima(Request $request)
    {
        $transaksi = Transaksi::find($request->id);
        $transaksi->update([
            'kurir' => $request->kurir,
            'no_resi' => $request->no_resi,
            'status_pembayaran' => 'Selesai'
        ]);
        return redirect()->back()->with('success', 'Transaksi Telah Diterima');
    }

    public function batal(Transaksi $transaksi)
    {
        // dd($transaksi);
        $transaksi->update(['status_pembayaran' => 'Dibatalkan']);
        return redirect()->back()->with('success', 'Transaksi Telah Diterima');
    }


    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->back()->with('success', 'Transaksi Telah dihapus');
    }


    public function riwayatTransaksi()
    {
        $transaksiSelesai = Transaksi::with(['user', 'detailTransaksi.produk'])->whereIn('status_pembayaran', ['Selesai', 'Dibatalkan'])->get();

        return view('admin.transaksi.transaksi-riwayat', compact('transaksiSelesai'));
    }

    public function riwayatTransaksiCustom()
    {
        $transaksiSelesai = TransaksiCustomDesign::with(['user', 'detailTransaksi.produk'])->where('status_pembayaran', 'Selesai')->get();

        return view('admin.transaksi.transaksi-riwayat', compact('transaksiSelesai'));
    }
}
