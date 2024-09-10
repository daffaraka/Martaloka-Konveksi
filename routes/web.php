<?php

use Illuminate\Support\Facades\Route;

// Admin
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Admin\ProgressPembelianController;
// use App\Http\Controllers\Admin\TransaksiController;

// Frontend
use App\Http\Controllers\Admin\TransaksiDashboardController;
use App\Http\Controllers\Frontend\TransaksiProdukController;
use App\Http\Controllers\Admin\TransaksiCustomDashboardController;
use App\Http\Controllers\Frontend\TransaksiCustomDesignController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/kategori/{kategori:nama_kategori}', [BerandaController::class, 'kategori'])->name('home.kategori');
Route::get('/detail-produk/{produk}', [BerandaController::class, 'detailProduk'])->name('home.detail-produk');
Route::view('kontak', 'home.kontak')->name('home.kontak');
Route::view('tentang-kami', 'home.tentang-kami')->name('home.tentang-kami');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Transaksi pembelian
    Route::get('add-to-cart/{produk}', [TransaksiProdukController::class, 'addToCart'])->name('home.addToCart');
    Route::get('keranjang', [TransaksiProdukController::class, 'keranjang'])->name('home.keranjang');
    Route::post('checkout', [TransaksiProdukController::class, 'checkout'])->name('home.checkout');
    Route::get('lengkapi-transaksi-pembelian/{transaksi}', [TransaksiProdukController::class, 'formLengkapiPembelian'])->name('home.formTransaksiPembelian');
    Route::get('pembayaran-transaksi-pembelian/{transaksi}', [BerandaController::class, 'formLengkapiTransaksi'])->name('home.formLengkapiTransaksi');
    Route::post('pembayaran-transaksi-pembelian/{transaksi}/store', [TransaksiProdukController::class, 'storeDataTransaksi'])->name('home.storeDataTransaksi');
    Route::get('form-upload-transaksi-pembelian/{transaksi}', [TransaksiProdukController::class, 'formUploadBuktiTransaksiPembelian'])->name('home.formUploadBuktiTransaksiPembelian');
    Route::post('upload-bukti-transaksi/{transaksi}/upload-bukti', [TransaksiProdukController::class, 'uploadBuktiTransaksi'])->name('home.uploadBuktiTransaksi');


    // Custom Design
    Route::get('daftar-custom', [TransaksiCustomDesignController::class, 'daftarCustom'])->name('home.daftarCustom');
    Route::get('custom-design', [TransaksiCustomDesignController::class, 'createDesign'])->name('home.createDesign');
    Route::post('kirim-design', [TransaksiCustomDesignController::class, 'storeDesign'])->name('home.storeDesign');
    Route::get('pembayaran-custom-design/{transaksiCustomDesign}', [TransaksiCustomDesignController::class, 'formPembayaranTransaksiCustom'])->name('home.formPembayaranTransaksiCustom');
    Route::post('pembayaran-custom-design/{transaksiCustomDesign}/upload-bukti', [TransaksiCustomDesignController::class, 'uploadBuktiCustomDesign'])->name('home.uploadBuktiCustomDesign');
    // Route::get('custom-design', [TransaksiCustomDesignController::class, 'createDesign'])->name('home.createDesign');

    // Dashboard Admin
    Route::prefix('dashboard')->group(function () {
        Route::view('/', 'admin.layout')->name('dashboard');

        // Kategori
        Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
        Route::post('kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('kategori/edit/{kategori}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::post('kategori/update/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::get('kategori/destroy/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
        // Produk
        Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('produk/store', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::post('produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::get('produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

        // Transaksi
        Route::get('transaksi', [TransaksiDashboardController::class, 'index'])->name('transaksi.index');
        Route::get('tansaksi/create', [TransaksiDashboardController::class, 'create'])->name('transaksi.create');
        Route::post('transaksi/store', [TransaksiDashboardController::class, 'store'])->name('transaksi.store');
        Route::get('transaksi/show/{transaksi}', [TransaksiDashboardController::class, 'show'])->name('transaksi.show');
        Route::get('transaksi/terima/{transaksi}', [TransaksiDashboardController::class, 'dibayar'])->name('transaksi.dibayar');
        Route::get('transaksi/tolak/{transaksi}', [TransaksiDashboardController::class, 'batal'])->name('transaksi.batal');
        Route::get('transaksi-produk/riwayat-transaksi', [TransaksiDashboardController::class, 'riwayatTransaksi'])->name('transaksi.riwayatTransaksi');


        Route::get('transaksi-custom', [TransaksiCustomDashboardController::class, 'index'])->name('transaksiCustom.index');
        Route::get('transaksi-custom/create', [TransaksiCustomDashboardController::class, 'create'])->name('transaksiCustom.create');
        Route::post('transaksi-custom/store', [TransaksiCustomDashboardController::class, 'store'])->name('transaksiCustom.store');
        Route::get('transaksi-custom/show/{transaksi}', [TransaksiCustomDashboardController::class, 'show'])->name('transaksiCustom.show');
        Route::get('transaksi-custom/terima/{transaksi}', [TransaksiCustomDashboardController::class, 'dibayar'])->name('transaksiCustom.dibayar');
        Route::get('transaksi-custom/tolak/{transaksi}', [TransaksiCustomDashboardController::class, 'batal'])->name('transaksiCustom.batal');
        Route::get('transaksi-custom-produk/riwayat-transaksi', [TransaksiCustomDashboardController::class, 'riwayatTransaksi'])->name('transaksiCustom.riwayatTransaksi');


        // Kategori
        Route::prefix('progress-pembelian')->controller(ProgressPembelianController::class)->group(function () {
            Route::get('/', 'index')->name('progress-pembelian.index');
            Route::get('/create/{transaksi}', 'create')->name('progress-pembelian.create');
            Route::post('/store/{transaksi}', 'store')->name('progress-pembelian.store');
            Route::get('/show/{progress_pembelian}', 'show')->name('progress-pembelian.show');
            Route::get('/edit/{progress_pembelian}', 'edit')->name('progress-pembelian.edit');
            Route::post('/update/{progress_pembelian}', 'update')->name('progress-pembelian.update');
            Route::get('/destroy/{progress_pembelian}', 'destroy')->name('progress-pembelian.destroy');
        });

        Route::resource('users', UserController::class);
    });
});




require __DIR__ . '/auth.php';
