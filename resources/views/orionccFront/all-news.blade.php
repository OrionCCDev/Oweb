@extends('layouts.front.app')
@php
$p_nam = 'news';
@endphp
@section('page_name' , 'News & Events' )

@section('css_style_links')
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/animate/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/animate/custom-animate.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/fontawesome/css/all.min.css') }}" />
<!-- used in popup video -->
<link rel="stylesheet"
    href="{{ asset('orionFrontAssets/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/ogenix-icons/style.css') }}">
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
<!-- template styles -->
<link rel="stylesheet" href="{{ asset_v('orionFrontAssets/assets/css/style.css') }}" />
@endsection
@section('cust_js')
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jarallax/jarallax.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.js') }}"></script>
<!-- related with loader -->
<script src="{{ asset('orionFrontAssets/assets/vendors/wow/wow.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>


<script src="{{ asset_v('orionFrontAssets/assets/js/main.js') }}"></script>
@endsection
@section('page_content')
<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/resources/project-up-back.webp') }})">
    </div>
    <div class="page-header__ripped-paper"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/page-header-ripped-paper.png') }});">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span>/</span></li>
                <li>NEWS & EVENTS</li>
            </ul>
            <h2 class="fnt-clr-g">{{ setting('news_page.title', 'News & Events') }}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
<!--News Sidebar Start-->
<section class="news-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="news-sidebar__left">
                    <div class="news-sidebar__content">
                        @foreach ( $data as $event )

                        <!--News Sidebar Single Start-->
                        <div class="news-sidebar__single">
                            <div class="news-sidebar__img">
                                <img src="{{ $event->hasMedia('events') ? $event->getFirstMediaUrl('events') : asset('orionFrontAssets/assets/images/blog/' . $event->main_image) }}"
                                    alt="">
                                <div class="news-sidebar__date">
                                    <p>{{ $event->created_at->format('d M') }}</p>
                                </div>
                            </div>
                            <div class="news-sidebar__content-box">
                                <ul class="list-unstyled news-sidebar__meta">
                                    <li><i class="fas fa-tag"></i>Apartment
                                    </li>
                                    <li><i class="fas fa-user-circle"></i>by
                                        Admin
                                    </li>
                                </ul>
                                <h3 class="news-sidebar__title">
                                    <a href="{{ route('news.show' , ['news' => $event->id]) }}">{{ $event->title }}</a>
                                </h3>
                                <p class="news-sidebar__text">{{ $event->mini_description }}</p>
                                <div class="news-sidebar__bottom">
                                    <a href="{{ route('news.show' , ['news' => $event->id]) }}"
                                        class="news-sidebar__read-more">Read More <span
                                            class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                        <!--News Sidebar Single End-->

                        @endforeach
                    </div>

                    <div class="news-sidebar__load-more">
                        <div class="row">
                            <div class="col-xl-12">
                                {{ $data->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--News Sidebar End-->


@endsection
