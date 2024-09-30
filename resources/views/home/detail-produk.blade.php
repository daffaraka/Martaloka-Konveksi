@extends('home.home-layout')
@section('title', 'Detail produk')
@section('content')

    <div style="margin-top: 20vh;">
        <section class="events-details-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="events-details-content">
                            <div class="events-details-content__img-box">
                                <img src="{{ asset('produk/' . $produk->gambar_produk) }}" alt="">
                            </div>
                            <div class="events-details-content__text-box">
                                <h3>Deskripsi Produk</h3>
                                <p>{{ $produk->deskripsi }}
                                </p>

                            </div>


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

                                        <div class="w">
                                            <select name="size" id="">
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>

                                            </select>
                                        </div>

                                    </li>

                                </ul>

                                <div class="btns-box mt-5">
                                    <button type="submit" class="btn-one btn-one--style2" >
                                        <span class="txt">Tambahkan Ke Keranjang</span>
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
