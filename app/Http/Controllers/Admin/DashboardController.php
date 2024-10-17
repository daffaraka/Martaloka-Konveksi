<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Produk;
use App\Models\TransaksiCustomDesign;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data dengan aggregate dalam satu query
        $data['jumlah_pengguna'] = User::count();
        $data['jumlah_produk'] = Produk::count();
        $data['jumlah_transaksiproduk'] = Transaksi::count();
        $data['jumlah_transaksicostum'] = TransaksiCustomDesign::count();

        return view('admin.dashboard', $data);
    }
}
