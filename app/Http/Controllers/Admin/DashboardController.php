<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DashboardExport;
use App\Models\Produk;
use App\Models\RevenueExport;
use App\Models\Transaksi;
use App\Models\TransaksiCustomDesign;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\PDF; // Tambahkan ini

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month', null);

        // Atur tanggal mulai dan akhir berdasarkan tahun dan bulan yang dipilih
        if ($month) {
            $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
            $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();
        } else {
            $startDate = Carbon::createFromDate($year)->startOfYear();
            $endDate = Carbon::createFromDate($year)->endOfYear();
        }

        $data['jumlah_pengguna'] = User::count();
        $data['jumlah_produk'] = Produk::count();
        $data['jumlah_transaksiproduk'] = Transaksi::count();
        $data['jumlah_transaksicostum'] = TransaksiCustomDesign::count();

        // Tambahkan data transaksi terbaru
        $data['transaksi_terbaru'] = Transaksi::with(['user', 'detailTransaksi.produk'])
            ->latest()
            ->take(5)
            ->get();

        // Get regular transactions with revenue (only completed transactions)
        $regularTransactions = Transaksi::where('status_pembayaran', 'Selesai')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('SUM(total_harga) as revenue, COUNT(*) as count, DATE_FORMAT(created_at, "%b %Y") as month, YEAR(created_at) as year, MONTH(created_at) as month_num')
            ->groupBy('year', 'month_num', 'month')
            ->orderBy('year')
            ->orderBy('month_num')
            ->get();

        // Get custom transactions with revenue (only completed transactions)
        $customTransactions = TransaksiCustomDesign::where('status_pembayaran', 'Selesai')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('SUM(total_harga) as revenue, COUNT(*) as count, DATE_FORMAT(created_at, "%b %Y") as month, YEAR(created_at) as year, MONTH(created_at) as month_num')
            ->groupBy('year', 'month_num', 'month')
            ->orderBy('year')
            ->orderBy('month_num')
            ->get();

        // Get all transactions for transaction count (regardless of status)
        $allRegularTransactions = Transaksi::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%b %Y") as month, YEAR(created_at) as year, MONTH(created_at) as month_num')
            ->groupBy('year', 'month_num', 'month')
            ->orderBy('year')
            ->orderBy('month_num')
            ->get();

        $allCustomTransactions = TransaksiCustomDesign::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%b %Y") as month, YEAR(created_at) as year, MONTH(created_at) as month_num')
            ->groupBy('year', 'month_num', 'month')
            ->orderBy('year')
            ->orderBy('month_num')
            ->get();

        // Initialize period arrays
        $period = [];
        for ($i = 1; $i <= 12; $i++) {
            $date = Carbon::createFromDate($year, $i, 1);
            $key = $date->format('M');
            $period[$key] = 0;
        }

        // Prepare data arrays
        $transactionsPeriod = $period;
        $customTransactionsPeriod = $period;
        $revenuePeriod = $period;
        $customRevenuePeriod = $period;

        // Fill regular transaction count data (all transactions)
        foreach ($allRegularTransactions as $transaction) {
            $month = Carbon::parse($transaction->month)->format('M');
            $transactionsPeriod[$month] = $transaction->count;
        }

        // Fill custom transaction count data (all transactions)
        foreach ($allCustomTransactions as $transaction) {
            $month = Carbon::parse($transaction->month)->format('M');
            $customTransactionsPeriod[$month] = $transaction->count;
        }

        // Fill revenue data (only completed transactions)
        foreach ($regularTransactions as $transaction) {
            $month = Carbon::parse($transaction->month)->format('M');
            $revenuePeriod[$month] = $transaction->revenue;
        }

        foreach ($customTransactions as $transaction) {
            $month = Carbon::parse($transaction->month)->format('M');
            $customRevenuePeriod[$month] = $transaction->revenue;
        }

        // Prepare final data arrays
        $data['labels'] = array_keys($period);
        $data['produkData'] = array_values($transactionsPeriod);
        $data['customData'] = array_values($customTransactionsPeriod);
        $data['revenueData'] = array_values($revenuePeriod);
        $data['customRevenueData'] = array_values($customRevenuePeriod);

        // Calculate totals
        $data['totalProduk'] = array_sum($data['produkData']);
        $data['totalCustom'] = array_sum($data['customData']);

        // Calculate total revenue (only from completed transactions)
        $data['totalRevenue'] = Transaksi::where('status_pembayaran', 'Selesai')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('total_harga');

        $data['totalCustomRevenue'] = TransaksiCustomDesign::where('status_pembayaran', 'Selesai')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('total_harga');

        $data['selectedYear'] = $year;
        $data['selectedMonth'] = $month;

        return view('admin.dashboard', $data);
    }

    public function exportRevenuePdf(Request $request)
    {
        // Ambil tahun dan bulan dari request
        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month');
        
        // Persiapkan data berdasarkan filter
        $data = $this->prepareRevenueData($request);
        
        // Tambahkan informasi periode ke data
        $data['period'] = $month 
            ? Carbon::createFromDate($year, $month, 1)->format('F Y')
            : "Tahun " . $year;
            
        // Load view dengan data yang telah difilter
        $pdf = PDF::loadView('admin.dashboard.revenue-pdf', $data);
        
        // Generate nama file yang sesuai dengan periode
        $filename = 'revenue-report-' . ($month 
            ? strtolower(Carbon::createFromDate($year, $month, 1)->format('F-Y'))
            : $year) . '.pdf';
            
        return $pdf->download($filename);
    }
public function exportRevenueExcel(Request $request)
{
    $data = $this->prepareRevenueData($request);

    return Excel::download(new DashboardExport($data), 'revenue-report.xlsx');
}

protected function prepareRevenueData(Request $request)
{
    $year = $request->input('year', Carbon::now()->year);
    $month = $request->input('month', null);

    if ($month) {
        // Convert month name to number if it's a string
        if (!is_numeric($month)) {
            $month = date('m', strtotime("01 $month 2000"));
        }
        
        // Validate month is between 1 and 12
        $month = (int)$month;
        if ($month < 1 || $month > 12) {
            throw new \InvalidArgumentException('Month must be between 1 and 12');
        }

        $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();
    } else {
        $startDate = Carbon::createFromDate($year)->startOfYear();
        $endDate = Carbon::createFromDate($year)->endOfYear();
    }

    // Ambil data transaksi dan hitung pendapatan
    $regularTransactions = Transaksi::where('status_pembayaran', 'Selesai')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->selectRaw('SUM(total_harga) as revenue, DATE_FORMAT(created_at, "%b %Y") as month, YEAR(created_at) as year, MONTH(created_at) as month_num')
        ->groupBy('year', 'month_num', 'month')
        ->orderBy('year')
        ->orderBy('month_num')
        ->get();

    return $regularTransactions;
}
}