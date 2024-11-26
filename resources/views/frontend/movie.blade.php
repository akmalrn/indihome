@extends('frontend.layouts')
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/8.jpg)">
        <div class="auto-container">
            <h2>Movie & Shows</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Movie Shows</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Movie Page Section -->
    <section class="movie-page-section">
        <div class="auto-container">

            <!-- MixitUp Galery -->
            <div class="mixitup-gallery">

                <!-- Filter -->
                <div class="filters clearfix">

                    <ul class="filter-tabs filter-btns text-center clearfix">
                        <li class="active filter" data-role="button" data-filter="all">All</li>
                        <li class="filter" data-role="button" data-filter=".movies">Movies</li>
                        <li class="filter" data-role="button" data-filter=".shows">Shows</li>
                        <li class="filter" data-role="button" data-filter=".cartoons">Cartoons</li>
                    </ul>

                </div>

                <div class="filter-list row clearfix">

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block style-two mix all shows movies cartoons">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image video-box"><span
                                        class="flaticon-play-arrow"><i class="ripple"></i></span></a>
                                <img src="images/resource/feature-1.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">Robin Hood</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2010</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all ">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image video-box"><span
                                        class="flaticon-play-arrow"><i class="ripple"></i></span></a>
                                <img src="images/resource/feature-2.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">Bad Boys Life</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2011</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all shows cartoons">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image video-box"><span
                                        class="flaticon-play-arrow"><i class="ripple"></i></span></a>
                                <img src="images/resource/feature-3.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">Hot Dolitle</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2012</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all movies">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image video-box"><span
                                        class="flaticon-play-arrow"><i class="ripple"></i></span></a>
                                <img src="images/resource/feature-4.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">Invisible Man</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2013</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all shows cartoons">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws"
                                    class="lightbox-image video-box"><span class="flaticon-play-arrow"><i
                                            class="ripple"></i></span></a>
                                <img src="images/resource/feature-5.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">Onward Hood</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2014</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all movies">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws"
                                    class="lightbox-image video-box"><span class="flaticon-play-arrow"><i
                                            class="ripple"></i></span></a>
                                <img src="images/resource/feature-6.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">Tenet Life</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2015</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all shows cartoons">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws"
                                    class="lightbox-image video-box"><span class="flaticon-play-arrow"><i
                                            class="ripple"></i></span></a>
                                <img src="images/resource/feature-7.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">The Grudge</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2016</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all movies">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws"
                                    class="lightbox-image video-box"><span class="flaticon-play-arrow"><i
                                            class="ripple"></i></span></a>
                                <img src="images/resource/feature-8.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">Underwater</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2017</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all shows cartoons">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws"
                                    class="lightbox-image video-box"><span class="flaticon-play-arrow"><i
                                            class="ripple"></i></span></a>
                                <img src="images/resource/feature-9.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">The Turning</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2018</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all movies">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws"
                                    class="lightbox-image video-box"><span class="flaticon-play-arrow"><i
                                            class="ripple"></i></span></a>
                                <img src="images/resource/feature-10.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">Birds of Prey</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2019</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all movies">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws"
                                    class="lightbox-image video-box"><span class="flaticon-play-arrow"><i
                                            class="ripple"></i></span></a>
                                <img src="images/resource/feature-6.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">Robin Hood</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2020</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all shows cartoons">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws"
                                    class="lightbox-image video-box"><span class="flaticon-play-arrow"><i
                                            class="ripple"></i></span></a>
                                <img src="images/resource/feature-7.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">The Lodge</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2022</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all movies">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws"
                                    class="lightbox-image video-box"><span class="flaticon-play-arrow"><i
                                            class="ripple"></i></span></a>
                                <img src="images/resource/feature-8.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">Fantasy Island</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2022</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all shows cartoons">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws"
                                    class="lightbox-image video-box"><span class="flaticon-play-arrow"><i
                                            class="ripple"></i></span></a>
                                <img src="images/resource/feature-9.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">Downhill</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2023</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block / Style Two -->
                    <div class="feature-block mix style-two all movies">
                        <div class="inner-box">
                            <div class="image">
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws"
                                    class="lightbox-image video-box"><span class="flaticon-play-arrow"><i
                                            class="ripple"></i></span></a>
                                <img src="images/resource/feature-10.jpg" alt="" />
                                <div class="overlay-box">
                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-star"></span>5.7</li>
                                        <li><span class="icon fa fa-comment"></span>25</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="services-detail.html">Wendy</a></h6>
                                    </div>
                                    <div class="pull-right">
                                        <div class="year">2024</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- End Movie Page Section -->

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
