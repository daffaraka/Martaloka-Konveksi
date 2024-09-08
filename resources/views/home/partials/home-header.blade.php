<header class="main-header header-style-one">

    <!--Start Header Top-->
    <div class="header-top">
        <div class="auto-container">
            <div class="outer-box">
                <div class="header-top-left">
                    {{-- <div class="info-box">
                        <span class="icon-info"></span>
                        <p>Info for</p>
                    </div>
                    <div class="select-box">
                        <select class="wide" id="info">
                            <option data-display="">Students</option>
                            <option value="1">Teacher</option>
                            <option value="2">Students</option>
                        </select>
                    </div>
                    <div class="subscribe-box">
                        <div class="icon">
                            <span class="icon-email"></span>
                        </div>
                        <a href="#">Subscribe Us</a>
                    </div>
                    <div class="social-link-box-style1">
                        <div class="icon">
                            <span class="icon-share"></span>
                        </div>
                        <p>Follow</p>
                        <ul class="clearfix">
                            <li>
                                <a href="#"><i class="icon-facebook-app-symbol"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-twitter-1"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-youtube"></i></a>
                            </li>
                        </ul>
                    </div> --}}
                </div>

                <div class="header-top-right">
                    <div class="quick-link-box">
                        <div class="inner-title">
                            <span class="icon-launch"></span>

                            <li><a href="{{ route('register') }}">Register</a> </li>
                        </div>
                        <div class="link-box">
                            <ul>
                                @guest
                                    <li class="#"><a href="{{ route('login') }}">
                                            Login</a></li>
                                @endguest

                                @auth
                                    <li><a href="#"><i class="icon-account mr-2"></i>{{ Auth::user()->name }}</a></li>

                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--End Header Top-->

    <!--Start Header-->
    <div class="header {{Request::is('/') || Request::is('kontak') || Request::is('tentang-kami') ? '' : 'bg-dark'}}">
        <div class="auto-container">
            <div class="outer-box">
                <div class="header-left"></div>
                <div class="header-middle">
                    <div class="main-logo-box">
                        <a href="{{ route('beranda') }}">
                            <img style="height: 70px" src="{{ asset('assets/images/logoo2.png') }}" alt="Aska Logo"
                                title="">
                        </a>
                    </div>
                    <div class="nav-outer style1 clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <div class="inner">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <!-- Main Menu -->
                        <nav class="main-menu style1 navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="{{ Request::is('/') ? 'current' : '' }}">
                                        <a href="{{ route('beranda') }}">Beranda</a>
                                    </li>
                                    <li class="dropdown {{ Request::is('profil/*') ? 'current' : '' }}"><a
                                            href="#">Kategori</a>
                                        <ul>

                                            @foreach ($dropdown_kategori as $dropDown)
                                                <li
                                                    class="{{ Request::is('kategori/' . $dropDown->nama_kategori) ? 'current' : '' }}">
                                                    <a
                                                        href="{{ route('home.kategori', $dropDown->nama_kategori) }}">{{ $dropDown->nama_kategori }}</a>
                                                </li>
                                            @endforeach


                                        </ul>
                                    </li>

                                    <li class="{{ Request::is('profil/tentangkami') ? 'current' : '' }}"><a
                                            href="{{ route('home.tentang-kami') }}">Tentang Kami</a></li>
                                    <li class="blank-box"></li>
                                    <li class="{{ Request::is('informasi*') ? 'current' : '' }}"><a
                                            href="{{ route('home.kontak') }}">Kontak Kami</a>
                                    <li class="{{ Request::is('register*') ? 'current' : '' }}"><a
                                            href="{{ route('register') }}">Register</a></li>
                                    </li>


                                    <li class="{{ Request::is('register*') ? 'current' : '' }}"><a
                                            href="{{ route('register') }}">Keranjang</a></li>
                                    </li>

                                    @auth
                                        <li class="dropdown {{ Request::is('profil/*') ? 'current' : '' }}"><a
                                                href="#">{{ Auth::user()->name }}</a>
                                            <ul>

                                                <li class="{{ Request::is('profil/galeri') ? 'current' : '' }}"><a
                                                        href="{{ route('home.keranjang') }}"> Keranjang </a> </li>
                                                <li class="{{ Request::is('profil/galeri') ? 'current' : '' }}"><a
                                                        href="{{ route('home.keranjang') }}"> Transaksi </a> </li>
                                                <li class="{{ Request::is('profil/galeri') ? 'current' : '' }}"><a
                                                        href="{{ route('home.keranjang') }}"> Custom Design </a> </li>
                                                <li class="{{ Request::is('profil/galeri') ? 'current' : '' }}"><a
                                                        href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Logout</a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endauth

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="header-right"></div>
            </div>
        </div>
    </div>
    <!--End header-->

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="container">
            <div class="sticky-header__inner clearfix">
                <!--Logo-->
                <div class="logo float-left">
                    <a href="index.html" class="img-responsive">
                        <img src="{{ asset('assets/images/logo1.png') }}" alt="" title="">
                    </a>
                </div>
                <!--Right Col-->
                <div class="right-col float-right">
                    <!-- Main Menu -->
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--End Sticky Header-->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon fa fa-times-circle"></span></div>
        <nav class="menu-box">
            <div class="nav-logo">
                <a href="index.html">
                    <img src="assets/images/resources/mobilemenu-logo.png" alt="" title="">
                </a>
            </div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><span class="fab fa fa-facebook-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-twitter-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-pinterest-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-google-plus-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-youtube-square"></span></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->

</header>
