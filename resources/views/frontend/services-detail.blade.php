@extends('frontend.layouts')
@section('content')
    <!-- Page Title -->
    <section class="page-title"
        style="background-image: url({{ asset('uploads/services/' . $services->first()->category->path) }})">
        <div class="auto-container">
            <h2>{{ $services->first()->category->category }}</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('index') }}">Beranda</a></li>
                <li>{{ $services->first()->category->category }}</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Sidebar Page Container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="price-block col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="upper-box"
                                        style="background-image: url({{ asset('images/background/pattern-4.png') }})">
                                        <ul class="icon-list">
                                            <li><span class="icon"><img src="{{ asset('images/icons/service-1.svg') }}" alt="" /></span></li>
                                        </ul>
                                        <h4>{{ $service->title }} <span>{{ $service->overview }}</span></h4>
                                    </div>
                                    <div class="lower-box">
                                        <ul class="price-list">
                                            {!! $service->description !!}
                                        </ul>
                                        <div class="button-box">
                                            <a href="https://wa.me/{{ $configuration->phone_number }}" target="blank"
                                                class="theme-btn btn-style-four"><span class="txt">
                                                    Memulai</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>



                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">

                        <!-- Services Widget -->
                        <div class="sidebar-widget services-widget">
                            <div class="widget-content">
                                <div class="sidebar-title">
                                    <h5>Our Services</h5>
                                </div>
                                <ul class="service-list">
                                    @foreach ($categoryservices as $category)
                                        <li>
                                            <a href="{{ route('detail_service', $category->id) }}">
                                                {{ $category->category }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <!-- Contact Widget -->
                        <div class="sidebar-widget contact-widget">
                            <div class="widget-content">
                                <div class="sidebar-title">
                                    <h5>Contact Us</h5>
                                </div>
                                <ul class="contact-info-widget">
                                    <li>
                                        <span class="icon flaticon-map"></span>
                                        503 Old Buffalo Street Northwest #205, New York-3087
                                    </li>
                                    <li>
                                        <span class="icon flaticon-call"></span>
                                        <a href="tel:+9684-32-45-789">+9684 32 45 789</a><br>
                                        <a href="tel:+9684-32-45-789">+9684 32 45 789</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-email-1"></span>
                                        <a href="mailto:infoname@gmail.com">infoname@gmail.com</a><br>
                                        <a href="www.yourname.com">www.yourname.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </aside>
                </div>

            </div>
        </div>
    </section>
    <!-- End Sidebar Page Container -->

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="auto-container">
            <div class="inner-container" style="background-image: url(images/background/pattern-11.png)">
                <div class="row clearfix">

                    <!-- Title Column -->
                    <div class="title-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h3>Sign up for our newsletter</h3>
                            <div class="text">Stay up to update with our latest news and products.</div>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="newsletter-form">
                                <form method="post" action="contact.html">
                                    <div class="form-group">
                                        <input type="email" name="email" value="" placeholder="Your Email Address"
                                            required="">
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
