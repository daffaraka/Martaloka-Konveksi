<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    public function index()
    {

        $data['judul'] = 'Beranda Produk';
        $data['produk'] = Produk::with('kategori')->get();

        return view('admin.produk.produk-index', $data);
    }

    public function create()
    {
        $kategori = Kategori::select('id','nama_kategori')->get();

        // dd(Auth::user());
        return view('admin.produk.produk-create', compact('kategori'));
    }


    public function store(Request $request)
    {
        $file = $request->file('gambar_produk');
        $fileName = $file->getClientOriginalName();
        $time = now()->format('Y-m-d H-i-s');
        $fileSaved = $request->nama_produk . '-' . $time . $fileName;
        $file->move('produk', $fileSaved);

        $Produk = new Produk();
        $Produk->nama_produk = $request->nama_produk;
        $Produk->kategori_id = $request->kategori_id;
        $Produk->deskripsi = $request->deskripsi;
        $Produk->harga_produk = $request->harga_produk;
        $Produk->stok = $request->stok;
        $Produk->gambar_produk = $fileSaved;
        $Produk->save();


        return redirect()->route('produk.index');
    }

    public function show(Produk $Produk)
    {
        //
    }


    public function edit($id)
    {
        $data['produk'] = Produk::find($id);
        $data['kategori'] = Kategori::select('id','nama_kategori')->get();
        return view('admin.produk.produk-edit ', $data);
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
