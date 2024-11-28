@extends('frontend.layouts')
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/7.jpg)">
        <div class="auto-container">
            <h2>Tentang Kita
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Beranda</a></li>
                    <li>Tentang Kita</li>
                </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Network Section / Style Two -->
    <section class="network-section style-two" style="background-image: url(images/background/2.jpg)">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Image Column -->
                    <div class="images-column col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <img src="{{ asset($about->path) }}" alt="" />
                            </div>
                        </div>
                    </div>

                    <!-- Content Column -->
                    <div class="content-column col-lg-5 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <div class="separator"></div>
                                <h2>{{ $about->title }}</h2>
                                <div class="text">{{ $about->overview }}</div>
                            </div>
                            <!-- Network List -->
                            <ul class="network-list">
                                {!! $about->description !!}
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Network Section / Style Two -->

    <!-- Appointment Section -->
    <section class="appointment-section" style="background-image: url(images/background/pattern-1.png)">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Title Column -->
                <div class="title-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3>Mari temukan penawaran dan layanan yang tersedia di wilayah Anda
                        </h3>
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

    <!-- Services Section Three -->
    <section class="services-section-three" style="background-image: url(images/background/pattern-6.png)">
        <div class="auto-container">
            <div class="sec-title clearfix">
                <div class="pull-left">
                    <div class="separator"></div>
                    <h2>Beberapa Alasan Hebat yang <br> Dibuat
                        Anda Memilih kami</h2>
                </div>
                <div class="pull-right">
                    <a href="services.html" class="theme-btn btn-style-four"><span class="txt">View Services <i
                                class="lnr lnr-arrow-right"></i></span></a>
                </div>
            </div>
            <div class="row clearfix">

                <!-- Facility Block -->
                @foreach ($superioritys as $superiority)
                    <div class="facility-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="pattern-layer" style="background-image: url(images/background/pattern-14.png)">
                            </div>
                            {!! $superiority->icon !!}
                            <h5><a href="{{ route('services') }}">{{ $superiority->title }}</a></h5>
                            <div class="text">{!! $superiority->description !!}</div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Services Section Three -->

    <!-- Team Section -->
    <section class="team-section" style="background-image: url(images/background/pattern-25.png)">
        <div class="auto-container">

            <!-- Sec Title -->
            <div class="sec-title centered light">
                <div class="separator"></div>
                <h2>
                    Temui Pakar Kami</h2>
            </div>
            <!-- End Sec Title -->

            <div class="three-item-carousel owl-carousel owl-theme">

                <!-- Team Block -->
                @foreach ($ourteam as $team)
                <div class="team-block">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ asset($team->path) }}" alt="" style="width: 480px; height: 400px;">
                            <div class="overlay-box">
                                <h6>{{ $team->name }}</h6>
                                <div class="designation">{{ $team->position }}</div>
                            </div>
                            <div class="overlay-box-two">
                                <h6>{{ $team->name }}</h6>
                                <div class="designation">{{ $team->position }}</div>
                                <div class="text">{!! $team->description !!}</div>
                                <!-- Social Box -->
                                <ul class="social-box">
                                    @if ($team->facebook)
                                        <li><a href="{{ $team->facebook }}" class="fa fa-facebook-f" target="_blank"></a></li>
                                    @endif
                                    @if ($team->twitter)
                                        <li><a href="{{ $team->twitter }}" class="fa fa-twitter" target="_blank"></a></li>
                                    @endif
                                    @if ($team->dribbble)
                                        <li><a href="{{ $team->dribbble }}" class="fa fa-dribbble" target="_blank"></a></li>
                                    @endif
                                    @if ($team->linkedin)
                                        <li><a href="{{ $team->linkedin }}" class="fa fa-linkedin" target="_blank"></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>
        </div>
    </section>
    <!-- End Team Section -->

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="image-layer style-two" style="background-image: url(images/background/pattern-7.png)"></div>
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="title">kesaksian
                </div>
                <h2>Apa yang klien kami katakan
                </h2>
            </div>
            <!-- End Sec Title -->

            <div class="testimonial-carousel owl-carousel owl-theme">

                <!-- Testimonial Block -->
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
    <!-- End Clients Section / Style Two -->

@endsection
