<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    @if (!empty($blog->title))
        <title>{{ $blog->title }}</title>
    @elseif ($configuration->title)
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
    @if (!empty($blog->descriptions))
        <meta name="description" content="{{ $blog->descriptions }}">
    @else
        <meta name="description" content="{{ $configuration->meta_descriptions }}">
    @endif

    @if (!empty($blog->keywords))
        <meta name="keywords" content="{{ $blog->keywords }}">
    @else
        <meta name="keywords" content="{{ $configuration->meta_keywords }}">
    @endif


    @if (!empty($configuration->path_logo))
        <link rel="shortcut icon" href="{{ asset($configuration->path_logo) }}" type="image/x-icon">
        <link rel="icon" href="{{ asset($configuration->path_logo) }}" type="image/x-icon">
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
                            @if (!empty($contact->phone_number))
                                <li><a href="https://wa.me/{{ $contact->phone_number }}"><span
                                            class="icon flaticon-phone"></span>Panggil:
                                        +{{ $contact->phone_number }}</a></li>
                            @else
                                -
                            @endif
                            @if (!empty($contact->email_address))
                                <li><a href="mailto:{{ $contact->email_address }}"><span
                                            class="icon flaticon-email-2"></span>{{ $contact->email_address }}</a>
                                </li>
                            @else
                                -
                            @endif
                        </ul>
                    </div>

                    <div class="pull-right clearfix">
                        <!-- Social Box -->
                        <ul class="social-box">
                            @if (!empty($contact->facebook))
                                <li class="facebook"><a href="{{ $contact->facebook }}" class="fa fa-facebook-f"></a>
                                </li>
                            @else
                            @endif
                            @if (!empty($contact->email_address))
                                <li class="gmail">
                                    <a href="mailto:{{ $contact->email_address }}" class="fa fa-envelope">
                                    </a>
                                </li>
                            @else
                            @endif
                            @if (!empty($contact->tiktok))
                                <li class="tiktok"><a href="{{ $contact->tiktok }}" target="_blank"
                                        class="fa fa-tiktok">T</a>
                                @else
                            @endif
                            </li>
                            @if (!empty($contact->phone_number))
                                <li class="whatsapp"> <a href="https://wa.me/{{ $contact->phone_number }}"
                                        target="_blank" class="fa fa-whatsapp"></a>
                                </li>
                            @else
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
                                            class="dropdown {{ in_array(Route::currentRouteName(), ['about', 'price']) ? 'current' : '' }}">
                                            <a href="#">Tentang</a>
                                            <ul>
                                                <li><a href="{{ route('about') }}">Tentang Kita</a></li>
                                                <li><a href="{{ route('price') }}">Paket Harga</a></li>
                                            </ul>
                                        </li>

                                        <li
                                            class="dropdown {{ in_array(Route::currentRouteName(), ['services', 'detail_service']) ? 'current' : '' }}">
                                            <a href="#">Layanan</a>
                                            <ul>
                                                <li><a href="{{ route('services') }}">Semua Layanan</a></li>
                                                @foreach ($categoryservices as $category)
                                                    <li>
                                                        <a href="{{ route('detail_service', $category->id) }}">
                                                            {{ $category->category }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>


                                        <li
                                            class="dropdown {{ in_array(Route::currentRouteName(), ['blog', 'detail_blog']) ? 'current' : '' }}">
                                            <a href="#">Blog</a>
                                            <ul>
                                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('contact') }}">Kontak Kami</a></li>
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
                    <div class="nav-logo"><a href="{{ route('index') }}"><img src="images/logo.png" alt=""
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
                                    @if ($configuration && !empty($configuration->path))
                                        <a href="{{ route('index') }}"><img src="{{ asset($configuration->path) }}"
                                                alt="" /></a>
                                    @else
                                        -
                                    @endif
                                </div>
                                <div class="content-box">
                                    <h5>Tentang Kami</h5>
                                    <div class="container my-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="bg-light p-4 rounded">
                                                    <p class="text-dark" style="line-height: 1.6; font-size: 16px;">
                                                        @if ($about && !empty($about->description))
                                                            {!! $about->description !!}
                                                        @else
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <a href="{{ route('contact') }}" class="theme-btn btn-style-one"><span
                                            class="txt">
                                            Konsultasi</span></a>
                                </div>
                                <div class="contact-info">
                                    <h5>Info Kontak</h5>
                                    <ul class="list-style-one">
                                        @if (!empty($contact->address))
                                            <li><span class="icon fa fa-location-arrow"></span>{{ $contact->address }}
                                            </li>
                                        @endif
                                        @if (!empty($contact->phone_number))
                                            <li><span class="icon fa fa-phone"></span>{{ $contact->phone_number }}
                                            </li>
                                        @else
                                        @endif
                                        @if (!empty($contact->email_address))
                                            <li><span class="icon fa fa-envelope"></span>{{ $contact->email_address }}
                                            </li>
                                        @else
                                        @endif
                                        @if (!empty($contact->hours))
                                            <li><span class="icon fa fa-clock-o"></span>{{ $contact->hours }}</li>
                                        @else
                                        @endif
                                    </ul>
                                </div>
                                <!-- Social Box -->
                                <ul class="social-box">
                                    @if (!empty($contact->facebook))
                                        <li class="facebook"><a href="{{ $contact->facebook }}"
                                                class="fa fa-facebook-f"></a>
                                        </li>
                                    @else
                                    @endif
                                    @if (!empty($contact->email_address))
                                        <li class="gmail">
                                            <a href="mailto:{{ $contact->email_address }}">
                                                <i class="fa fa-envelope"></i> <!-- Or use a Gmail-specific icon -->
                                            </a>
                                        </li>
                                    @else
                                    @endif
                                    @if (!empty($contact->tiktok))
                                        <li class="tiktok"><a href="{{ $contact->tiktok }}" target="_blank"
                                                class="fa fa-tiktok">T</a>
                                        @else
                                    @endif
                                    </li>
                                    @if (!empty($contact->phone_number))
                                        <li class="whatsapp"> <a href="https://wa.me/{{ $contact->phone_number }}"
                                                target="_blank" class="fa fa-whatsapp"></a>
                                        </li>
                                    @else
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END sidebar widget item -->

        @yield('content')

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="auto-container">
                <div class="inner-container" style="background-image: url(images/background/pattern-11.png)">
                    <div class="row clearfix">

                        <!-- Title Column -->
                        <div class="title-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <h3>Ingin daftar indihome atau konsultasi perihal Layanan Indihome? </h3>
                                <div class="text">Hubungi kami klik tombol berikut..</div>
                            </div>
                        </div>

                        <!-- Form Column -->
                        <div class="form-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="newsletter-form">
                                    @if (!empty($contact->phone_number))
                                        <a href="https://wa.me/{{ $contact->phone_number }}" target="blank">
                                        @else
                                    @endif
                                    <div class="form-group">
                                        <input type="email" name="email" value=""
                                            placeholder="Hubungi Kami ---->>>" required="">
                                        <button type="submit" class="theme-btn btn-style-five"><span
                                                class="txt">WhatsApp</span></button>

                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End CTA Section -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="pattern-layer-one"
                style="background-image: url('{{ asset('images/background/pattern-12.png') }}')"></div>
            <div class="pattern-layer-two"
                style="background-image: url('{{ asset('images/background/pattern-13.png') }}')"></div>
            <div class="auto-container">
                <div class="widgets-section">
                    <div class="logo">
                        @if (!empty($configuration->path))
                            <a href="{{ route('index') }}"><img src="{{ asset($configuration->path) }}"
                                    alt="" /></a>
                        @else
                            Kosong
                        @endif
                    </div>
                    <ul class="contact-info-list">
                        <li>
                            <span class="icon"><img src="{{ asset('images/icons/icon-1.png') }}"
                                    alt="" /></span>
                            @if (!empty($contact->phone_number))
                                <a
                                    href="https://wa.me/{{ $contact->phone_number }}">+{{ $contact->phone_number }}</a><br>
                                <a
                                    href="https://wa.me/{{ $contact->phone_number_2 }}">+{{ $contact->phone_number_2 }}</a>
                            @else
                                Kosong
                            @endif
                        </li>
                        <li>
                            <span class="icon"><img src="{{ asset('images/icons/icon-2.png') }}"
                                    alt="" /></span>
                            @if (!empty($contact->email_address))
                                <a href="mailto:{{ $contact->email_address }}">{{ $contact->email_address }}</a><br>
                                <a href="mailto:{{ $contact->email_address_2 }}">{{ $contact->email_address_2 }}</a>
                            @else
                                Kosong
                            @endif
                        </li>
                        <li>
                            <span class="icon"><img src="{{ asset('images/icons/icon-3.png') }}"
                                    alt="" /></span>
                            @if (!empty($contact->address))
                                {{ $contact->address }}
                            @else
                                Kosong
                            @endif
                        </li>
                    </ul>

                    <!-- Social Box -->
                    <ul class="social-box">
                        @if (!empty($contact->facebook))
                            <li class="facebook">
                                <a href="{{ $contact->facebook }}" class="fa fa-facebook-f"></a>
                            </li>
                        @endif

                        @if (!empty($contact->email_address))
                            <li class="gmail">
                                <a href="mailto:{{ $contact->email_address }}" class="fa fa-envelope">
                                </a>
                            </li>
                        @endif

                        @if (!empty($contact->tiktok))
                            <li class="tiktok">
                                <a href="{{ $contact->tiktok }}" target="_blank" class="fa fa-tiktok">T</a>
                            </li>
                        @endif

                        @if (!empty($contact->phone_number))
                            <li class="whatsapp">
                                <a href="https://wa.me/{{ $contact->phone_number }}" target="_blank"
                                    class="fa fa-whatsapp"></a>
                            </li>
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
                        <div class="copyright"> - <a href="https://wansolution.co.id/">WAN</a></div>
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
        <form method="GET" action="{{ route('blogs.search') }}">
            <div class="form-group">
                <input type="search" name="query" value="{{ request('query') }}" placeholder="Search Here ..."
                    required>
                <button type="submit"><span class="icon fa fa-search"></span></button>
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
