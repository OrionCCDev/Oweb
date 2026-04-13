@extends('layouts.front.app')
@php
$p_nam = 'sectors';
@endphp
@section('page_name' , 'Orion Sectors')

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


@section('cust_js')
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jarallax/jarallax.min.js') }}"></script>
<!-- <script src="{{ asset('orionFrontAssets/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script> -->
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
<!-- <script src="{{ asset('orionFrontAssets/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script> -->
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}">
</script>
<!-- <script src="{{ asset('orionFrontAssets/assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script> -->
<!-- <script src="{{ asset('orionFrontAssets/assets/vendors/nouislider/nouislider.min.js') }}"></script> -->
<!--<script src="{{ asset('orionFrontAssets/assets/vendors/odometer/odometer.min.js') }}"></script>  -->
<script src="{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.js') }}"></script>
<!-- <script src="{{ asset('orionFrontAssets/assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/wnumb/wNumb.min.js') }}"></script> -->
<!-- related with loader -->
<script src="{{ asset('orionFrontAssets/assets/vendors/wow/wow.js') }}"></script>
<!-- <script src="{{ asset('orionFrontAssets/assets/vendors/isotope/isotope.js') }}"></script> -->
<!-- <script src="{{ asset('orionFrontAssets/assets/vendors/countdown/jquery.countdown.min.js') }}"></script> -->
<script src="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<!-- <script src="{{ asset('orionFrontAssets/assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script> -->
<!-- <script src="{{ asset('orionFrontAssets/assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script> -->
<!-- <script src="{{ asset('orionFrontAssets/assets/vendors/vegas/vegas.min.js') }}"></script> -->
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/timepicker/timePicker.js') }}"></script>
<!-- <script src="{{ asset('orionFrontAssets/assets/vendors/circleType/jquery.circleType.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/circleType/jquery.lettering.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/nice-select/jquery.nice-select.min.js') }}"></script> -->
<!-- template js -->
<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
<script src="{{ asset('orionFrontAssets/assets/js/main.js') }}"></script>
@endsection
@section('page_content')
<section class="page-header">
    <div class="page-header-bg"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/resources/project-up-back.webp')}})">
    </div>
    <div class="page-header__ripped-paper"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/page-header-ripped-paper.png')}});">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span>/</span></li>
                <li>All Sectors</li>
            </ul>
            <h2 class="fnt-clr-g">Sectors We Serve</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--About Three Start-->
<section class="about-three">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Checkout Our Sectors</span>
            <h2 class="section-title__title">Welcome to
                <br> Orion Sectors
            </h2>
        </div>
        @foreach ($allData as $sector )
        @if ($loop->odd)
        <div class="row">
            <div class="col-xl-6">
                <div class="about-three__left">
                    <div class="about-three__shape-2 float-bob-x">
                        <img src="" alt="">
                    </div>
                    <div class="section-title text-left">
                        <span class="section-title__tagline">Orion Sector</span>
                        <h2 class="section-title__title">{{ $sector->name }}</h2>
                    </div>
                    <p class="about-three__text-1">{{ $sector->title }}</p>
                    <p class="about-three__text-2">{{ $sector->desc }}</p>

                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-three__right">
                    <div class="about-three__img-box wow slideInRight" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <div class="about-three__shape-1 float-bob-y">
                            <img src="{{ asset('orionFrontAssets/assets/images/shapes/about-three-shape-1.png')}}"
                                alt="">
                        </div>
                        <div class="about-three__img">
                            <img src="{{ asset('orionFrontAssets/assets/images/sectors/' . $sector->photo)}}" alt="">
                        </div>
                        <div class="about-three__experience">
                            <div class="about-three__experience-shape-1">
                                <img src="{{ asset('orionFrontAssets/assets/images/shapes/about-three-experience-shape-1.png')}}"
                                    alt="">
                            </div>
                            <div class="about-three__experience-inner">
                                <div class="about-three__experience-shape-2">
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/about-three-experience-shape-2.png')}}"
                                        alt="">
                                </div>
                                <div class="about-three__experience-year">
                                    <h3>15+</h3>
                                </div>
                                <div class="about-three__experience-text">
                                    <p>Years of <br> experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="brand-two__inner">
                <div class="thm-swiper__slider swiper-container swiper-container-initialized swiper-container-horizontal"
                    data-swiper-options="{&quot;spaceBetween&quot;: 100, &quot;slidesPerView&quot;:3, &quot;autoplay&quot;: { &quot;delay&quot;: 5000 }, &quot;breakpoints&quot;: {
                &quot;0&quot;: {
                    &quot;spaceBetween&quot;: 30,
                    &quot;slidesPerView&quot;: 2
                },
                &quot;375&quot;: {
                    &quot;spaceBetween&quot;: 30,
                    &quot;slidesPerView&quot;: 2
                },
                &quot;575&quot;: {
                    &quot;spaceBetween&quot;: 30,
                    &quot;slidesPerView&quot;: 3
                },
                &quot;767&quot;: {
                    &quot;spaceBetween&quot;: 50,
                    &quot;slidesPerView&quot;: 4
                },
                &quot;991&quot;: {
                    &quot;spaceBetween&quot;: 50,
                    &quot;slidesPerView&quot;: 5
                },
                &quot;1199&quot;: {
                    &quot;spaceBetween&quot;: 100,
                    &quot;slidesPerView&quot;: 5
                }
            }}">
                    <div class="swiper-wrapper"
                        style="transform: translate3d(-1270px, 0px, 0px); transition-duration: 0ms;">
                        @foreach ($sector->Projects as $project )
                        <div class="swiper-slide" style="width: 154px; margin-right: 100px;">
                            <a href="{{ route('projects.show' , ['project'=>$project->id]) }}"> <img
                                    src="{{ asset('orionFrontAssets/assets/images/project/'.$project->slug_name.'/'.$project->main_image)}}"
                                    style="width: 225px;height:155px" alt=""></a>
                        </div><!-- /.swiper-slide -->

                        @endforeach

                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </div>
        @else
        <div class="row" style="margin-top: 75px;">
            <div class="col-xl-6">
                <div class="about-three__right">
                    <div class="about-three__img-box wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="about-three__shape-1 float-bob-y">
                            <img src="{{ asset('orionFrontAssets/assets/images/shapes/about-three-shape-1.png')}}"
                                alt="">
                        </div>
                        <div class="about-three__img">
                            <img src="{{ asset('orionFrontAssets/assets/images/sectors/' . $sector->photo)}}" alt="">
                        </div>
                        <div class="about-three__experience">
                            <div class="about-three__experience-shape-1">
                                <img src="{{ asset('orionFrontAssets/assets/images/shapes/about-three-experience-shape-1.png')}}"
                                    alt="">
                            </div>
                            <div class="about-three__experience-inner">
                                <div class="about-three__experience-shape-2">
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/about-three-experience-shape-2.png')}}"
                                        alt="">
                                </div>
                                <div class="about-three__experience-year">
                                    <h3>15+</h3>
                                </div>
                                <div class="about-three__experience-text">
                                    <p>Years of <br> experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-three__left">
                    <div class="about-three__shape-2 float-bob-x">
                        <img src="" alt="">
                    </div>
                    <div class="section-title text-left">
                        <span class="section-title__tagline">Orion Sector</span>
                        <h2 class="section-title__title">{{ $sector->name }}</h2>
                    </div>
                    <p class="about-three__text-1">{{ $sector->title }}</p>
                    <p class="about-three__text-2">{{ $sector->desc }}</p>

                </div>
            </div>
            <div class="brand-two__inner">
                <div class="thm-swiper__slider swiper-container swiper-container-initialized swiper-container-horizontal"
                    data-swiper-options="{&quot;spaceBetween&quot;: 100, &quot;slidesPerView&quot;:3, &quot;autoplay&quot;: { &quot;delay&quot;: 5000 }, &quot;breakpoints&quot;: {
                &quot;0&quot;: {
                    &quot;spaceBetween&quot;: 30,
                    &quot;slidesPerView&quot;: 2
                },
                &quot;375&quot;: {
                    &quot;spaceBetween&quot;: 30,
                    &quot;slidesPerView&quot;: 2
                },
                &quot;575&quot;: {
                    &quot;spaceBetween&quot;: 30,
                    &quot;slidesPerView&quot;: 3
                },
                &quot;767&quot;: {
                    &quot;spaceBetween&quot;: 50,
                    &quot;slidesPerView&quot;: 4
                },
                &quot;991&quot;: {
                    &quot;spaceBetween&quot;: 50,
                    &quot;slidesPerView&quot;: 5
                },
                &quot;1199&quot;: {
                    &quot;spaceBetween&quot;: 100,
                    &quot;slidesPerView&quot;: 5
                }
            }}">
                    <div class="swiper-wrapper"
                        style="transform: translate3d(-1270px, 0px, 0px); transition-duration: 0ms;">
                        @foreach ($sector->Projects as $project )
                        <div class="swiper-slide" style="width: 154px; margin-right: 100px;">
                            <a href="{{ route('projects.show' , ['project'=>$project->id]) }}"> <img
                                    src="{{ asset('orionFrontAssets/assets/images/project/'.$project->slug_name.'/'.$project->main_image)}}"
                                    style="width: 225px;height:155px" alt=""></a>
                        </div><!-- /.swiper-slide -->
                        @endforeach
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </div>
        @endif
        @endforeach

    </div>
</section>
<!--About Three End-->
@endsection