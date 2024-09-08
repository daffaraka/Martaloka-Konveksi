@extends('home.home-layout')
@section('title', 'Kontak Kami')
@section('content')
    <section class="breadcrumb-area">
        <div class="breadcrumb-area-bg" style="background-image: url(assets/images/slider/jj.png);">
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

    <section class="contact-details-style2-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact-details-style2-box">
                        <ul class="clearfix">
                            <li>
                                <div class="contact-details-style2-single">
                                    <div class="icon">
                                        <span class="icon-navigation"></span>
                                    </div>
                                    <div class="text">
                                        <h3>Lokasi Kami</h3>
                                        <p>Dusun Abian, Desa Banjar Tegeha, Kec Banjar, Buleleng, Bali</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-details-style2-single">
                                    <div class="icon">
                                        <span class="icon-telephone"></span>
                                    </div>
                                    <div class="text">
                                        <h3>Kontak</h3>
                                        <p>Ph: <a href="tel:085847728414">085847728414</a> & Mail: <a
                                                href="mailto:martaloka@gmail.com">martaloka@gmail.com</a></p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <ul class="clearfix">
                            <li>
                                <div class="contact-details-style2-single">
                                    <div class="icon">
                                        <span class="icon-wall-clock"></span>
                                    </div>
                                    <div class="text">
                                        <h3>Jam Oprasional</h3>
                                        <p>Senin-Sabtu: 09.00 - 05.00 (Minggu: Tutup)</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-details-style2-single">
                                    <div class="icon">
                                        <span class="icon-share-3"></span>
                                    </div>
                                    <div class="text">
                                        <h3>Social Media</h3>
                                        <p class="social-links">
                                            <a href="#">Facebook</a>
                                            <a href="#">Twitter</a>
                                            <a href="#">Instagram</a>
                                            <a href="#">Youtube</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Details Style2 Area-->





    <!--Start Main Contact Form Area-->
    <section class="main-contact-form-area">
        <div class="container">
            <div class="sec-title-style2 text-center" style="margin-top:-25px">
                <h2>Kirimkan Pertanyaan Anda Kepada Kami</h2>
            </div>
            <div class="row margin0">
                <div class="col-xl-6">
                    <div class="contact-form">
                        <form id="contact-form" name="contact_form" class="default-form2"
                            action="https://st.ourhtmldemo.com/new/educamb/assets/inc/sendmail.php" method="post">

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="input-field-label">
                                            <p>Nama</p>
                                        </div>
                                        <div class="input-box">
                                            <input type="text" name="form_parent_name" id="formParentName"
                                                placeholder="" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <div class="input-field-label">
                                            <p>No Telepon</p>
                                        </div>
                                        <div class="input-box">
                                            <input type="text" name="form_phone" value="" id="formPhone"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <div class="input-field-label">
                                            <p>Email</p>
                                        </div>
                                        <div class="input-box">
                                            <input type="email" name="form_email" id="formEmail" placeholder=""
                                                required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <div class="input-field-label">
                                            <p>Tanggal Lahir</p>
                                        </div>
                                        <div class="input-box">
                                            <input type="text" name="date" id="datepicker" placeholder="">
                                            <div class="icon">
                                                <span class="icon-date"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <div class="input-field-label">
                                            <p>Jenis Kelamin</p>
                                        </div>
                                        <div class="input-box">
                                            <div class="select-box">
                                                <select class="wide">
                                                    <option data-display="Laki-Laki">Laki-Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group margintop">
                                        <div class="input-field-label">
                                            <p>Pesan Anda</p>
                                        </div>
                                        <div class="input-box">
                                            <textarea name="form_message" id="formMessage" placeholder=""
                                                required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="button-box">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control"
                                            type="hidden" value="">
                                        <button class="btn-one" type="submit" data-loading-text="Please wait...">
                                            <span class="txt">
                                                Kirim
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="contact-form-img-box">
                        <img src="assets/images/kontak.png" alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
