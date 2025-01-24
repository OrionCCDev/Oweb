@extends('layouts.front.app')
@php
$p_nam = 'home';
@endphp
@section('page_name' , 'Home')
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
<!-- <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/odometer/odometer.min.css') }}" /> -->
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/ogenix-icons/style.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/tiny-slider/tiny-slider.min.css') }}" /> -->
<!-- <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/reey-font/stylesheet.css') }}" /> -->
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
@section('meta_tags')
<title>Orion Contracting Company - Leading Construction Experts in UAE & Saudi Arabia</title>
<meta name="description" content="Premier construction and contracting company with 15+ years expertise in commercial, industrial and residential projects across UAE and Saudi Arabia. ISO certified, innovative solutions and guaranteed quality.">
<meta name="keywords" content="construction company UAE, contracting Saudi Arabia, commercial construction, industrial projects, MEP contractors, construction management, building contractors, Orion Contracting, Dubai construction, Saudi construction company">
<meta name="robots" content="index, follow">
<meta name="author" content="Orion Contracting Company">

<!-- Open Graph / Social Media -->
<meta property="og:type" content="website">
<meta property="og:title" content="Orion Contracting Company - Construction Excellence">
<meta property="og:description" content="Leading construction experts delivering innovative solutions across UAE & Saudi Arabia. 15+ years of excellence in commercial and industrial projects.">
<meta property="og:image" content="{{ asset('orionFrontAssets/assets/images/resources/logo-blue.webp') }}">
<meta property="og:url" content="{{ url()->current() }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Orion Contracting - Construction Excellence in UAE & KSA">
<meta name="twitter:description" content="Leading construction and contracting experts with 15+ years of experience">
<meta name="twitter:image" content="{{ asset('orionFrontAssets/assets/images/resources/logo-blue.webp') }}">
@endsection
<!-- <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/bxslider/jquery.bxslider.css') }}" /> -->
@if ($p_nam == 'projects')
<link rel="stylesheet"
    href="{{ asset('orionFrontAssets/assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
@endif
<!-- <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/vegas/vegas.min.css') }}" /> -->
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/jquery-ui/jquery-ui.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/timepicker/timePicker.css') }}" />
@if ($p_nam == 'projects')
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/nice-select/nice-select.css') }}" />
@endif
<!-- template styles -->
<!-- <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/css/packages.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/bootstrap/css/bootstrap.min.css') }}" /> -->
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/css/style.css') }}" />

@endsection



@section('pageLoader')
<div class="preloader">
    <div class="preloader__image"></div>
</div>
@endsection
@section('cust_js')
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery/jquery-3.6.0.min.js') }}" defer></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jarallax/jarallax.min.js') }}" defer></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-appear/jquery.appear.min.js') }}" defer></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}" defer></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.js') }}" defer></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/wow/wow.js') }}" defer></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.js') }}" defer></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-ui/jquery-ui.js') }}" defer></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/timepicker/timePicker.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" defer></script>
<script src="http://threejs.org/examples/js/libs/stats.min.js" defer></script>
<script src="{{ asset('orionFrontAssets/assets/js/main.js') }}" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Create the video element
        var video = document.createElement('video');

        // Set video attributes
        video.setAttribute('muted', 'muted');
        video.setAttribute('loop', 'loop');
        video.setAttribute('autoplay', 'autoplay');
        video.setAttribute('playsInline', 'playsInline');
        video.setAttribute('id', 'background-video');
        video.setAttribute('poster', '{{ asset('orionFrontAssets/assets/video/video-screen.png') }}');
        // Add poster attribute

        // Create the source element
        var source = document.createElement('source');
        source.src = '{{ asset('orionFrontAssets/assets/video/1118(9).mp4') }}';
        source.type = "video/mp4";

        // Append the source to the video
        video.appendChild(source);

        // Append the video to the container
        document.getElementById('hero-slider-sect').prepend(video);
        video.play();
        // Optional: Play the video if autoPlay doesn't work (e.g., due to browser policies)
        document.body.addEventListener('click', function () {

        }, { once: true }); // The { once: true } option auto-removes the event listener after one use
    });
</script>
<script>
    particlesJS("particles-js", { "particles": { "number": { "value": 109, "density": { "enable": true, "value_area": 787.7116975187079 } }, "color": { "value": "#aef490" }, "shape": { "type": "star", "stroke": { "width": 0, "color": "#000000" }, "polygon": { "nb_sides": 5 }, "image": { "src": "img/github.svg", "width": 100, "height": 100 } }, "opacity": { "value": 0.5, "random": false, "anim": { "enable": false, "speed": 1, "opacity_min": 0.1, "sync": false } }, "size": { "value": 3.998400639744104, "random": true, "anim": { "enable": false, "speed": 40, "size_min": 0.1, "sync": false } }, "line_linked": { "enable": true, "distance": 150, "color": "#fff", "opacity": 0.4, "width": 1 }, "move": { "enable": true, "speed": 6, "direction": "none", "random": true, "straight": false, "out_mode": "bounce", "bounce": false, "attract": { "enable": true, "rotateX": 600, "rotateY": 1200 } } }, "interactivity": { "detect_on": "canvas", "events": { "onhover": { "enable": true, "mode": "grab" }, "onclick": { "enable": true, "mode": "push" }, "resize": true }, "modes": { "grab": { "distance": 400, "line_linked": { "opacity": 1 } }, "bubble": { "distance": 400, "size": 40, "duration": 2, "opacity": 8, "speed": 3 }, "repulse": { "distance": 200, "duration": 0.4 }, "push": { "particles_nb": 4 }, "remove": { "particles_nb": 2 } } }, "retina_detect": true }); var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function () { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;
</script>
@endsection


@section('page_content')

<!--Main Slider Start-->
<section class="main-slider clearfix" style="position: relative;" id="hero-slider-sect">
    <video autoplay loop muted playsinline id="background-video">
        <source src="{{ asset('orionFrontAssets/assets/video/1118(9).mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
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
            <div class="swiper-slide">
                <div class="main-slider-bg-shape"
                    style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/main-slider-bg-shape-two.png') }});">
                </div>

                <div class="main-slider__shape-4 float-bob-y">
                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/main-slider-shape-4.png') }}"
                        alt="main slider section white shape">
                </div>

                <div class="main-slider__img-one">
                    <img src="{{ asset('orionFrontAssets/assets/images/resources/1.png') }}"
                        alt="main slider first image" class="img-bounce">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h4 class="main-slider__sub-title">You Dream We Build</h4>
                                <h2 class="main-slider__title">Excellence <br> in Every Project.</h2>
                                <div class="main-slider__btn-box">
                                    <a href="about.html" class="thm-btn main-slider__btn-one">See Projects</a>
                                    <a href="products.html" class="thm-btn main-slider__btn-two">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="main-slider-bg-shape"
                    style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/main-slider-bg-shape-two.png') }});">
                </div>

                <div class="main-slider__shape-4 float-bob-y">
                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/main-slider-shape-4.png') }}"
                        alt="main slider section white shape">
                </div>

                <div class="main-slider__img-one">
                    <img src="{{ asset('orionFrontAssets/assets/images/resources/2.png') }}"
                        alt="main slider first image" class="img-bounce">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">

                                <h4 class="main-slider__sub-title">You Dream We Build</h4>
                                <h2 class="main-slider__title">Transforming <br> Visions into Reality.</h2>
                                <div class="main-slider__btn-box">
                                    <a href="about.html" class="thm-btn main-slider__btn-one">See Projects</a>
                                    <a href="products.html" class="thm-btn main-slider__btn-two">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="main-slider-bg-shape"
                    style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/main-slider-bg-shape-two.png') }});">
                </div>

                <div class="main-slider__shape-4 float-bob-y">
                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/main-slider-shape-4.png') }}"
                        alt="main slider section white shape">
                </div>

                <div class="main-slider__img-one">
                    <img src="{{ asset('orionFrontAssets/assets/images/resources/3.png') }}"
                        alt="main slider first image" class="img-bounce">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">

                                <h4 class="main-slider__sub-title">You Dream We Build</h4>
                                <h2 class="main-slider__title">Your Trusted <br> Partner in Construction.</h2>
                                <div class="main-slider__btn-box">
                                    <a href="about.html" class="thm-btn main-slider__btn-one">See Projects</a>
                                    <a href="products.html" class="thm-btn main-slider__btn-two">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="main-slider-bg-shape"
                    style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/main-slider-bg-shape-two.png') }});">
                </div>

                <div class="main-slider__shape-4 float-bob-y">
                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/main-slider-shape-4.png') }}"
                        alt="main slider section white shape">
                </div>

                <div class="main-slider__img-one">
                    <img src="{{ asset('orionFrontAssets/assets/images/resources/4.png') }}"
                        alt="main slider first image" class="img-bounce">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">

                                <h4 class="main-slider__sub-title">You Dream We Build</h4>
                                <h2 class="main-slider__title">Your Trusted <br> Partner in Construction.</h2>
                                <div class="main-slider__btn-box">
                                    <a href="about.html" class="thm-btn main-slider__btn-one">See Projects</a>
                                    <a href="products.html" class="thm-btn main-slider__btn-two">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- If we need navigation buttons -->


    </div>

    <div id="particles-js"></div>
</section>
<!--Main Slider End-->

<!--Feature One Start-->
<section class="feature-one">
    <div class="container">
        <div class="feature-one__inner">
            <ul class="feature-one__list list-unstyled">
                <!--feature One Single Start-->
                <li>
                    <div class="feature-one__single">
                        <div class="feature-one__icon">
                            <span class="">
                                <img width="64"
                                    src="{{ asset('orionFrontAssets/assets/images/icon/quality-icon-award-vector-25322832.png') }}"
                                    alt="">
                            </span>
                        </div>
                        <div class="feature-one__content">
                            <h3 class="feature-one__title">Quality Assurance</h3>
                            <p class="feature-one__subtitle">Top-notch craftsmanship</p>
                        </div>
                    </div>
                </li>
                <!--feature One Single End-->
                <!--feature One Single Start-->
                <li>
                    <div class="feature-one__single">
                        <div class="feature-one__icon">
                            <span class="">
                                <img width="64" src="{{ asset('orionFrontAssets/assets/images/icon/efficiency.png') }}"
                                    alt="">
                            </span>
                        </div>
                        <div class="feature-one__content">
                            <h3 class="feature-one__title">Timely Delivery</h3>
                            <p class="feature-one__subtitle">Projects on schedule</p>
                        </div>
                    </div>
                </li>
                <!--feature One Single End-->
                <!--feature One Single Start-->
                <li>
                    <div class="feature-one__single">
                        <div class="feature-one__icon">
                            <span class="">
                                <img src="{{ asset('orionFrontAssets/assets/images/icon/idea.png') }}" alt="">
                            </span>
                        </div>
                        <div class="feature-one__content">
                            <h3 class="feature-one__title">Innovative Solutions</h3>
                            <p class="feature-one__subtitle">Cutting-edge technology</p>
                        </div>
                    </div>
                </li>
                <!--feature One Single End-->
                <!--feature One Single Start-->
                <li>
                    <div class="feature-one__single">
                        <div class="feature-one__icon">
                            <span class="">
                                <img src="{{ asset('orionFrontAssets/assets/images/icon/safty.png') }}" alt="">
                            </span>
                        </div>
                        <div class="feature-one__content">
                            <h3 class="feature-one__title">Safety Standards</h3>
                            <p class="feature-one__subtitle">Strict safety protocols</p>
                        </div>
                    </div>
                </li>
                <!--feature One Single End-->
            </ul>
        </div>
    </div>
</section>

<!--News Carousel Page Start-->
{{--  <section class="news-carousel-page">
    <div class="container">
        <div class="section-title text-center" style="margin-bottom: 100px">
            <span class="section-title__tagline">News & Events</span>
            <h2 class="section-title__title">Keep Up with Our
                <br> News & Events
            </h2>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="service-details__img-and-points-box">
                    <div class="row">
                        <div class="news-sidebar__single">
                            <div class="news-sidebar__img">
                                <img src="{{ asset('orionFrontAssets/assets/images/blog/' . $main_event->main_image) }}"
                                    alt="">
                                <div class="news-sidebar__date">
                                    <p>{{ $main_event->created_at->format('d M') }}</p>
                                </div>
                            </div>
                            <div class="news-sidebar__content-box">
                                <ul class="list-unstyled news-sidebar__meta">
                                    <li>
                                        <<i class="fas fa-tag"></i>New Deal
                                    </li>
                                    <li>
                                        <<i class="fas fa-user-circle"></i>by
                                            Admin
                                    </li>
                                </ul>
                                <h3 class="news-sidebar__title">
                                    <a href="{{ route('news.show' , ['news' => $main_event->id]) }}">{{
                                        $main_event->title
                                        }}</a>
                                </h3>
                                <p class="news-sidebar__text">{{ $main_event->mini_description }}</p>
                                <div class="news-sidebar__bottom">
                                    <a href="{{ route('news.show' , ['news' => $main_event->id]) }}"
                                        class="news-sidebar__read-more">Read More <span
                                            class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="news-carousel thm-owl__carousel owl-theme owl-carousel carousel-dot-style" data-owl-options='{
                    "items": 3,
                    "margin": 30,
                    "smartSpeed": 700,
                    "loop":true,
                    "autoplay": 6000,
                    "nav":false,
                    "dots":true,
                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                    "responsive":{
                        "0":{
                            "items":1
                        },
                        "768":{
                            "items":2
                        },
                        "992":{
                            "items": 3
                        }
                    }
                }'>

            @foreach ( $events as $event )

            <!--News One Single Start-->
            <div class="item">
                <div class="news-one__single">
                    <div class="news-one__img-box">
                        <div class="news-one__img">
                            <img src="{{ asset('orionFrontAssets/assets/images/blog/' . $event->main_image) }}" alt="">
                        </div>
                    </div>
                    <div class="news-one__content-box">
                        <ul class="news-one__meta list-unstyled">
                            <li>
                                <i class="fa fa-tag"></i>MEP
                            </li>
                            <li>
                                <i class="fas fa-user-circle"></i>by Admin
                            </li>
                        </ul>
                        <h3 class="news-one__title"><a href="{{ route('news.show' , ['news' => $event->id]) }}">{{
                                $event->title }}</a></h3>
                        <div class="news-one__bottom">
                            <div class="news-one__read-more">
                                <a href="{{ route('news.show' , ['news' => $event->id]) }}">Read More</a>
                            </div>

                        </div>
                        <div class="news-one__date">
                            <p>{{ $event->created_at->format('d M') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--News One Single End-->
            @endforeach


        </div>
        <div class="testimonial-one__btn-box offset-5">
            <a href="{{ route('news.index') }}" class="testimonial-one__btn thm-btn">Check Our Events</a>
        </div>
    </div>
</section>  --}}
<!--News Carousel Page End-->
<!--Hot Products Two Start-->
<section class="hot-products-two">
    <section class="testimonial-one">
        <div class="testimonial-one__bg-img"
            style="background-image: url({{ asset('orionFrontAssets/assets/images/backgrounds/testimonial-one__bg-img.jpg') }});">
        </div>
        <div class="testimonial-one__bg-img-2">
            <img src="{{ asset('orionFrontAssets/assets/images/shapes/shapes2-05.png') }}" alt="">
        </div>
        <div class="testimonial-one__bg-shape">
            <img src="{{ asset('orionFrontAssets/assets/images/shapes/shapes2-05.png') }}" alt="">
        </div>
        <div class="container">
            <div class="hot-products-two__top">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Checkout Our Projects</span>
                            <h2 class="section-title__title">In-Progress Projects</h2>
                            <!-- <div class="hot-products__btn-box">
                                        <a href="all_projects.html" class="hot-products__btn thm-btn">All Projects</a>
                                    </div> -->
                        </div>
                    </div>
                    <!-- <div class="col-xl-6 col-lg-6">
                                <div class="hot-products-two__filter-box">


                                </div>
                            </div>  -->
                </div>
            </div>
            <div class="hot-products-two__bottom">
                <div class="row filter-layout">
                    @foreach ($projects as $project )
                        <!-- Hot Products Two Single Start -->
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item fresh Commercial">
                            <div class="hot-products__single">
                                <div class="hot-products__single-inner">
                                    <div class="hot-products__img-box">
                                        <div class="hot-products__img">
                                            <img src="{{ asset('orionFrontAssets/assets/images/project/' . $project->slug_name . '/' . $project->main_image) }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="hot-products__content">
                                        <!-- <div class="hot-products__rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                        <h3 class="hot-products__title"><a href="{{ route('projects.show' , ['project' => $project->id]) }}">{{ $project->name }}</a>
                                        </h3>
                                        <p class="hot-products__price">{{ $project->Sector->name }}</p>
                                        <div class="hot-products__btn-box">
                                            <a href="{{ route('projects.show' , ['project' => $project->id]) }}" class="hot-products__btn thm-btn">More</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Hot Products Two Single End -->
                    @endforeach
                    <div class="testimonial-one__btn-box offset-5">
                        <a href="{{ route('projects.index') }}" class="testimonial-one__btn thm-btn">View all
                            Projects</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
</section>
<!--Hot Products Two End-->


<!--Feature One End-->
<!--Why Choose One Start-->
<!-- <section class="why-choose-one">
                <div class="why-choose-one__bg"
                    style="background-image: url({{ asset('orionFrontAssets/assets/images/backgrounds/why-choose-one-bg.jpg') }});">
                </div>
                <div class="why-choose-one__shape-1 float-bob-y">
                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/why-choose-one-shape-1.png') }}" alt="">
                </div>
                <div class="why-choose-one__shape-2 float-bob-x">
                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/OIU9I511-01 - rotat.png') }}" alt="">
                </div>

                <div class="why-choose-one__shape-4">
                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/why-choose-one-shape-4.png') }}" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center">
                                <span class="section-title__tagline">Why Choose Ogenix</span>
                                <h2 class="section-title__title">Few reasons for people
                                    choosing ogenix</h2>
                            </div>
                            <div class="why-choose-one__left">

                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="why-choose-one__single">
                                            <div class="why-choose-one__icon">
                                                <span class="icon-organic-food"></span>
                                            </div>
                                            <h4 class="why-choose-one__title">Organic products</h4>
                                            <p class="why-choose-one__text">Lorem ipsum dolor sit amet, sectetur adipiscing
                                                elit.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="why-choose-one__single">
                                            <div class="why-choose-one__icon">
                                                <span class="icon-apple"></span>
                                            </div>
                                            <h4 class="why-choose-one__title">Organic fruit</h4>
                                            <p class="why-choose-one__text">Lorem ipsum dolor sit amet, sectetur adipiscing
                                                elit.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="why-choose-one__single">
                                            <div class="why-choose-one__icon">
                                                <span class="icon-diet"></span>
                                            </div>
                                            <h4 class="why-choose-one__title">Daily fresh</h4>
                                            <p class="why-choose-one__text">Lorem ipsum dolor sit amet, sectetur adipiscing
                                                elit.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="why-choose-one__single">
                                            <div class="why-choose-one__icon">
                                                <span class="icon-salad"></span>
                                            </div>
                                            <h4 class="why-choose-one__title">Natural items</h4>
                                            <p class="why-choose-one__text">Lorem ipsum dolor sit amet, sectetur adipiscing
                                                elit.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section> -->
<!--Why Choose One End-->
<!--About One Start-->
<section class="banner-one my-5">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Our Certificate</span>
            <h2 class="section-title__title">Orion
                <br> Your Trusted Partener
            </h2>
        </div>
        <div class="row">
            <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100,"slidesPerView": 3,"speed": 500, "autoplay": { "delay": 3000 },"loop":true, "breakpoints": {
                "0": {
                    "spaceBetween": 30,
                    "slidesPerView": 1
                },
                "375": {
                    "spaceBetween": 30,
                    "slidesPerView": 1
                },
                "575": {
                    "spaceBetween": 30,
                    "slidesPerView": 1
                },
                "767": {
                    "spaceBetween": 50,
                    "slidesPerView": 2
                },
                "991": {
                    "spaceBetween": 50,
                    "slidesPerView": 2
                },
                "1199": {
                    "spaceBetween": 100,
                    "slidesPerView": 2
                }
            }}'>
                <div class="swiper-wrapper">

                    <div class="col-xl-6 col-lg-6 swiper-slide" data-wow-delay="100ms">
                        <div class="banner-one__right wow" data-wow-delay="100ms" data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;">
                            <div class="banner-one__inner ">
                                <div class="banner-one__img-2">
                                    <img src="{{ asset('orionFrontAssets/assets/images/certificate/صورة3.png') }}"
                                        alt="">
                                </div>
                                <div class="banner-one__shape-1">
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/banner-shape-4.png') }}"
                                        alt="">
                                </div>
                                <div class="banner-one__shape-5">
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/banner-shape-5.png') }}"
                                        alt="">
                                </div>

                                <p class="banner-one__tagline">OrionCC</p>
                                <h3 class="banner-one__title">ISO 45001:2018
                                    <br> WRG
                                </h3>
                                <div class="banner-one__btn-box">
                                    <p class="banner-one__tagline">Health & Safety <br> Management system</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 swiper-slide" data-wow-delay="100ms">
                        <div class="banner-one__right wow" data-wow-delay="100ms" data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;">
                            <div class="banner-one__inner banner-one__inner-2">
                                <div class="banner-one__img-2">
                                    <img src="{{ asset('orionFrontAssets/assets/images/certificate/صورة2.jpg') }}"
                                        alt="">
                                </div>
                                <div class="banner-one__shape-1">
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/banner-shape-4.png') }}"
                                        alt="">
                                </div>
                                <div class="banner-one__shape-5">
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/banner-shape-5.png') }}"
                                        alt="">
                                </div>

                                <p class="banner-one__tagline">OrionCC</p>
                                <h3 class="banner-one__title">Suadi Arabia
                                    <br> Branch Certificate
                                </h3>
                                <div class="banner-one__btn-box">
                                    <p class="banner-one__tagline">We offer professionalism <br>and workmanship</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 swiper-slide" data-wow-delay="100ms">
                        <div class="banner-one__right wow" data-wow-delay="100ms" data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;">
                            <div class="banner-one__inner">
                                <div class="banner-one__img-2">
                                    <img src="{{ asset('orionFrontAssets/assets/images/certificate/صورة4.png') }}"
                                        alt="">
                                </div>
                                <div class="banner-one__shape-1">
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/banner-shape-4.png') }}"
                                        alt="">
                                </div>
                                <div class="banner-one__shape-5">
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/banner-shape-5.png') }}"
                                        alt="">
                                </div>

                                <p class="banner-one__tagline">OrionCC</p>
                                <h3 class="banner-one__title">ISO 14001:2015
                                    <br> WRG
                                </h3>
                                <div class="banner-one__btn-box">
                                    <p class="banner-one__tagline">Environment <br> management</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 swiper-slide" data-wow-delay="100ms">
                        <div class="banner-one__left wow" data-wow-delay="100ms" data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInLeft;">
                            <div class="banner-one__inner banner-one__inner-2">
                                <div class="banner-one__img-2">
                                    <img src="{{ asset('orionFrontAssets/assets/images/certificate/صورة1.png') }}"
                                        alt="">
                                </div>
                                <div class="banner-one__shape-1">
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/banner-shape-4.png') }}"
                                        alt="">
                                </div>
                                <div class="banner-one__shape-5">
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/banner-shape-5.png') }}"
                                        alt="">
                                </div>
                                <p class="banner-one__tagline">OrionCC</p>
                                <h3 class="banner-one__title">Commercial
                                    <br> Licence
                                </h3>
                                <div class="banner-one__btn-box">
                                    <p class="banner-one__tagline">We offer professionalism <br>and workmanship</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 swiper-slide" data-wow-delay="100ms">
                        <div class="banner-one__right wow" data-wow-delay="100ms" data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;">
                            <div class="banner-one__inner ">
                                <div class="banner-one__img-2">
                                    <img src="{{ asset('orionFrontAssets/assets/images/certificate/صورة5.png') }}"
                                        alt="">
                                </div>
                                <div class="banner-one__shape-1">
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/banner-shape-4.png') }}"
                                        alt="">
                                </div>
                                <div class="banner-one__shape-5">
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/banner-shape-5.png') }}"
                                        alt="">
                                </div>

                                <p class="banner-one__tagline">OrionCC</p>
                                <h3 class="banner-one__title">ISO 9001:2015
                                    <br> WRG
                                </h3>
                                <div class="banner-one__btn-box">
                                    <p class="banner-one__tagline">Quality <br>management </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-one__btn-box offset-5">
                <a href="{{ route('certificate.index') }}" class="testimonial-one__btn thm-btn">View all
                    Certifications</a>
            </div>
        </div>
</section>
<section class="about-one">
    <div class="about-one__shape-11 float-bob-y">
        <img src="{{ asset('orionFrontAssets/assets/images/shapes/shapes2-01.png') }}" alt="" loading="lazy">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-one__left">
                    <div class="about-one__img-box wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="about-one__big-text">ORION</div>
                        <div class="about-one__shape-1 ">
                            <img src="{{ asset('orionFrontAssets/assets/images/shapes/about-one-shape-1.png') }}"
                                alt="">
                        </div>
                        <div class="about-one__shape-2 ">
                            <img src="{{ asset('orionFrontAssets/assets/images/shapes/shapes2-08.png') }}" alt="">
                        </div>
                        <div class="about-one__shape-3 ">
                            <img src="{{ asset('orionFrontAssets/assets/images/shapes/about-one-shape-3.png') }}"
                                alt="">
                        </div>
                        <!-- <div class="about-one__shape-4 float-bob-y shape-item">
                                    <img src="{{ asset('orionFrontAssets/assets/images/icon/001-construction.png') }}" alt="">
                                </div> -->
                        <div class="about-one__shape-5 zoominout shape-item">
                            <img src="{{ asset('orionFrontAssets/assets/images/shapes/shapes2-09.png') }}" alt="">
                        </div>
                        <!-- <div class="about-one__shape-6 float-bob-x shape-item">
                                    <img src="{{ asset('orionFrontAssets/assets/images/icon/002-excavator.png') }}" alt="">
                                </div>
                                <div class="about-one__shape-7 zoominout shape-item">
                                    <img src="{{ asset('orionFrontAssets/assets/images/icon/002-mixer-truck.png') }}" alt="">
                                </div>
                                <div class="about-one__shape-8 float-bob-y shape-item">
                                    <img src="{{ asset('orionFrontAssets/assets/images/icon/003-model.png') }}" alt="">
                                </div> -->
                        <!-- <div class="about-one__shape-9 shape-item">
                                    <img src="{{ asset('orionFrontAssets/assets/images/icon/004-blueprint.png') }}" alt="">
                                </div>
                                <div class="about-one__shape-10 float-bob-x shape-item">
                                    <img src="{{ asset('orionFrontAssets/assets/images/icon/006-man.png') }}" alt="">
                                </div> -->
                        <div class="about-one__img">
                            <img src="{{ asset('orionFrontAssets/assets/images/team/ghasan.png') }}" alt="">
                        </div>
                        <div class="about-one__experience-box">
                            <div class="about-one__experience-icon">
                                <span class="icon-organic"></span>
                            </div>
                            <div class="about-one__experience-text">
                                <p><span>15+</span>Years of experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-one__right">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">You Dream We Build</span>
                        <h2 class="section-title__title">Orion Founder Message</h2>
                    </div>
                    <ul class="about-one__points-box list-unstyled">
                        <li>
                            <div class="icon">
                                <span class="fa fa-check"></span>
                            </div>
                            <div class="text">
                                <p>Ghassan Abu Safi</p>
                            </div>
                        </li>

                    </ul>
                    <p class="about-one__text-1">Founded in 2008 by a team of young, Experts engineers, our
                        company has grown by leveraging extensive knowledge in industrial and commercial
                        construction within the region.</p>
                    <p class="about-one__text-2">We have built our reputation on the foundation of innovative
                        technologies and methods, combined with creative concepts, designs, and meticulous
                        project execution.</p>
                    <div class="about-one__bottom">
                        <div class="about-one__bottom-icon">
                            <img src="{{ asset('orionFrontAssets/assets/images/icon/014-labor.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3>Our unwavering commitment is to achieve <br> the ultimate satisfaction of our
                                clients </h3>
                        </div>
                    </div>
                    <div class="about-one__btn-box">
                        <a href="about.html" class="about-one__btn thm-btn">About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About One End-->
<!--Team One Start-->
<!-- <section class="team-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Meet the Managers</span>
                    <h2 class="section-title__title">Awesome Manager team
                        <br> here to help you
                    </h2>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="team-one__single">
                            <div class="team-one__img-box">


                                <div class="team-one__img">
                                    <img src="{{ asset('orionFrontAssets/assets/images/team/team-1-1.png') }}" alt="">
                                    <div class="team-one__social">
                                        <a href="#"><i class="fab fa-linkedin"></i></a>

                                    </div>
                                </div>
                            </div>
                            <div class="team-one__content-box">
                                <h3 class="team-one__name"><a href="team.html">Saqer Attaallah</a></h3>
                                <p class="team-one__sub-title">Management Director</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="team-one__single">
                            <div class="team-one__img-box">

                                <div class="team-one__img">
                                    <img src="{{ asset('orionFrontAssets/assets/images/team/team-1-1.png') }}" alt="">
                                    <div class="team-one__social">
                                        <a href="#"><i class="fab fa-linkedin"></i></a>

                                    </div>
                                </div>
                            </div>
                            <div class="team-one__content-box">
                                <h3 class="team-one__name"><a href="team.html">Fayez Alnaqla</a></h3>
                                <p class="team-one__sub-title">Partner</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                        <div class="team-one__single">
                            <div class="team-one__img-box">

                                <div class="team-one__img">
                                    <img src="{{ asset('orionFrontAssets/assets/images/team/team-1-3.png') }}" alt="">
                                    <div class="team-one__social">
                                        <a href="#"><i class="fab fa-linkedin"></i></a>

                                    </div>
                                </div>
                            </div>
                            <div class="team-one__content-box">
                                <h3 class="team-one__name"><a href="team.html">Fady Daniel</a></h3>
                                <p class="team-one__sub-title">General Manager</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
<!--Team One End-->


<!--Video One Start-->
<section class="video-one">
    <div class="video-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/resources/Screenshot2024-09-04121353.png') }})">
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
                        <a href="https://www.youtube.com/watch?v=3VSpvjEEdIQ&autoplay=1&mute=1" class="video-popup">
                            <div class="video-one__video-icon">
                                <span class="fa fa-play"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>
                    </div>
                    <div class="video-one__shape">
                        <img src="{{ asset('orionFrontAssets/assets/images/shapes/team-two-shape-3.png') }}" alt="">
                    </div>
                    <h2 class="video-one__video-title">Best Of The Best Managers
                        <br> Only To Make Your Dreams Come True
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Video One End-->
<!--Categories One Start-->
<section class="categories-one" style="padding-top: 75px;">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Our Sectors</span>
            <h2 class="section-title__title">Sectors We
                <br> Serve
            </h2>
        </div>
        <div class="row">
            <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100,"slidesPerView": 3,"speed": 500, "autoplay": { "delay": 3000 },"loop":true, "breakpoints": {
                            "0": {
                                "spaceBetween": 30,
                                "slidesPerView": 2
                            },
                            "375": {
                                "spaceBetween": 30,
                                "slidesPerView": 2
                            },
                            "575": {
                                "spaceBetween": 30,
                                "slidesPerView": 2
                            },
                            "767": {
                                "spaceBetween": 50,
                                "slidesPerView": 3
                            },
                            "991": {
                                "spaceBetween": 50,
                                "slidesPerView": 3
                            },
                            "1199": {
                                "spaceBetween": 100,
                                "slidesPerView": 3
                            }
                        }}'>
                <div class="swiper-wrapper">
                    <!--Categories One Single Start-->
                    @foreach ($sectors as $sector)
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp swiper-slide" data-wow-delay="100ms">
                        <div class="categories-one__single categories-one__single-{{ $loop->index + 1 }}">
                            <div class="categories-one__img-box">
                                <div class="categories-one__img">
                                    <img src="{{ asset('orionFrontAssets/assets/images/sectors/' . $sector->photo) }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="categories-one__content">
                                <div class="categories-one__content-shape-1"
                                    style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/categories-one-content-shape-5.png') }});">
                                </div>
                                <h3 class="categories-one__title"><a href="{{ route('sectors.index') }}">{{
                                        $sector->name
                                        }}</a>
                                </h3>
                                <p class="categories-one__text">{{ $sector->title }}</p>
                            </div>
                            <div class="categories-one__arrow-box">
                                <a href="{{ route('sectors.index') }}" class="categories-one__arrow"><i
                                        class="icon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--Categories One Single End-->
                    @endforeach


                </div>
            </div>
        </div>
    </div>

</section>
<!--Cta One Start-->
<section class="cta-one">
    <div class="cta-one__bg-img"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/OIU9I511-01-rotat-Copy.png') }});">
    </div>
    <div class="container">
        <div class="cta-one__inner">
            <div class="cta-one__img-1">
                <img src="{{ asset('orionFrontAssets/assets/images/resources/Screenshot 2024-09-04 103337.png') }}"
                    alt="">
            </div>
            <div class="cta-one__left">
                <div class="cta-one__title-box">
                    <span class="cta-one__tagline">Need Orion Help?</span>
                    <h2 class="cta-one__title">We’re leader in Contracting of Constructions market</h2>
                </div>
            </div>
            <div class="cta-one__right">
                <div class="cta-one__btn-box">
                    <a href="about.html" class="cta-one__btn thm-btn">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Cta One End-->

<!--Categories One End-->
<section class="testimonial-two">
    <div class="testimonial-two__bg"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/backgrounds/testimonial-two-bg.jpg') }});">
    </div>
    <div class="testimonial-two__bg-img"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/backgrounds/testimonial-two-bg-img.png') }});">
    </div>
    <div class="testimonial-two__shape-1">
        <img src="{{ asset('orionFrontAssets/assets/images/shapes/testimonial-two-shape-1.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial-two__center">
                    <div class="section-title text-center">
                        <span class="section-title__tagline">Our Clients</span>
                        <h2 class="section-title__title">Building Success Together</h2>
                    </div>
                    <p class="testimonial-two__text-1 text-center">“At the heart of our success are the strong
                        partnerships
                        we’ve built with our clients. We believe in a collaborative approach, working
                        hand-in-hand to achieve shared goals. Our clients are more than just business partners;
                        they are integral to our journey, inspiring us to innovate and excel. Together, we build
                        a foundation of trust, mutual respect, and lasting success.”</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5">

        <div class="col-12">
            <div class="row">
                @foreach ($clients as $client )
                    <div class="col clinet-logo-item">
                        <img src="{{ asset('orionFrontAssets/assets/images/clinets/' . $client->logo) }}" alt="{{ $client->name . ' company image' }}" srcset="">
                    </div>
                @endforeach

            </div>
            {{-- <div class="testimonial-one__btn-box offset-5">
                <a href="testimonials.html" class="testimonial-one__btn thm-btn">View all
                    Clients</a>
            </div> --}}
        </div>
    </div>

</section>


<!--Gallery Three Start-->
<section class="gallery-three">
    <div class="container">
        <div class="gallery-three__carousel owl-carousel owl-theme thm-owl__carousel" data-owl-options='{
                            "loop": true,
                            "autoplay": true,
                            "margin": 5,
                            "nav": false,
                            "dots": false,
                            "smartSpeed": 300,
                            "autoplayHoverPause":true,
                            "autoplayTimeout": 1000,
                            "navText": ["<span class=\"icon-up-arrow\"></span>","<span class=\"icon-down-arrow\"></span>"],
                            "responsive": {
                                "0": {
                                    "items": 1
                                },
                                "768": {
                                    "items": 3
                                },
                                "992": {
                                    "items": 4
                                },
                                "1200": {
                                    "items": 7
                                }
                            }
                        }'>


            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <a href="http://">
                            <img src="{{ asset('orionFrontAssets/assets/images/project/Picture1.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img src="{{ asset('orionFrontAssets/assets/images/project/Picture10.png') }}" alt="">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img src="{{ asset('orionFrontAssets/assets/images/project/Picture12.png') }}" alt="">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img src="{{ asset('orionFrontAssets/assets/images/project/Picture212.jpg') }}" alt="">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img src="{{ asset('orionFrontAssets/assets/images/project/Picture3.jpg') }}" alt="">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img src="{{ asset('orionFrontAssets/assets/images/project/Picture32.jpg') }}" alt="">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img src="{{ asset('orionFrontAssets/assets/images/project/Picture6.jpg') }}" alt="">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img src="{{ asset('orionFrontAssets/assets/images/project/Picture8.png') }}" alt="">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img src="{{ asset('orionFrontAssets/assets/images/project/Picture5.jpg') }}" alt="">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
        </div>
    </div>
</section>
<!--Gallery Three End-->

@endsection
