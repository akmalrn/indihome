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
                        @foreach ($types as $type)
                            @if (isset($groupedServices[$type->id]) && $groupedServices[$type->id]->isNotEmpty())
                                <div class="col-12">
                                    <!-- Menampilkan nama tipe layanan -->
                                    <h3>{{ $type->title }}</h3>

                                    <!-- Menampilkan layanan yang sesuai dengan tipe -->
                                    <div class="row">
                                        @foreach ($groupedServices[$type->id] as $service)
                                            <div class="price-block col-lg-4 col-md-6 col-sm-12">
                                                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                                    <div class="upper-box" style="background-image: url({{ asset('images/background/pattern-4.png') }})">
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
                                                            <a href="https://wa.me/{{ $configuration->phone_number }}" target="blank" class="theme-btn btn-style-four"><span class="txt">Memulai</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
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
                                    <h5>Layanan Kami</h5>
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
                                    <h5>Kontak Kami</h5>
                                </div>
                                <ul class="contact-info-widget">
                                    <li>
                                        <span class="icon flaticon-map"></span>
                                        @if (!empty($contact->address))
                                        {{ $contact->address }}
                                        @endif
                                    </li>
                                    <li>
                                        <span class="icon flaticon-call"></span>
                                        @if (!empty($contact->phone_number))
                                        <a href="https://wa.me/{{ $contact->phone_number }}">+{{ $contact->phone_number }}</a><br>
                                        @endif
                                        @if (!empty($contact->phone_number_2))
                                        <a href="https://wa.me/{{ $contact->phone_number_2 }}">+{{ $contact->phone_number_2 }}</a>
                                        @endif
                                    </li>
                                    <li>
                                        <span class="icon flaticon-email-1"></span>
                                        @if (!empty($contact->email_address))
                                        <a href="mailto:{{ $contact->email_address }}">{{ $contact->email_address }}</a><br>
                                        @endif
                                        @if (!empty($contact->email_address_2))
                                        <a href="{{ $contact->email_address_2 }}">{{ $contact->email_address_2 }}</a>
                                        @endif
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

@endsection
