@extends('home.home-layout')
@section('title', 'Keranjang')
@section('content')

    <section class="top-categories-area">
        <div class="container" style="padding: 30vh 0;">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered table-dark align-middle">
                    <thead class="table-light">
                        <caption>
                            Daftar Transaksi
                        </caption>
                        <tr>
                            <th>#</th>
                            <th>Produk </th>
                            <th>Kategori</th>
                            <th>Jumlah Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @foreach ($keranjangs as $item)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>{{$item->produk->nama_produk}}</td>
                                <td>{{$item->produk->kategori->nama_kategori}}</td>
                                <td>{{$item->qty}}</td>
                                <td><a class="btn btn-primary btn-sm " href="#" role="button"> Bayar</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>

        </div>


    </section>


@endsection
