@extends('home.home-layout')
@section('title', 'Detail produk')
@section('content')

    <div  style="margin-top: 20vh;">
        <section class="events-details-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="events-details-content">
                            <div class="events-details-content__img-box">
                                <img src="{{asset('produk/'.$produk->gambar_produk)}}" alt="">
                            </div>
                            <div class="events-details-content__text-box">
                                <h3>Deskripsi Produk</h3>
                                <p>{{$produk->deskripsi}}
                                </p>
                                {{-- <ul>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-double-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p>Reading knowledge of the non-English language</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-double-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p>Eight-semester courses in art history at the advanced</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-double-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p>Comprehensive Exam</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-double-tick"></span>
                                        </div>
                                        <div class="text">
                                            <p>Historiography and Methodology (FAH101)</p>
                                        </div>
                                    </li>
                                </ul> --}}
                            </div>


                        </div>
                    </div>

                    <!--Start Single Event Three-->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="events-details-info-box">
                            <div class="inner-title">
                                <div class="dot-box"></div>
                                <h3>Detail Produk</h3>
                            </div>
                            <ul class="events-details-info-box__items">
                                <li>
                                    Nama Produk <span>{{$produk->nama_produk}}</span>
                                </li>
                                <li>
                                    Kategori <span>{{$produk->kategori->nama_kategori}}</span>
                                </li>
                                <li>
                                    Harga <span class="font-weight-bold">Rp.{{number_format($produk->harga_produk)}}</span>
                                </li>
                                {{-- <li>
                                    Organizer <span>Herman Gordon</span>
                                </li>
                                <li>
                                    Phone <span><a href="tel:123456789">+44 888 45 678</a></span>
                                </li> --}}

                            </ul>

                            <div class="btns-box mt-5">
                                <a class="btn-one btn-one--style2" href="{{route('home.addToCart',$produk->id)}}">
                                    <span class="txt">Tambahkan Ke Keranjang</span>
                                </a>
                            </div>
                            {{-- <ul class="events-details-info-box__social-links">
                                <li><a href="#"><i class="icon-twitter-1"></i></a></li>
                                <li><a href="#"><i class="icon-facebook-app-symbol"></i></a></li>
                                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            </ul> --}}
                        </div>
                    </div>
                    <!--End Single Event Three-->

                </div>
            </div>
        </section>
        <!--End Events Details Page-->


    </div>
@endsection
