@extends('frontend.layouts')
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/9.jpg)">
        <div class="auto-container">
            <h2>Layanan</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('index') }}">Beranda</a></li>
                <li>Layanan</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Services Section Two -->
    <section class="services-page-section">
        <div class="auto-container">

            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="separator"></div>
                <h2>Jelajahi Layanan Kami
                </h2>
            </div>
            <!-- End Sec Title -->

            <div class="four-item-carousel-two owl-carousel owl-theme">


                @foreach ($categoryservices as $category)
                <div class="service-block-two">
                    <div class="inner-box">
                        <div class="color-layer"></div>
                        <div class="icon-layer-one" style="background-image: url(images/background/pattern-19.png)"></div>
                        <div class="icon-layer-two" style="background-image: url(images/background/pattern-20.png)"></div>
                        <div class="icon"><img src="images/icons/service-5.png" alt="" /></div>
                        <h4>  <a href="{{ route('detail_service', $category->id) }}">    {{ $category->category }}</a></h4>
                        <div class="text">Layanan Kami Asal {{ $category->category }}</div>
                        <a class="learn-more" href="{{ route('detail_service', $category->id) }}">Learn More</a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Services Section Two -->

    <!-- Internet Section -->
    <section class="internet-section" style="background-image: url({{ asset($configuration->path_1) }})">
        <div class="auto-container">
            <div class="clearfix">
                <div class="content-column">
                    <h2>{{ $configuration->overview_1 }}</h2>
                    <div class="text">{{ $configuration->description_1 }}</div>
                    <div class="price">{{ $configuration->price_1 }}</div>
                    <a href="about.html" class="theme-btn btn-style-four"><span class="txt">Read More <i
                                class="lnr lnr-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Internet Section -->

    <!-- Appointment Section -->
    <section class="appointment-section" style="background-image: url(images/background/pattern-1.png)">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Title Column -->
                <div class="title-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3>Mari temukan penawaran dan layanan yang tersedia di wilayah Anda</h3>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="appointment-form">
                            <form method="post" action="contact.html">
                                <div class="form-group">
                                    <input type="email" name="email" value=""
                                        placeholder="Enter street address & apartment" required="">
                                    <button type="submit" class="theme-btn btn-style-two"><span class="txt">Check
                                            Availability <i class="lnr lnr-arrow-right"></i></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Appointment Section -->

    <!-- Faq Section -->
    {{-- <section class="faq-section" style="background-image: url(images/background/4.jpg)">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Accordion Column -->
                <div class="accordion-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <div class="separator"></div>
                            <h3>Few Great Reasons Make <br> You Choose us</h3>
                        </div>

                        <!-- Accordian Box -->
                        <ul class="accordion-box">

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span
                                            class="icon icon-minus fa fa-minus"></span></div>Ultra-Fast and Ultra-Reliable
                                    Connection
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Business is the activity of making on's living or making money
                                            by producing cumsociis natoque penatibus et magnis dis partu rient to montes.
                                            Aene an massa. cumsociis natoque penatibus. </div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block active-block">
                                <div class="acc-btn active">
                                    <div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span
                                            class="icon icon-minus fa fa-minus"></span></div>Free Installation For Combo
                                    Pack
                                </div>
                                <div class="acc-content current">
                                    <div class="content">
                                        <div class="text">Business is the activity of making on's living or making money
                                            by producing cumsociis natoque penatibus et magnis dis partu rient to montes.
                                            Aene an massa. cumsociis natoque penatibus. </div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span
                                            class="icon icon-minus fa fa-minus"></span></div>All kinds of Entertainment in
                                    One Place
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Business is the activity of making on's living or making money
                                            by producing cumsociis natoque penatibus et magnis dis partu rient to montes.
                                            Aene an massa. cumsociis natoque penatibus. </div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span
                                            class="icon icon-minus fa fa-minus"></span></div>Flexible Pricing Plans and
                                    Bundles
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Business is the activity of making on's living or making money
                                            by producing cumsociis natoque penatibus et magnis dis partu rient to montes.
                                            Aene an massa. cumsociis natoque penatibus. </div>
                                    </div>
                                </div>
                            </li>

                        </ul>

                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="pattern-layer" style="background-image: url(images/resource/faq-pattern.png)"></div>
                        <div class="image">
                            <img src="images/resource/faq.png" alt="" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
    <!-- End Faq Section -->

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="auto-container">
            <div class="inner-container" style="background-image: url(images/background/pattern-11.png)">
                <div class="row clearfix">

                    <!-- Title Column -->
                    <div class="title-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h3>Mendaftarlah untuk buletin kami</h3>
                            <div class="text">Ikuti terus berita dan produk terbaru kami.</div>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="newsletter-form">
                                <form method="post" action="contact.html">
                                    <div class="form-group">
                                        <input type="email" name="email" value=""
                                            placeholder="Your Email Address" required="">
                                        <button type="submit" class="theme-btn btn-style-five"><span
                                                class="txt">Subscribe</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End CTA Section -->
@endsection
