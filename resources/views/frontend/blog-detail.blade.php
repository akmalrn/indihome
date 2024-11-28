@extends('frontend.layouts')
@section('content')
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
            <h2>Blog </h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('index') }}">Beranda</a></li>
                <li>Blog</li>
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

                    <div class="blog-detail">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset('uploads/blogs/' . $blog->path) }}" alt="" />
                            </div>
                            <div class="lower-content">
                                <h4>{{ $blog->title }}</h4>
                                <ul class="post-meta">
                                    <li><span class="icon flaticon-user"></span>By Admin</li>
                                    <li><span class="icon flaticon-chat-2"></span></li>
                                </ul>
                                {!! $blog->description !!}
                                <div class="two-column">
                                    <div class="row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <div class="image">
                                                <img src="images/resource/news-8.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <div class="image">
                                                <img src="images/resource/news-9.jpg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="post-share-options">
                                    <div class="post-share-inner clearfix">
                                        <div class="pull-left tags"><span class="tags">Tags:</span>
                                            @if (!empty($blog->keywords))
                                                @foreach (explode(',', $blog->keywords) as $keyword)
                                                    <a href="#">{{ trim($keyword) }}</a>
                                                @endforeach
                                            @else
                                                <a href="#">Default Keyword</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- More Posts -->
                                <div class="more-posts">
                                    <div class="clearfix">
                                        <div class="prev pull-left">
                                            @if ($previousBlog)
                                                <a href="{{ route('blog-detail', $previousBlog->id) }}">
                                                    <span class="fa fa-angle-left"></span>&nbsp; Previous Post
                                                </a>
                                            @else
                                                <span>No Previous Post</span>
                                            @endif
                                        </div>

                                        <div class="next pull-right">
                                            @if ($nextBlog)
                                                <a href="{{ route('blog-detail', $nextBlog->id) }}">
                                                    Next Post &nbsp;<span class="fa fa-angle-right"></span>
                                                </a>
                                            @else
                                                <span>No Next Post</span>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>

                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">

                        <!-- Search -->
                        <div class="sidebar-widget search-box">
                            <form method="post" action="contact.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Search Here ..."
                                        required>
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>

                        <!-- Services Widget -->
                        <div class="sidebar-widget services-widget">
                            <div class="widget-content">
                                <div class="sidebar-title">
                                    <h5>Our Services</h5>
                                </div>
                                <ul class="service-list">
                                    <li><a href="#">Broadband</a></li>
                                    <li><a href="#">TV & Streaming</a></li>
                                    <li><a href="#">Satellite TV</a></li>
                                    <li><a href="#">Home Phone</a></li>
                                    <li><a href="#">Home Security</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Popular Posts -->
                        <div class="sidebar-widget popular-posts">
                            <div class="widget-content">
                                <div class="sidebar-title">
                                    <h5>Postingan Terbaru</h5>
                                </div>
                                @foreach ($blogs as $blog)
                                <article class="post">
									<figure class="post-thumb"><img src="{{ asset('uploads/blogs/'. $blog->path) }}" alt=""><a href="news-detail.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<div class="text"><a href="{{ route('blog-detail', $blog->id) }}">{{ $blog->title }}</a></div>
									<div class="post-info">{{ $blog->created_at->format('d-m-Y') }}
                                        <span></span></div>
								</article>
                                @endforeach

                            </div>
                        </div>

                        <!-- Tags Widget -->
                        <div class="sidebar-widget popular-tags">
                            <div class="widget-content">
                                <div class="sidebar-title">
                                    <h5>Tags</h5>
                                </div>
                                @foreach (explode(',', $configuration->meta_keywords ?? 'Default Keyword') as $keyword)
                                <a href="">{{ trim($keyword) }}</a>
                            @endforeach
                            </div>
                        </div>

                    </aside>
                </div>

            </div>
        </div>
    </section>
    <!-- End Sidebar Page Container -->

@endsection
