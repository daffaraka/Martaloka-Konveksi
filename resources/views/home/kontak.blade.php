@extends('home.home-layout')
@section('title', 'Kontak Kami')
@section('content')
    <section class="breadcrumb-area">
        <div class="breadcrumb-area-bg" style="background-image: url(assets/images/breadcrumb/breadcrumb-1.jpg);">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content">
                        <div class="title" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
                            <h2>Kontak Kami</h2>
                        </div>
                        <div class="breadcrumb-menu" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li class="active">Kontak Kami</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Quick Contact Info Area-->
    <section class="quick-contact-info-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="quick-contact-info-title">
                        <div class="sec-title">
                            <h2>Temukan Informasi Kontak Khusus</h2>
                            <div class="sub-title">
                                <p>Tidak ada yang menolak, tidak suka, atau menghindari kesenangan itu sendiri,
                                   karena itu adalah kesenangan, tetapi karena mereka yang tidak tahu bagaimana
                                   mengejar kesenangan dengan bijaksana.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Mulai Kotak Info Kontak Cepat-->
                <div class="col-xl-3">
                    <div class="quick-contact-info-single-box">
                        <div class="icon">
                            <span class="icon-phone"></span>
                        </div>
                        <div class="text">
                            <h3>Hubungi Kami</h3>
                            <p>Hubungi kami untuk pertanyaan umum Anda.</p>
                            <a href="tel:123456789">+62 815-641-5000</a>
                        </div>
                    </div>
                </div>
                <!--Akhir Kotak Info Kontak Cepat-->
                <!--Mulai Kotak Info Kontak Cepat-->
                <div class="col-xl-3">
                    <div class="quick-contact-info-single-box">
                        <div class="icon">
                            <span class="icon-send-1"></span>
                        </div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>Kirimkan email Anda untuk pertanyaan umum.</p>
                            <a href="mailto:yourmail@email.com">support@educamb.com</a>
                        </div>
                    </div>
                </div>
                <!--Akhir Kotak Info Kontak Cepat-->
            </div>
        </div>
    </section>

    <!--End Quick Contact Info Area-->

    <!--Start Contact Info Area-->
    <section class="contact-info-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="contact-info-content">
                        <h2>An Address for Better<br> Education!..</h2>
                        <p>Trouble that are bound to ensue & equal blame belongs.</p>
                        <h3>Educamb<br> 6500 NW Brook Park Drive<br> Jacksonville,<br>
                            United States 32034.</h3>
                        <div class="video-gallery-btns-box">
                            <a class="video-popup" title="Video Gallery" href="https://www.youtube.com/watch?v=bO4RoQL9H8I">
                                <span class="icon-play"></span>
                            </a>
                            <p>
                                <a class="video-popup" title="Video Gallery"
                                    href="https://www.youtube.com/watch?v=bO4RoQL9H8I">
                                    360<span style="font-size: 22px;">&#176;</span> Campus Tour
                                </a>
                            </p>
                        </div>
                        <div class="icon-outer">
                            <span class="icon-world"></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="contact-page-map-outer">
                        <!--Map Canvas-->
                        <div class="map-canvas" data-zoom="12" data-lat="-37.817085" data-lng="144.955631"
                            data-type="roadmap" data-hue="#ffc400" data-title="Envato"
                            data-icon-path="{{asset('assets/images/icon/map-marker-6.png')}}"
                            data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Contact Info Area-->

    <!--Start Department Style1 Area-->
    <section class="department-style1-area">
        {{-- <div class="container">
            <div class="sec-title text-center">
                <h2>Contact By Department</h2>
                <div class="sub-title">
                    <p>How all this mistaken idea of denouncing pleasure and praising pain was born.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="department-style1-inner">
                        <div class="theme_carousel department-carousel owl-theme owl-carousel owl-dot-style1"
                            data-options='{
                            "loop": false,
                            "margin": 30,
                            "autoheight":true,
                            "lazyload":true,
                            "nav": false,
                            "dots": true,
                            "autoplay": true,
                            "autoplayTimeout": 5000,
                            "smartSpeed": 500,
                            "navText": ["<span class=\"left icon-right-arrow-1\"></span>",
                            "<span class=\"right icon-right-arrow-1\"></span>"],
                            "responsive":{
                            "0" :{ "items": "1" },
                            "600" :{ "items" : "2" },
                            "768" :{ "items" : "3" },
                            "992":{ "items" : "4" },
                            "1200":{ "items" : "5" }
                        }
                        }'>

                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-id-card"></span>
                                    </div>
                                    <h3><a href="#">Admission</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-learning-1"></span>
                                    </div>
                                    <h3><a href="#">Examination</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-scholarship"></span>
                                    </div>
                                    <h3><a href="#">Finance Off</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-computer"></span>
                                    </div>
                                    <h3><a href="#">Media</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-library"></span>
                                    </div>
                                    <h3><a href="#">Library</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->

                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-id-card"></span>
                                    </div>
                                    <h3><a href="#">Admission</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-learning-1"></span>
                                    </div>
                                    <h3><a href="#">Examination</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-scholarship"></span>
                                    </div>
                                    <h3><a href="#">Finance Off</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-computer"></span>
                                    </div>
                                    <h3><a href="#">Media</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-library"></span>
                                    </div>
                                    <h3><a href="#">Library</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->

                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-id-card"></span>
                                    </div>
                                    <h3><a href="#">Admission</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-learning-1"></span>
                                    </div>
                                    <h3><a href="#">Examination</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-scholarship"></span>
                                    </div>
                                    <h3><a href="#">Finance Off</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-computer"></span>
                                    </div>
                                    <h3><a href="#">Media</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                            <!--Start Department Style1 Single-->
                            <div class="department-style1-single">
                                <div class="top-content">
                                    <div class="icon">
                                        <span class="icon-library"></span>
                                    </div>
                                    <h3><a href="#">Library</a></h3>
                                </div>
                                <div class="bottom-content">
                                    <div class="phone">
                                        <a href="tel:123456789">815-641-5000</a>
                                    </div>
                                    <a href="mailto:yourmail@email.com">“E-Mail Us!”</a>
                                </div>
                            </div>
                            <!--End Department Style1 Single-->
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
    <!--End Department Style1 Area-->

    <!--Start Staff Area-->
    <section class="staff-area">
        {{-- <div class="container">
            <div class="row">
                <!--Start Single Staff Box-->
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="single-staff-box">
                        <div class="btns-box">
                            <a class="btn-one" href="#">
                                <span class="txt">
                                    Office Staff
                                </span>
                                <i class="icon-right-arrow-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--End Single Staff Box-->
                <!--Start Single Staff Box-->
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="single-staff-box">
                        <div class="btns-box">
                            <a class="btn-one" href="#">
                                <span class="txt">
                                    Teaching Staff
                                </span>
                                <i class="icon-right-arrow-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--End Single Staff Box-->
                <!--Start Single Staff Box-->
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="single-staff-box">
                        <div class="btns-box">
                            <a class="btn-one" href="#">
                                <span class="txt">
                                    Security Guard
                                </span>
                                <i class="icon-right-arrow-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--End Single Staff Box-->
                <!--Start Single Staff Box-->
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="single-staff-box">
                        <div class="btns-box">
                            <a class="btn-one" href="#">
                                <span class="txt">
                                    Accommodation
                                </span>
                                <i class="icon-right-arrow-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--End Single Staff Box-->
            </div>

            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="bottom-text">
                        <p>Contact office & Teaching staff during working hours.(Mon-Sat: 09.30 to 03.45) </p>
                    </div>
                </div>
            </div>

        </div> --}}
    </section>


@endsection
