<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    @if (!empty($configuration->title))
    <title>{{ $configuration->title }}</title>
    @else
    <title>Website</title>
    @endif
    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @if (!empty($configuration->meta_descriptions))
        <meta name="description" content="{{ $configuration->meta_descriptions }}">
    @else
    @endif

    @if (!empty($configuration->meta_keywords))
        <meta name="keywords" content="{{ $configuration->meta_keywords }}">
    @else
    @endif


    @if (!empty($configuration->path_logo))
        <link rel="shortcut icon" href="{{ $configuration->path_logo }}" type="image/x-icon">
        <link rel="icon" href="{{ $configuration->path_logo }}" type="image/x-icon">
    @else
    @endif


    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body class="hidden-bar-wrapper">

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader">
            <span></span>
        </div>

        <!-- Main Header -->
        <header class="main-header">

            <!-- Header Top -->
            <div class="header-top">
                <div class="auto-container clearfix">

                    <div class="pull-left">
                        <ul class="info">
                            @if (!empty($configuration->phone_number))
                                <li><a href="https://wa.me/{{ $configuration->phone_number }}"><span
                                            class="icon flaticon-phone"></span>Panggil:
                                        +{{ $configuration->phone_number }}</a></li>
                            @else
                                -
                            @endif
                            @if (!empty($configuration->email_address))
                                <li><a href="mailto:{{ $configuration->email_address }}"><span
                                            class="icon flaticon-email-2"></span>{{ $configuration->email_address }}</a>
                                </li>
                            @else
                                -
                            @endif
                        </ul>
                    </div>

                    <div class="pull-right clearfix">
                        <!-- Social Box -->
                        <ul class="social-box">
                            @if (!empty($configuration->facebook))
                                <li><a href="{{ $configuration->facebook }}" class="fa fa-facebook-f"></a></li>
                            @else
                                -
                            @endif
                            @if (!empty($configuration->twitter))
                                <li><a href="{{ $configuration->twitter }}" class="fa fa-twitter"></a></li>
                            @else
                                -
                            @endif
                            @if (!empty($configuration->dribbble))
                                <li><a href="{{ $configuration->dribbble }}" class="fa fa-dribbble"></a></li>
                            @else
                                -
                            @endif
                            @if (!empty($configuration->linkedin))
                                <li><a href="{{ $configuration->linkedin }}" class="fa fa-linkedin"></a></li>
                            @else
                                -
                            @endif
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Header Lower -->
            <div class="header-lower">

                <div class="auto-container clearfix">
                    <div class="inner-container clearfix">

                        <div class="pull-left logo-box">
                            @if (!empty($configuration->path))
                                <div class="logo"><a href="{{ route('index') }}"><img
                                            src="{{ asset($configuration->path) }}" alt="" title=""></a>
                                </div>
                            @else
                                -
                            @endif
                        </div>
                        <div class="nav-outer clearfix">

                            <!-- Mobile Navigation Toggler -->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                            <!-- Main Menu -->
                            <nav class="main-menu show navbar-expand-md">
                                <div class="navbar-header">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li
                                            class="dropdown {{ Route::currentRouteName() == 'index' ? 'current' : '' }}">
                                            <a href="#">Beranda</a>
                                            <ul>
                                                <li> <a href="{{ route('index') }}">Beranda</a></li>
                                            </ul>

                                        </li>

                                        <li
                                            class="dropdown {{ in_array(Route::currentRouteName(), ['about', 'price', 'movie']) ? 'current' : '' }}">
                                            <a href="#">Tentang</a>
                                            <ul>
                                                <li><a href="{{ route('about') }}">Tentang Kita</a></li>
                                                <li><a href="{{ route('price') }}">Harga</a></li>
                                                <li><a href="{{ route('movie') }}">Film</a></li>
                                            </ul>
                                        </li>

                                        <li
                                            class="dropdown {{ in_array(Route::currentRouteName(), ['services', 'detail_service']) ? 'current' : '' }}">
                                            <a href="#">Layanan</a>
                                            <ul>
                                                <li><a href="{{ route('services') }}">Semua Layanan</a></li>
                                                @foreach ($typeServices as $typeService)
                                                    <li>
                                                        <a href="{{ route('detail_service', $typeService->id) }}">
                                                            {{ $typeService->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Blog</a>
                                            <ul>
                                                <li><a href="blog.html">Our Blog</a></li>
                                                <li><a href="not-found.html">Not Found</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Kontak Kami</a></li>
                                    </ul>
                                </div>

                            </nav>
                            <!-- Main Menu End-->

                            <!-- Outer Box -->
                            <div class="outer-box clearfix">

                                <!--Search Box-->
                                <div class="search-box-outer">
                                    <div class="search-box-btn"><span class="fa fa-search"></span></div>
                                </div>

                                <!-- Nav Btn -->
                                <div class="nav-btn navSidebar-button"><span class="icon flaticon-dots-menu"></span>
                                </div>

                            </div>
                            <!-- End Outer Box -->

                        </div>
                    </div>

                </div>
            </div>
            <!-- End Header Lower -->

            <!-- Sticky Header  -->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!-- Logo -->
                    <div class="logo pull-left">
                        @if (!empty($configuration->path))
                            <a href="{{ route('index') }}" title=""><img src="{{ $configuration->path }}"
                                    alt="" title=""></a>
                        @else
                            Kosong
                        @endif
                    </div>

                    <!--Right Col-->
                    <div class="pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav><!-- Main Menu End-->

                        <!-- Outer Box -->
                        <div class="outer-box clearfix">

                            <!--Search Box-->
                            <div class="search-box-outer">
                                <div class="search-box-btn"><span class="fa fa-search"></span></div>
                            </div>

                            <!-- Cart Box -->

                            <!-- End Cart Box -->

                            <!-- Nav Btn -->
                            <div class="nav-btn navSidebar-button"><span class="icon flaticon-dots-menu"></span></div>

                        </div>
                        <!-- End Outer Box -->

                    </div>
                </div>
            </div><!-- End Sticky Menu -->

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

                <nav class="menu-box">
                    <div class="nav-logo"><a href="index.html"><img src="images/logo.png" alt=""
                                title=""></a></div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                </nav>
            </div><!-- End Mobile Menu -->

        </header>
        <!-- End Main Header -->

        <!-- Sidebar Cart Item -->
        <div class="xs-sidebar-group info-group">
            <div class="xs-overlay xs-bg-black"></div>
            <div class="xs-sidebar-widget">
                <div class="sidebar-widget-container">
                    <div class="widget-heading">
                        <a href="#" class="close-side-widget">
                            X
                        </a>
                    </div>
                    <div class="sidebar-textwidget">

                        <!-- Sidebar Info Content -->
                        <div class="sidebar-info-contents">
                            <div class="content-inner">
                                <div class="logo">
                                    <a href="index.html"><img src="images/logo-2.png" alt="" /></a>
                                </div>
                                <div class="content-box">
                                    <h5>About Us</h5>
                                    <p class="text">The argument in favor of using filler text goes something like
                                        this: If you use real content in the Consulting Process, anytime you reach a
                                        review point you’ll end up reviewing and negotiating the content itself and not
                                        the design.</p>
                                    <a href="contact.html" class="theme-btn btn-style-one"><span
                                            class="txt">Consultation</span></a>
                                </div>
                                <div class="contact-info">
                                    <h5>Contact Info</h5>
                                    <ul class="list-style-one">
                                        <li><span class="icon fa fa-location-arrow"></span>Chicago 12, Melborne City,
                                            USA</li>
                                        <li><span class="icon fa fa-phone"></span>(111) 111-111-1111</li>
                                        <li><span class="icon fa fa-envelope"></span>nextbit@gmail.com</li>
                                        <li><span class="icon fa fa-clock-o"></span>Week Days: 09.00 to 18.00 Sunday:
                                            Closed</li>
                                    </ul>
                                </div>
                                <!-- Social Box -->
                                <ul class="social-box">
                                    <li><a href="https://www.facebook.com/" class="fa fa-facebook-f"></a></li>
                                    <li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
                                    <li><a href="https://dribbble.com/" class="fa fa-dribbble"></a></li>
                                    <li><a href="https://www.linkedin.com/" class="fa fa-linkedin"></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END sidebar widget item -->

        @yield('content')

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="pattern-layer-one" style="background-image: url(images/background/pattern-12.png)"></div>
            <div class="pattern-layer-two" style="background-image: url(images/background/pattern-13.png)"></div>
            <div class="auto-container">
                <div class="widgets-section">
                    <div class="logo">
                        @if (!empty($configuration->path))
                            <a href="{{ route('index') }}"><img src="{{ $configuration->path }}"
                                    alt="" /></a>
                        @else
                            Kosong
                        @endif
                    </div>
                    <ul class="contact-info-list">
                        <li>
                            <span class="icon"><img src="images/icons/icon-1.png" alt="" /></span>
                            @if (!empty($configuration->phone_number))
                                <a href="https://wa.me/{{ $configuration->phone_number }}">+{{ $configuration->phone_number }}</a><br>
                            @else
                                Kosong
                            @endif
                        </li>
                        <li>
                            <span class="icon"><img src="images/icons/icon-2.png" alt="" /></span>
                            @if (!empty($configuration->email_address))
                                <a
                                    href="mailto:{{ $configuration->email_address }}">{{ $configuration->email_address }}</a><br>
                            @else
                                Kosong
                            @endif
                        </li>
                        <li>
                            <span class="icon"><img src="images/icons/icon-3.png" alt="" /></span>
                            503 Old Buffalo Street <br> Northwest #205, New York-3087
                        </li>
                    </ul>

                    <!-- Social Box -->
                    <ul class="social-box">
                        @if (!empty($configuration->email_address))
                            <li><a href="{{ $configuration->facebook }}" class="fa fa-facebook-f"></a></li>
                        @else
                            Kosong
                        @endif
                        @if (!empty($configuration->email_address))
                            <li><a href="{{ $configuration->linkedin }}" class="fa fa-linkedin"></a></li>
                        @else
                            Kosong
                        @endif
                        @if (!empty($configuration->email_address))
                            <li><a href="{{ $configuration->skype }}" class="fa fa-skype"></a></li>
                        @else
                            Kosong
                        @endif
                        @if (!empty($configuration->email_address))
                            <li><a href="{{ $configuration->twitter }}" class="fa fa-twitter"></a></li>
                        @else
                            Kosong
                        @endif

                    </ul>

                </div>

            </div>
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="auto-container">
                    @if (!empty($configuration->footer))
                    <div class="copyright">{{ $configuration->footer }} <a
                            href="https://wansolution.co.id/">WAN</a></div>
                            @else
                            <div class="copyright"> - <a
                                href="https://wansolution.co.id/">WAN</a></div>
                            @endif
                </div>
            </div>
        </footer>
        <!-- End Main Footer -->

    </div>
    <!--End pagewrapper-->

    <!-- Search Popup -->
    <div class="search-popup">
        <div class="color-layer"></div>
        <button class="close-search"><span class="fa fa-arrow-up"></span></button>
        <form method="post" action="blog.html">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- End Header Search -->

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/parallax.min.js') }}"></script>
    <script src="{{ asset('js/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.paroller.min.js') }}"></script>
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/nav-tool.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>


    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

</body>

</html>
