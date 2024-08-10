@extends('home.home-layout')
@section('title', 'Lengkapi Transaksi Anda')
@section('content')


    <section class="blog-page-two">
        <div class="container" style="margin-top: 20vh;">
            <div class="row">

                <div class="col-12">

                    <div class="blog-page-two__content">
                        <div class="row">
                            <div class="col-xxl-8 col-xl-8 col-lg-12 col-md-12 col-sm-12">

                                <h2 class="mb-3">Transaksi anda</h2>
                                @foreach ($transaksi->detailTransaksi as $detailTransaksi)
                                    <div class="single-blog-style2">
                                        <div class="single-blog-style2__img-holder">
                                            <div class="inner">
                                                <img src="{{ asset('produk.' . $detailTransaksi->produk->gambar_produk) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="single-blog-style2__text-holder">
                                            <div class="top">
                                                <div class="category-box">
                                                    <div class="dot-box"></div>
                                                    <p>{{ $detailTransaksi->produk->kategori->nama_kategori }}</p>
                                                </div>
                                            </div>
                                            <h3 class="blog-title">
                                                <a href="{{ route('home.detail-produk', $detailTransaksi->produk->id) }}">
                                                    {{ $detailTransaksi->produk->nama_produk }}
                                                </a>
                                            </h3>

                                            <div class="bottom-box">
                                                <div class="btn-box">
                                                    <a href="#">
                                                        <span class="icon-right-arrow-1"></span>Deskripsi
                                                    </a>
                                                </div>
                                                <div class="meta-info">
                                                    <ul>
                                                        <li>
                                                            <span class="icon-user"></span>
                                                            <a href="#">Thomas Maverick</a>
                                                        </li>
                                                        <li>
                                                            <span class="icon-calendar"></span>
                                                            <a href="#">Nov 25, 2022</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-12 col-md-12 col-sm-12">

                                <h2 class="mb-3">Detail</h2>
                                <form action="{{ route('home.uploadBuktiTransaksi', $transaksi) }}"
                                    enctype="multipart/form-data" class="">
                                    @csrf

                                    <div class="border p-3">
                                        <div class="form-group">
                                            <label class="fw-bold">Bukti Pembayaran</label>
                                            <input type="file" name="bukti_pembayaran" required class="form-control">
                                        </div>

                                        <div class="d-gap">
                                            <button class="btn btn-block btn-one" type="submit">Upload</button>

                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>


                    </div>
                </div>





            </div>
        </div>
    </section>
@endsection
