@extends('frontend.layouts')
@section('content')

	<!-- Page Title -->
    <section class="page-title" style="background-image: url('{{ asset('images/background/10.jpg') }}')">

        <div class="auto-container">
			<h2>Berita Blog</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{ route('index') }}">Beranda</a></li>
				<li>Berita Blog</li>
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
                    <div class="blog-classic">

                        <!-- News Block Two -->
                        @if($blogs->count())
                        <h4>Results for: "{{ $query }}"</h4>
                        @foreach ($blogs as $blog)
                            <div class="news-block-two">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="{{ route('blog-detail', $blog->id) }}"><img src="{{ asset('uploads/blogs/' . $blog->path) }}" alt="" /></a>
                                    </div>
                                    <div class="lower-content">
                                        <ul class="post-meta">
                                            <li><span class="icon flaticon-user"></span>By Admin</li>
                                            <li><span class="icon flaticon-chat-2"></span></li>
                                        </ul>
                                        <h4><a href="{{ route('blog-detail', $blog->id) }}">{{ $blog->title }}</a></h4>
                                        <div class="text">{{ $blog->overview }}</div>
                                        <a href="{{ route('blog-detail', $blog->id) }}" class="theme-btn btn-style-four">
                                            <span class="txt">Baca Selengkapnya <i class="lnr lnr-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Pagination -->
                        <div class="pagination-wrapper">
                            {{ $blogs->links() }}
                        </div>
                    @else
                        <h4>No results found for: "{{ $query }}"</h4>
                    @endif


                    </div>

                    <!-- Pagination -->
                    <div class="pagination-wrapper">
                        {{ $blogs->links('pagination::bootstrap-4') }}
                    </div>
                </div>


				<!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">

						<!-- Search -->
						<div class="sidebar-widget search-box">
							<form method="GET" action="{{ route('blogs.search') }}">
                                <div class="form-group">
                                    <input type="search" name="query" value="{{ request('query') }}" placeholder="Search Here ..." required>
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
						</div>

						<!-- Services Widget -->
						<div class="sidebar-widget services-widget">
							<div class="widget-content">
								<div class="sidebar-title">
									<h5>Kategory</h5>
								</div>
								<ul class="service-list">
                                        @foreach ($categoryBlogs as $category)
                                        <li><a href="#">{{ $category->category }}</a></li>
                                        @endforeach

								</ul>
							</div>
						</div>

						<!-- Popular Posts -->
                        <div class="sidebar-widget popular-posts">
							<div class="widget-content">
								<div class="sidebar-title">
									<h5>
                                        Postingan Terbaru</h5>
								</div>
                                @foreach ($blogs as $blog)
                                <article class="post">
									<figure class="post-thumb"><img src="{{ asset('uploads/blogs/'. $blog->path) }}" alt=""><a href="{{ route('blog-detail', $blog->id) }}" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
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
								<p>
                                    @foreach (explode(',', $configuration->meta_keywords ?? 'Default Keyword') as $keyword)
                                        <a href="">{{ trim($keyword) }}</a>
                                    @endforeach
                                </p>
							</div>
						</div>

					</aside>
				</div>

			</div>
		</div>
	</section>
	<!-- End Sidebar Page Container -->

	@endsection
