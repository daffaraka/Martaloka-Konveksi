<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from st.ourhtmldemo.com/new/educamb/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 May 2023 07:47:29 GMT -->

<head>
    <meta charset="UTF-8">
    <title>@yield('title','Martaloka Konveksi')</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;400;500;700;900&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/imp.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">

    <!-- Module css -->
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/header-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/banner-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/about-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/blog-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/fact-counter-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/faq-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/contact-page.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/breadcrumb-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/team-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/partner-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/testimonial-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/services-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/footer-section.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/color/theme-color.css') }}" id="jssDefault">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}" sizes="16x16">


    <!-- Fixing Internet Explorer-->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

</head>


<body>

    <div class="boxed_wrapper ltr">


        @include('home.partials.home-header')


        <div>
            @yield('content')
        </div>


        @include('home.partials.home-footer')
    </div>



    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.event.move.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.paroller.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-sidebar-content.js') }}"></script>
    <script src="{{ asset('assets/js/knob.js') }}"></script>
    <script src="{{ asset('assets/js/map-script.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/pagenav.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/tilt.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/js/validation.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-1color-switcher.min.js') }}"></script>
    <script src="{{ asset('assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/skrollr.min.js') }}"></script>

    <!-- thm custom script -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>




</body>


<!-- Mirrored from st.ourhtmldemo.com/new/educamb/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 May 2023 07:48:19 GMT -->

</html>
