@extends('layouts.front.app')
@php
$p_nam = 'news';
@endphp
@section('page_name' , 'News & Events' )
@section('pageLoader')
<div class="preloader">
    <div class="preloader__image"></div>
</div>
<!-- /.preloader -->
@endsection
@section('css_style_links')
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/animate/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/animate/custom-animate.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/fontawesome/css/all.min.css') }}" />
<!-- used in popup video -->
<link rel="stylesheet"
    href="{{ asset('orionFrontAssets/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
<!-- used on mobile for slider -->
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/nouislider/nouislider.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/nouislider/nouislider.pips.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/odometer/odometer.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/ogenix-icons/style.css') }}">
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/reey-font/stylesheet.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/bxslider/jquery.bxslider.css') }}" />
@if ($p_nam == 'projects')
<link rel="stylesheet"
    href="{{ asset('orionFrontAssets/assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
@endif
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/vegas/vegas.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/jquery-ui/jquery-ui.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/timepicker/timePicker.css') }}" />
@if ($p_nam == 'projects')
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/nice-select/nice-select.css') }}" />
@endif
<!-- template styles -->
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/css/packages.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
<link href="https://cdn.jsdelivr.net/npm/lightgallery@2.3.0/css/lightgallery.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/css/style.css') }}" />
@endsection
@section('cust_js')
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jarallax/jarallax.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}">
</script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}">
</script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/odometer/odometer.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/wnumb/wNumb.min.js') }}"></script>
<!-- related with loader -->
<script src="{{ asset('orionFrontAssets/assets/vendors/wow/wow.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/isotope/isotope.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/countdown/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/vegas/vegas.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/timepicker/timePicker.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/circleType/jquery.circleType.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/circleType/jquery.lettering.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/nice-select/jquery.nice-select.min.js') }}"></script>

<!-- template js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/lightgallery.min.js"
    integrity="sha512-+1CyleTPoFvPO15/CfBZ5h6k/mu/qCQe9uxq1tEfO7SRJ52MnCAQ561bAYkvrsGtnG7AkcvKtVwdeoZc8ps7bQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
<script>
    $(document).ready(function () {
      // Initialize LightGallery
      var lightGalleryInstance = lightGallery(document.getElementById('customize-thumbnails-gallery'), {
        selector: 'a',
        addClass: 'lg-custom-thumbnails',
        appendThumbnailsTo: '.lg-outer',
        animateThumb: true,
        allowMediaOverlap: true,
        speed: 500,
        closeOnTap: true,
        hideBarsDelay: 3000,
        loop: true,
        download: false,
        counter: true,
        enableSwipe: true,
        enableDrag: true,
        swipeThreshold: 50,
        thumbnail: true,
        animateThumb: true,
        currentPagerPosition: 'middle',
        thumbWidth: 100,
        thumbHeight: '80px',
        thumbContHeight: 100,
        showThumbByDefault: true,
        toogleThumb: true,
        fullScreen: true,
        zoom: true,
        scale: 1,
        actualSize: true
      });

    });
</script>
<script src="{{ asset('orionFrontAssets/assets/js/main.js') }}"></script>
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
                <li><a href="{{ route('news.index') }}">NEWS & EVENTS</a></li>
            </ul>
            <h2 class="fnt-clr-g">News & Events</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
<!--Portfolio Details page Start-->
<!--News Details Start-->
<section class="news-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                {{-- @dd($event) --}}
                <div class="news-details__left">
                    <div class="news-details__img">
                        <img src="{{ asset('orionFrontAssets/assets/images/blog/'.$event->main_image) }}" alt="">
                        <div class="news-details__date">
                            <p>{{ $event->created_at}}</p>
                        </div>
                    </div>
                    <div class="news-details__content">
                        <ul class="list-unstyled news-details__meta">
                            <li><i class="fas fa-tag"></i>Apartment
                            </li>
                            <li><i class="fas fa-user-circle"></i>by Admin
                            </li>
                        </ul>
                        <h3 class="news-details__title">{{ $event->title }}</h3>
                        <p class="news-details__text-1">{{ $event->description }}</p>
                        <p class="news-details__text-2">{{ $event->mini_description }}</p>

                    </div>
                    <div class="news-details__bottom">
                        <p class="news-details__tags">
                            <span>Follow Us For News & Events</span>
                        </p>
                        <div class="news-details__social-list">
                            <a href="https://www.facebook.com/orioncontractingcompany"><i
                                    class="fab fa-facebook"></i></a>
                            <a href="https://www.linkedin.com/company/orion-contracting-company-llc/mycompany/"><i
                                    class="fab fa-linkedin"></i></a>
                            <a href="https://www.youtube.com/@orioncontracting9881"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">

                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Latest Events</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            @foreach ($events as $eventt )

                            <li>
                                <div class="sidebar__post-image">
                                    <img src="{{ asset('orionFrontAssets/assets/images/blogs/' . $eventt->main_image) }}"
                                        alt="">
                                </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <a href="{{ route('news.show' , ['news' => $eventt->id]) }}">{{ $eventt->title
                                            }}</a>
                                    </h3>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--News Details End-->


<div class="container-fluid">
    <section class="testimonial-two" style="padding: 50px 0 50px;">
        <div class="testimonial-two__bg"
            style="background-image: url({{ asset('orionFrontAssets/assets/images/backgrounds/testimonial-two-bg.jpg') }});">
        </div>
        <div class="testimonial-two__bg-img">
        </div>
        <div class="testimonial-two__shape-1">

        </div>

    </section>

</div>
<div class="container" style="margin-top: 120px;">
    <div id="customize-thumbnails-gallery">
        <ul class="flip-items enhanced-reflection">
            {{-- @foreach ( $project->getMedia("flipster") as $media )
            <li data-flip-title="Title {{ $loop->index + 1 }}">
                <a class="flipster__item" href="{{ $media->getFullUrl() }}">
                    <img src="{{ $media->getFullUrl() }}" />
                </a>
            </li>
            @endforeach --}}
        </ul>
    </div>

</div>

<!--Video One Start-->
<section class="video-one">
    <div class="video-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/blog/' . $event->main_image) }})">
    </div>
    <div class="video-one-border"></div>
    <div class="video-one-border video-one-border-two"></div>
    <div class="video-one-border video-one-border-three"></div>
    <div class="video-one-border video-one-border-four"></div>
    <div class="video-one-border video-one-border-five"></div>
    <div class="video-one-border video-one-border-six"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="video-one__inner">
                    <div class="video-one__video-link">
                        <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                            <div class="video-one__video-icon">
                                <span class="fa fa-play"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>
                    </div>

                    <h2 class="video-one__video-title">We Will Be Happy to Share
                        <br> Our Project Video
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Video One End-->

@endsection
