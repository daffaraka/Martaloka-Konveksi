@extends('home.home-layout')
@section('title', 'Detail produk')
@section('content')

    <style>
        .nice-select {
            padding-right: 100px !important;
        }
    </style>
    <div style="margin-top: 20vh;">
        <section class="events-details-page">
            <div class="container">
                @include('home.flash')

                <div class="row">
                    <div class="col-xl-8 bg-dark">
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('produk/' . $produk->gambar_produk) }}"
                                        style="height: 70vh; object-fit:contain;" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">

                                    <img src="{{asset('assets/images/size-guide.jpeg')}}" style="height: 70vh; object-fit:contain;" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>

                    <!--Start Single Event Three-->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <form action="{{ route('home.addToCart', $produk->id) }}" method="POST">

                            @csrf


                            <div class="events-details-info-box">
                                <div class="inner-title">
                                    <div class="dot-box"></div>
                                    <h3>Detail Produk</h3>
                                </div>
                                <ul class="events-details-info-box__items">
                                    <li>
                                        Nama Produk <span>{{ $produk->nama_produk }}</span>
                                    </li>
                                    <li>
                                        Kategori <span>{{ $produk->kategori->nama_kategori }}</span>
                                    </li>
                                    <li>
                                        Harga <span
                                            class="font-weight-bold">Rp.{{ number_format($produk->harga_produk) }}</span>
                                    </li>
                                    <li>
                                        Size

                                        <div>
                                            <select class="nice-select w-25" name="size"
                                                style="padding-right:60px !important;">
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>

                                            </select>
                                        </div>

                                    </li>

                                </ul>

                                <div class="btns-box w-100" style="margin-top: 100px;">
                                    <button type="submit" class="btn-one btn-one--style2 w-100 ">
                                        <span class="txt d-inline">Tambahkan Ke Keranjang</span>
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>
                    <!--End Single Event Three-->

                </div>
            </div>
        </section>
        <!--End Events Details Page-->


    </div>
@endsection
