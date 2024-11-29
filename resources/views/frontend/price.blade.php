@extends('frontend.layouts')
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{ asset('images/background/8.jpg') }})">
        <div class="auto-container">
            <h2>Paket Kami</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('index') }}">Beranda</a></li>
                <li>Paket</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Pricing Section Two / Style Two -->
    <section class="pricing-section-two style-two">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="separator"></div>
                <h2>Temukan Paket Terbaik Kami</h2>
            </div>
            <!-- End Sec Title -->

            @if ($price && $price->isNotEmpty())
                @foreach ($price as $item)
                    <div class="price-block-two">
                        <div class="inner-box">
                            <!-- Title Box -->
                            <div class="title-box">
                                <div class="title"></div>
                                <h4><a href="https://wa.me/{{ $contact->phone_number }}" target="blank">{{ $item->title }}</a></h4>
                                <div class="text">Choose from a range of fast, reliable Internet speeds to fit your needs
                                </div>
                            </div>
                            <!-- End Title Box -->

                            <!-- Middle Content -->
                            <div class="middle-content">
                                <div class="middle-inner">
                                    <ul class="icon-list">
                                        <li><span class="icon"><img src="{{ asset('images/icons/service-1.svg') }}"
                                                    alt="" /></span></li>
                                        <li><span class="icon"><img src="{{ asset('images/icons/service-2.svg') }}"
                                                    alt="" /></span></li>
                                    </ul>
                                    <ul class="price-list">
                                        {!! $item->description !!}
                                    </ul>
                                </div>
                            </div>
                            <!-- End Middle Content -->

                            <!-- Price Box -->
                            <div class="price-box">
                                <div class="price">{{ $item->overview }}<span></span></div>
                                <a href="{{ route('about') }}" class="theme-btn btn-style-four"><span class="txt">Memulai
                                </span></a>
                            </div>
                            <!-- End Price Box -->

                        </div>
                    </div>
                @endforeach
            @else
                <p style="text-align: center">Harga Kosong</p>
            @endif
        </div>
    </section>
    <!-- End Pricing Section Two -->

    <!-- Internet Section Three -->
    <section class="internet-section-three" style="background-image: url('{{ asset($configuration->path_1) }}');">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Placeholder for future video/image -->
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title light">
                            <div class="separator"></div>
                            <h2>{{ $configuration->overview_1 }}</h2>
                        </div>
                        <div class="text">{{ $configuration->description_1 }}</div>
                        <div class="price">{{ $configuration->price_1 }}</div>
                        <a href="{{ route('about') }}" class="theme-btn btn-style-two"><span class="txt">Read More <i
                                    class="lnr lnr-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Internet Section Three -->

    <!-- Pricing Section -->
    <section class="pricing-section style-two">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="title">
                    Paket Harga</div>
                <h2>Pilih paket Anda</h2>
            </div>
            <!-- End Sec Title -->
            <div class="row clearfix">
                @if ($price && $price->isNotEmpty())
                    @foreach ($price as $item)
                        <div class="price-block col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="upper-box" style="background-image: url({{ asset('images/background/pattern-4.png') }})">
                                    <ul class="icon-list">
                                        <li><span class="icon"><img src="{{ asset('images/icons/service-1.svg') }}"
                                                    alt="" /></span></li>
                                    </ul>
                                    <h4>{{ $item->title }} <span>{{ $item->overview }}</span></h4>
                                </div>
                                <div class="lower-box">
                                    <ul class="price-list">
                                        {!! $item->description !!}
                                    </ul>
                                    <div class="button-box">
                                        <a href="https://wa.me/{{ $configuration->phone_number }}" target="_blank"
                                            class="theme-btn btn-style-four"><span class="txt">Memulai
                                            </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p style="text-align: center;">Kosong</p>
                @endif
            </div>
        </div>
    </section>
    <!-- End Pricing Section -->
@endsection
