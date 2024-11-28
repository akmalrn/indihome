@extends('frontend.layouts')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/10.jpg)">
        <div class="auto-container">
            <h2>Kontak Kami</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('index') }}">Beranda</a></li>
                <li>Kontak Kami</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Contact Page Section -->
    <section class="contact-page-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="title-box">
                            <h4>
                                Detail Kontak</h4>
                        </div>
                        <div class="lower-box">
                            <ul class="info-list">
                                <li>
                                    <span class="icon flaticon-map"></span>
                                    @if (!empty($contact->address))
                                        {{ $contact->address }}
                                    @else
                                        Alamat Kosong
                                    @endif
                                </li>
                                <li>
                                    <span class="icon flaticon-call"></span>
                                    @if (!empty($contact->phone_number))
                                        <a
                                            href="https://wa.me/{{ $contact->phone_number }}">{{ $contact->phone_number }}</a>
                                    @else
                                        -
                                    @endif
                                    <br>
                                    @if (!empty($contact->phone_number_2))
                                        <a
                                            href="https://wa.me/{{ $contact->phone_number_2 }}">{{ $contact->phone_number_2 }}</a>
                                    @else
                                        -
                                    @endif
                                </li>
                                <li>
                                    <span class="icon flaticon-email-1"></span>
                                    @if (!empty($contact->email_address))
                                        <a href="mailto:{{ $contact->email_address }}">{{ $contact->email_address }}</a>
                                    @else
                                        -
                                    @endif
                                    <br>
                                    @if (!empty($contact->email_address_2))
                                        <a href="mailto:{{ $contact->email_address_2 }}">{{ $contact->email_address_2 }}</a>
                                    @else
                                        -
                                    @endif
                                </li>
                            </ul>
                            @if (!empty($contact->hours))
                                <div class="timing">Jam Kerja {{ $contact->hours }}</div>
                            @else
                                -
                            @endif
                            <!-- Social Box -->
                            <ul class="social-box">
                                @if (!empty($contact->facebook))
                                    <li class="facebook"><a href="{{ $contact->facebook }}" class="fa fa-facebook-f"></a>
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
                                            class="fa fa-tiktok"></a>
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

                <!-- Map Column -->
                <div class="map-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!--Map Outer-->
                        <div class="map-outer">
                            @if (!empty($contact->map))
                                <iframe src="{{ $contact->map }}" allowfullscreen=""></iframe>
                            @else
                                <iframe src="https://www.wanteknologi.com" allowfullscreen=""></iframe>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <!-- Contact Form Box -->
            <div class="contact-form-box">
                <!-- Form Title Box -->
                <div class="form-title-box mb-4">
                    <h3>Send a Message</h3>
                </div>

                <!-- Contact Form -->
                <div class="whatsapp-links">
                    @if (!empty($contact->phone_number))
                        <a href="https://wa.me/{{ $contact->phone_number }}" target="_blank"
                            class="whatsapp-btn mb-2 btn btn-primary">
                            Chat with us on WhatsApp: {{ $contact->phone_number }}
                        </a>
                        <br>
                    @endif

                    @if (!empty($contact->phone_number_2))
                        <a href="https://wa.me/{{ $contact->phone_number_2 }}" target="_blank"
                            class="whatsapp-btn btn btn-primary">
                            Chat with us on WhatsApp: {{ $contact->phone_number_2 }}
                        </a>
                    @endif
                </div>

            </div>

            <!-- End Contact Form Box -->

        </div>
    </section>
    <!-- End Contact Page Section -->


@endsection
