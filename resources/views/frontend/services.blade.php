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
                        <div class="text">Layanan Kami {{ $category->category }}</div>
                        <a class="learn-more" href="{{ route('detail_service', $category->id) }}">Selengkapnya</a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Services Section Two -->

    <!-- Internet Section -->
    <section class="internet-section" style="background-image: url(images/background/11.PNG)">
        <div class="auto-container">
            <div class="clearfix">
                <div class="content-column">
                    <h2>{{ $configuration->overview_1 }}</h2>
                    <div class="text">{{ $configuration->description_1 }}</div>
                    <div class="price">{{ $configuration->price_1 }}</div>
                    <a href="{{ route('about') }}" class="theme-btn btn-style-four"><span class="txt">Read More <i
                                class="lnr lnr-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Internet Section -->


@endsection
