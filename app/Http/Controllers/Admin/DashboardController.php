<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use Carbon\Carbon;
use App\Models\TransaksiCustomDesign;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request)
{
    $year = $request->input('year', Carbon::now()->year); 
    $startDate = Carbon::createFromDate($year)->startOfYear();
    $endDate = Carbon::createFromDate($year)->endOfYear();

    $data['jumlah_pengguna'] = User::count();
    $data['jumlah_produk'] = Produk::count();
    $data['jumlah_transaksiproduk'] = Transaksi::count();
    $data['jumlah_transaksicostum'] = TransaksiCustomDesign::count();

    // Tambahkan data transaksi terbaru
    $data['transaksi_terbaru'] = Transaksi::with(['user', 'detailTransaksi.produk'])
                                    ->latest()
                                    ->take(10)
                                    ->get();

    // Initialize arrays for regular transactions
    $regularTransactions = Transaksi::whereBetween('created_at', [$startDate, $endDate])
        ->selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%b %Y") as month, YEAR(created_at) as year, MONTH(created_at) as month_num')
        ->groupBy('year', 'month_num', 'month')
        ->orderBy('year')
        ->orderBy('month_num')
        ->get();

    // Initialize arrays for custom transactions
    $customTransactions = TransaksiCustomDesign::whereBetween('created_at', [$startDate, $endDate])
        ->selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%b %Y") as month, YEAR(created_at) as year, MONTH(created_at) as month_num')
        ->groupBy('year', 'month_num', 'month')
        ->orderBy('year')
        ->orderBy('month_num')
        ->get();

   // Prepare data arrays
    $labels = [];
    $produkData = [];
    $customData = [];

    $period = [];
    for ($i = 1; $i <= 12; $i++) {
        $date = Carbon::createFromDate($year, $i, 1); 
        $key = $date->format('M'); 
        $period[$key] = 0;
    }


    // Fill regular transaction data, match by month only
    foreach ($regularTransactions as $transaction) {
        $month = Carbon::parse($transaction->month . ' ' . $transaction->year)->format('M');
        $period[$month] = $transaction->count;
    }

    // Convert period to final arrays
    $data['labels'] = array_keys($period);
    $data['produkData'] = array_values($period);

    // Reset period for custom transactions
    $period = array_fill_keys(array_keys($period), 0);

    // Fill custom transaction data, match by month only
    foreach ($customTransactions as $transaction) {
        $month = Carbon::parse($transaction->month . ' ' . $transaction->year)->format('M');
        $period[$month] = $transaction->count;
    }

    $data['customData'] = array_values($period);

    // Calculate totals for pie chart
    $data['totalProduk'] = array_sum($data['produkData']);
    $data['totalCustom'] = array_sum($data['customData']);

    // Pass the selected year to the view (no need to include it in the chart labels)
    $data['selectedYear'] = $year;

    return view('admin.dashboard', $data);

    }

    }