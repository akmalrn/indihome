@extends('frontend.layouts')
@section('content')
    <!-- Main Section -->
    <section class="main-slider">

        <div class="main-slider-carousel owl-carousel owl-theme">

            @if ($sliders && $sliders->isNotEmpty())
                @foreach ($sliders as $slider)
                    <div class="slide" style="background-image: url('{{ asset('uploads/sliders/' . $slider->path) }}')">
                        <div class="pattern-layer" style="background-image: url(images/main-slider/pattern-layer.png)"></div>
                        <div class="color-layer-one"></div>
                        <div class="color-layer-two"></div>
                        <div class="color-layer-three"></div>
                        <div class="auto-container">

                            <!-- Content Boxed -->
                            <div class="content-boxed">
                                <div class="inner-box">
                                    <div class="title">{{ $slider->title }}</div>
                                    <h1>{{ $slider->overview }}</h1>
                                    <div class="btns-box">
                                        <a href="{{ route('about') }}" class="theme-btn btn-style-two"><span
                                                class="txt">Read More
                                                <i class="lnr lnr-arrow-right"></i></span></a>
                                        <a href="{{ route('contact') }}" class="theme-btn btn-style-three"><span
                                                class="txt">Contact Now <i class="lnr lnr-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            @else
            <div class="slide">
                <div class="pattern-layer" style="background-image: url(images/main-slider/pattern-layer.png)"></div>
                <div class="color-layer-one"></div>
                <div class="color-layer-two"></div>
                <div class="color-layer-three"></div>
                <div class="auto-container">

                    <!-- Content Boxed -->
                    <div class="content-boxed">
                        <div class="inner-box">
                            <div class="title">Kosong</div>
                            <h1>Kosong</h1>
                            <div class="btns-box">
                                <a href="{{ route('about') }}" class="theme-btn btn-style-two"><span
                                        class="txt">Read More
                                        <i class="lnr lnr-arrow-right"></i></span></a>
                                <a href="{{ route('contact') }}" class="theme-btn btn-style-three"><span
                                        class="txt">Contact Now <i class="lnr lnr-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endif
        </div>

    </section>
    <!-- End Main Section -->

    <!-- Appointment Section -->
    <section class="appointment-section" style="background-image: url(images/background/pattern-1.png)">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Title Column -->
                <div class="title-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3>Hubungi Kami Untuk Mendapatkan Layanan</h3>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="appointment-form">
                            <a href="https://wa.me/{{ $contact->phone_number }}" target="blank">
                                <div class="form-group">
                                    <input type="email" name="email" value="" placeholder="Disini ---->>>"
                                        required="">
                                    <button type="submit" class="theme-btn btn-style-five"><span
                                            class="txt">WhatsApp</span></button>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Appointment Section -->

    <!-- Services Section -->
    <section class="services-section" style="background-image: url(images/background/pattern-2.png)">
        <div class="auto-container">

            <!-- Upper Section -->
            <div class="upper-section">
                <div class="row clearfix">
                    @foreach ($categoryservices as $category)
                        <div class="service-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <span class="border-one"></span>
                                <span class="border-two"></span>
                                <h4><a href="">{{ $category->category }}</a></h4>
                                <div class="text">IndiHome adalah layanan digital terintegrasi yang disediakan oleh Telkom
                                    Indonesia.</div>
                                <div class="icon"><img src="images/icons/service-1.svg" alt="" /></div>
                                <a class="services" href="{{ route('services') }}">Dapatkan Layanan <span
                                        class="arrow lnr lnr-arrow-right"></span></a>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <!-- End Upper Section -->

            <!-- Lower Section -->
            <div class="lower-section">
                <div class="row clearfix">

                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column titlt" data-tilt data-tilt-max="3">
                            <div class="color-layer"></div>
                            <div class="border-layer"></div>
                            <div class="image">
                                @if ($whyus && $whyus->path)
                                    <img src="{{ asset('uploads/whyus/' . $whyus->path) }}" alt="" />
                                @else
                                    Gambar Kosong
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <div class="title">SIAPA KITA</div>
                                <h2>
                                    @if ($whyus && $whyus->title)
                                        {{ $whyus->title }}
                                    @else
                                        Judul Kosong
                                    @endif
                                </h2>
                            </div>
                            <div class="bold-text">
                                @if ($whyus && $whyus->overview)
                                    {{ $whyus->overview }}
                                @else
                                    Ringkasan Kosong
                                @endif
                            </div>
                            <div class="text">
                                @if ($whyus && $whyus->description)
                                    {!! $whyus->description !!}
                                @else
                                    Deskripsi Kosong
                                @endif
                            </div>
                            <a href="{{ route('about') }}" class="theme-btn btn-style-four"><span class="txt">Read More
                                    <i class="lnr lnr-arrow-right"></i></span></a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Lower Section -->

        </div>
    </section>
    <!-- End Services Section -->

    <!-- Pricing Section -->
    <section class="pricing-section" style="background-image: url(images/background/pattern-3.png)">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title light centered">
                <div class="title">Paket Harga</div>
                <h2>Pilih paket Anda
                </h2>
            </div>
            <!-- End Sec Title -->
            <div class="row clearfix">

                <!-- Price Block -->
                @if ($pricings && !$pricings->isEmpty())
                    @foreach ($pricings as $pricing)
                        <div class="price-block col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="upper-box" style="background-image: url(images/background/pattern-4.png)">
                                    <ul class="icon-list">
                                        <li><span class="icon"><img src="images/icons/service-1.svg"
                                                    alt="" /></span></li>
                                    </ul>
                                    <h4>{{ $pricing->title }} <span>{{ $pricing->overview }}</span></h4>
                                </div>
                                <div class="lower-box">
                                    <ul class="price-list">
                                        {!! $pricing->description !!}
                                    </ul>
                                    <div class="button-box">
                                        <a href="{{ route('price') }}" class="theme-btn btn-style-four">
                                            <span class="txt">Get started</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

            </div>
        @else
            <p style="text-align: center; color:white;">Pricing Kosong</p>
            @endif
        </div>
    </section>
    <!-- End Pricing Section -->

    <!-- Facility Section -->
    <section class="facility-section" style="background-image: url(images/background/pattern-6.png)">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title">
                <div class="clearfix">
                    <div class="pull-left">
                        <div class="title">Fasilitas Kami
                        </div>
                        <h2>Hanya sedikit alasan <br> bagus yang bisa <br> diajukan
                            kamu memilih kami </h2>
                    </div>
                    <div class="pull-right">
                        <div class="text">Bisnis adalah kegiatan mencari nafkah<br> atau menghasilkan uang dengan cara
                            berproduksi<br>
                            cumsociis natoque penatibus et magnis <br>partu rient to montes. Aene dan<br>
                            massa. cumsociis natoque penatibus.</div>
                    </div>
                </div>
            </div>
            <!-- End Sec Title -->
            <div class="row clearfix">

                <!-- Blocks Column -->
                <div class="blocks-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="row clearfix">

                            <!-- Facility Block -->
                            @foreach ($superioritys as $superiority)
                                <div class="facility-block col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="pattern-layer"
                                            style="background-image: url(images/background/pattern-14.png)"></div>
                                        {!! $superiority->icon !!}
                                        <h5><a href="">{{ $superiority->title }}</a></h5>
                                        <div class="text">{!! $superiority->description !!}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="pattern-layer"></div>
                        <div class="image wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            @if ($configuration && $configuration->path_services)
                                <img src="{{ $configuration->path_services }}" alt="" />
                            @else
                                Kosong
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Facility Section -->

    <!-- Internet Section -->
    <section class="internet-section"
        style="background-image: url({{ !empty($configuration->path_1) ? asset($configuration->path_1) : asset('default-image.jpg') }})">
        <div class="auto-container">
            <div class="clearfix">
                <div class="content-column">
                    @if ($configuration && $configuration->overview_1)
                        <h2>{{ $configuration->overview_1 }}</h2>
                    @else
                        -
                    @endif
                    @if ($configuration && $configuration->description_1)
                        <div class="text">{{ $configuration->description_1 }}</div>
                    @else
                        -
                    @endif
                    @if ($configuration && $configuration->price_1)
                        <div class="price">{{ $configuration->price_1 }}</div>
                    @else
                        -
                    @endif
                    <a href="{{ route('about') }}" class="theme-btn btn-style-four"><span class="txt">Read More <i
                                class="lnr lnr-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Internet Section -->

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="image-layer" style="background-image: url(images/background/pattern-7.png)"></div>
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="title">kesaksian</div>
                <h2>
                    Apa yang klien kami katakan</h2>
            </div>
            <!-- End Sec Title -->

            <div class="testimonial-carousel owl-carousel owl-theme">

                @foreach ($testimonialClients as $testimonial)
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="upper-box">
                            <div class="text">{!! $testimonial->description !!}</div>
                        </div>
                        <div class="lower-box">
                            <div class="color-layer"></div>
                            <div class="pattern-layer" style="background-image: url(images/background/pattern-8.png)">
                            </div>
                            <div class="author-image-outer">
                                <span class="quote-icon fa fa-quote-left"></span>
                                <div class="author-image">
                                    <img src="{{ asset('uploads/testimonialClients/'. $testimonial->path) }}" alt="" />
                                </div>
                            </div>
                            <div class="author-name">{{ $testimonial->name }}</div>
                            <div class="designation">{{ $testimonial->position }}</div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Testimonial Section -->

    <!-- Clients Section -->
    <section class="clients-section">
        <div class="auto-container">

            <div class="carousel-outer">
                <!--Sponsors Slider-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    @if ($partners && $partners->count() > 0)
                        @foreach ($partners as $partner)
                            <li>
                                <div class="image-box">
                                    <a href="#"><img src="{{ asset($partner->path) }}"
                                            alt="{{ $partner->name }}"></a>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <p style="text-align: center">Partner Kosong</p>
                    @endif
                </ul>
            </div>

        </div>
    </section>
    <!-- End Clients Section -->

    <!-- Featured Section -->

    <!-- End Featured Section -->


@endsection
