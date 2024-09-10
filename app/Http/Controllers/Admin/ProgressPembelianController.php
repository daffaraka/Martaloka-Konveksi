<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProgressPembelian;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProgressPembelianController extends Controller
{
    public function index()
    {

        $data['judul'] = 'Progres Transaksi Pembelian';
        $data['transaksi'] = Transaksi::with('progress')->where('status_pembayaran', 'Diterima')->get();

        return view('admin.progress-pembelian.pembelian-index', $data);
    }

    public function create(Transaksi $transaksi)
    {

        $data['judul'] = 'Progres Transaksi Pembelian';
        $data['transaksi'] = $transaksi;
        return view('admin.progress-pembelian.pembelian-create', $data);
    }


    public function store(Request $request, $transaksi)
    {
        $file = $request->file('gambar_progress');
        $fileName = $file->getClientOriginalName();
        $time = now()->format('Y-m-d H-i-s');
        $fileSaved = $request->nama_produk . '-' . $time . $fileName;
        $file->move('progress_pembelian', $fileSaved);

        $progress = new ProgressPembelian();
        $progress->nama_produk = $request->nama_produk;
        $progress->kategori_id = $request->kategori_id;
        $progress->deskripsi = $request->deskripsi;
        $progress->harga_produk = $request->harga_produk;
        $progress->stok = $request->stok;
        $progress->gambar_produk = $fileSaved;
        $progress->save();


        return redirect()->route('produk.index');
    }

    public function show(Produk $Produk)
    {
        //
    }


    public function edit($id)
    {
        $data['produk'] = Produk::find($id);
        $data['kategori'] = Kategori::select('id', 'nama_kategori')->get();
        return view('admin.progress-pembelian.pembelian-edit ', $data);
    }


    public function update(Request $request, $id)

    {
        $Produk = Produk::find($id);


        $file = '';
        $time = now()->format('Y-m-d H-i-s');

        if ($request->has('gambar_produk')) {
            $file = $request->file('gambar_produk');
            $fileName = $file->getClientOriginalName();
            $fileSaved = $request->nama_produk . '-' . $time . $fileName;
            if (File::exists('produk/' . $Produk->gambar_produk)) {
                File::delete('produk/' . $Produk->gambar_produk);
                $file->move('produk', $fileSaved);
            } else {
                $file->move('produk', $fileSaved);
            }
        } else {
            $fileSaved = $Produk->gambar_produk;
        }




        $Produk->nama_produk = $request->nama_produk;
        $Produk->kategori_id = $request->kategori_id;
        $Produk->deskripsi = $request->deskripsi;
        $Produk->harga_produk = $request->harga_produk;
        $Produk->stok = $request->stok;
        $Produk->gambar_produk = $fileSaved;
        $Produk->save();

        return redirect()->route('produk.index');
    }

    public function destroy($id)
    {
        $Produk = Produk::find($id);
        $Produk->delete();

        return redirect()->route('produk.index');
    }
}
