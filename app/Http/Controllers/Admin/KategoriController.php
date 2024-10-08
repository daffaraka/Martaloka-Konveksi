<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.kategori-index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.kategori.kategori-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);


        Kategori::create($request->all());

        return to_route('kategori.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        // $kategori = Kategori::find($kategori);


        return view('admin.kategori.kategori-edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {

        $kategori->update($request->all());

        return to_route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return to_route('kategori.index');
    }
}
