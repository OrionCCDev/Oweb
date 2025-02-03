@extends('layouts.front.app')
@php
$p_nam = 'projects';
@endphp
@section('page_name' , $project->name )
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
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/js/flip/jquery.flipster.min.css') }}" />
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
<script src="{{ asset('orionFrontAssets/assets/js/flip/jquery.flipster.min.js') }}"></script>
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
      // Initialize Flipster
      var flipsterInstance = $("#customize-thumbnails-gallery").flipster({
        itemContainer: 'ul',
        itemSelector: 'li',
        style: 'coverflow',
        responsive: true,
        start: 'center',
        loop: false,
        spacing: -0.2,
        visible: 4,
        perspective: 1000,
        autoplay: false,
        pauseOnHover: false,
        click: false,
        keyboard: true,
        scrollwheel: true,
        touch: true,
        nav: false,
        buttons: false,
        buttonPrev: 'Previous',
        buttonNext: 'next',
        onItemSwitch: $.noop
      });
      // Add click event to Flipster items to trigger LightGallery
      $('.flipster__item').on('click', function (e) {
        e.preventDefault();
        var index = $(this).index();
        lightGalleryInstance.openGallery(index);
      });
    });
</script>
<script>
    var videoUrl = @json($videoUrl);

    $(document).ready(function () {
        // Initialize Magnific Popup on the video link
        $('.video-popup{{ $project->id }}').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: '//www.youtube.com/embed/%id%?autoplay=1'
                    }
                }
            }
        });
    });
</script>
<script src="{{ asset('orionFrontAssets/assets/js/main.js') }}" defer></script>
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
                <li><a href="{{ route('projects.index') }}">Projects</a></li>
            </ul>
            <h2 class="fnt-clr-g">{{ $project->Client->name }}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
<!--Portfolio Details page Start-->
<section class="portfolio-details">
    <div class="container">
        <div class="portfolio-details__top">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-title text-center">
                        <span class="section-title__tagline">Checkout Our Project</span>
                        <h2 class="section-title__title">{{ $project->name }}
                            {{-- <br> {{ $project->Client->name }} --}}
                        </h2>
                        <h5>{{ $project->sub_name }}</h5>
                    </div>
                    <div class="portfolio-details__img video-one">
                        <img src="{{ asset('orionFrontAssets/assets/images/project/'.$project->slug_name . '/' . $project->gif ?? $project->main_image) }}"
                            alt="">
                            <div class="video-one-border"></div>
                            <div class="video-one-border video-one-border-two"></div>
                            <div class="video-one-border video-one-border-three"></div>
                            <div class="video-one-border video-one-border-four"></div>
                            <div class="video-one-border video-one-border-five"></div>
                            <div class="video-one-border video-one-border-six"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-details__bottom">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="portfolio-details__left">
                        <h3 class="portfolio-details__title">About our project</h3>
                        <p class="portfolio-details__text-1">{{ $project->mini_desc }}</p>
                        <p class="portfolio-details__text-2">{{ $project->full_desc }}</p>
                        <p class="portfolio-details__text-2">{{ $project->scope }}</p>
                        <ul class="portfolio-details__points-box list-unstyled">
                            @foreach ($project->points as $point )

                            <li>
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p>{{ $point->point }}
                                    </p>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="portfolio-details__right">
                        <ul class="list-unstyled portfolio-details__details-list">

                            <li>
                                <p class="portfolio-details__client">Consultant:</p>
                                <h4 class="portfolio-details__name">{{ $project->consultant }}</h4>
                            </li>
                            <li>
                                <p class="portfolio-details__client">Category:</p>
                                <h4 class="portfolio-details__name">{{ $project->Sector->name }}</h4>
                            </li>
                            <li>
                                <p class="portfolio-details__client">Contract Type:</p>
                                <h4 class="portfolio-details__name">{{ $project->contract_type }}</h4>
                            </li>
                            <li>
                                <p class="portfolio-details__client">completion:</p>
                                <h4 class="portfolio-details__name">{{
                                    \Carbon\Carbon::parse($project->end)->format('Y M') }}</h4>
                            </li>
                            <li>
                                <p class="portfolio-details__client">Duration:</p>
                                <h4 class="portfolio-details__name">{{ $project->duration }}
                                </h4>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <section class="testimonial-two" style="padding: 50px 0 50px;">
        <div class="testimonial-two__bg"
            style="background-image: url({{ asset('orionFrontAssets/assets/images/backgrounds/testimonial-two-bg.jpg') }});">
        </div>
        <div class="testimonial-two__bg-img">
        </div>
        <div class="testimonial-two__shape-1">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="testimonial-two__left mt-5">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Our project Gallary</span>
                            <h2 class="section-title__title">It's Good To Share Our Work With You</h2>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="testimonial-two__right" style="min-height: 410px;max-height:410px">
                        <div class="main-slider-three__right" style="min-height: 410px;max-height:410px">
                            <div class="swiper-container thm-swiper__slider" style="min-height: 410px;max-height:410px"
                                data-swiper-options='{"slidesPerView": 1, "loop": true,
                                "effect": "cube",
                                "pagination": {
                                "el": "#main-slider-pagination",
                                "type": "bullets",
                                "clickable": true
                                },
                                "navigation": {
                                "nextEl": "#main-slider__swiper-button-next",
                                "prevEl": "#main-slider__swiper-button-prev"
                                },
                                "autoplay": {
                                "delay": 5000
                                }}'>
                                <div class="swiper-wrapper">
                                    @foreach ( $project->gallaries as $media )
                                    <div class="swiper-slide">
                                        <div class="">
                                            <img src="{{ asset('orionFrontAssets/assets/images/project/' . $project->slug_name .'/' . $media->image) }}" alt=""  style="width:100%;height:410px;" >
                                        </div>
                                    </div>
                                    @endforeach
                                    {{-- @foreach ( $project->getMedia("mini_gallary") as $media )
                                    <div class="swiper-slide">
                                        <div class="">
                                            <img src="{{ $media->getFullUrl() }}" alt=""
                                                style="width:100%;height:410px">
                                        </div>
                                    </div>
                                    @endforeach --}}
                                </div>

                                {{-- <div class="swiper-pagination" id="main-slider-pagination"></div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<!--Counter One Start-->
{{-- <section class="counter-one">
    <div class="counter-one__bg" style="background-image: url({{ asset('orionFrontAssets/assets/images/backgrounds/OIU9IB1-01.png') }});background-size: auto;
    background-repeat: repeat;">
    </div>
    <div class="container">
        <ul class="counter-one__inner list-unstyled">
            <li class="counter-one__single">
                <div class="counter-one__icon">
                    <img class="icon-farmer-1"
                        src="{{ asset('orionFrontAssets/assets/images/icon/completed-checkmark-done-complete-svgrepo-com.svg') }}"
                        width="60" height="60" alt="">
                </div>
                <div class="counter-one__content count-box">
                    <h3 class="count-text" data-stop="154" data-speed="1500">00</h3>
                    <p class="counter-one__text">Completed Project</p>
                </div>
            </li>
            <li class="counter-one__single">
                <div class="counter-one__icon">
                    <img class="icon-farmer-1"
                        src="{{ asset('orionFrontAssets/assets/images/icon/engineer-worker-svgrepo-com.svg') }}"
                        width="60" height="60" alt="">
                </div>
                <div class="counter-one__content count-box">
                    <h3 class="count-text" data-stop="163" data-speed="1500">00</h3>
                    <p class="counter-one__text">Expert Engineer</p>
                </div>
            </li>
            <li class="counter-one__single">
                <div class="counter-one__icon">
                    <img src="{{ asset('orionFrontAssets/assets/images/icon/worker-svgrepo-com.svg') }}" width="60"
                        height="60" alt="" srcset="">
                </div>
                <div class="counter-one__content count-box">
                    <h3 class="count-text" data-stop="2384" data-speed="1500">00</h3>
                    <p class="counter-one__text">Good Workers</p>
                </div>
            </li>
            <li class="counter-one__single">
                <div class="counter-one__icon">
                    <img src="{{ asset('orionFrontAssets/assets/images/icon/deal-svgrepo-com.svg') }}" width="65"
                        height="65" alt="" srcset="">

                </div>
                <div class="counter-one__content count-box">
                    <h3 class="count-text" data-stop="65" data-speed="1500">00</h3>
                    <p class="counter-one__text">Trusted Client</p>
                </div>
            </li>
        </ul>
    </div>
</section> --}}
<!--Counter One End-->
<!--Video One Start-->
{{-- <section class="video-one">
    <div class="video-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/project/'.$project->slug_name . '/' . $project->main_image) }})">
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
                        <a href="{{ $videoUrl }}" class="video-popup{{ $project->id }}">
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
</section> --}}
<!--Video One End-->
<!--Portfolio Details page End-->
<section class="portfolio-details">
    {{-- <div class="container">
        <div class="row">
            <div class="col-xl-12">
                @php
                $nextProject = \App\Models\Project::where('id', '>', $project->id)->orderBy('id', 'asc')->first();
                $prevProject = \App\Models\Project::where('id', '<', $project->id)->orderBy('id', 'desc')->first();
                    @endphp
                    <div class="portfolio-details__pagination-box">
                        <ul class="portfolio-details__pagination list-unstyled clearfix">
                            @if($prevProject)
                            <li class="next">
                                <div class="icon">
                                    <a href="{{ route('projects.show', $nextProject->id) }}" aria-label="Previous"><i
                                            class="fa fa-long-arrow-alt-right"></i></a>
                                </div>
                                <div class="content">
                                    <span>Previous Project</span>
                                    <p>{{ $prevProject->name }}</p>
                                </div>
                            </li>
                            @else
                            <li class="next d-none">
                                <div class="content">
                                    <span>Previous Project</span>
                                    <p>This Is The Last Project</p>
                                </div>
                            </li>

                            @endif
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            @if($nextProject)
                            <li class="previous">
                                <div class="content">
                                    <span>Next Project</span>
                                    <p>{{ $nextProject->name }}</p>
                                </div>
                                <div class="icon">
                                    <a href="{{ route('projects.show', $nextProject->id) }}" aria-label="Previous"><i
                                            class="fa fa-long-arrow-alt-right"></i></a>
                                </div>
                            </li>
                            @else
                            <li class="previous d-none">
                                <div class="content">
                                    <span>Next Project</span>
                                    <p>This Is the First Project</p>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
            </div>
        </div>
    </div> --}}
</section>
<!--Gallery One Start-->
<section class="gallery-one gallery-two">
    <div class="section-title text-center">
        <span class="section-title__tagline">Checkout</span>
        <h2 class="section-title__title">Related Projects
            <br> For You
        </h2>
    </div>
    <div class="container">
        <div class="row">
            <!--Gallery One Single Start-->
            @foreach ($sug_proj as $pro )
            @if ($loop->count == 3)
            <div class="col-xl-4 col-lg-6 col-12 wow fadeInUp" data-wow-delay="100ms">
                @elseif ($loop->count == 2)
                <div class="col-xl-offset-4 col-xl-4 col-lg-6 col-12 wow fadeInUp" data-wow-delay="100ms">
                    @else
                    <div class="col-xl-offset-6 col-xl-3 col-lg-6 col-12 wow fadeInUp" data-wow-delay="100ms">
                        @endif
                        <div class="gallery-one__single">
                            <div class="gallery-one__img-box">
                                <div class="gallery-one__img">
                                    <img src="{{ asset('orionFrontAssets/assets/images/project/' . $pro->slug_name . '/' . $pro->main_image) }}"
                                        alt="">
                                </div>
                                <div class="gallery-one__content-box">
                                    <div class="gallery-one__content">
                                        <div class="gallery-one__shape-1">
                                            <img src="{{ asset('orionFrontAssets/assets/images/shapes/gallery-one-shape-1.png') }}"
                                                alt="">
                                        </div>
                                        <div class="gallery-one__title-box">
                                            <h3 class="gallery-one__title"><a
                                                    href="{{ route('projects.show' , ['project'=>$pro->id]) }}">{{
                                                    $pro->name
                                                    }}</a></h3>
                                            {{-- <p class="gallery-one__sub-title">{{ $pro->Client->name }}</p> --}}
                                        </div>
                                    </div>
                                    <div class="gallery-one__arrow-box">
                                        <a href="{{ route('projects.show' , ['project'=>$pro->id]) }}"
                                            class="gallery-one__arrow"><span class="icon-right-arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Gallery One Single End-->
                    @endforeach

                </div>
            </div>
</section>
<!--Gallery One End-->
@endsection
