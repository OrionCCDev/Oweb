@extends('layouts.front.app')

@php
$p_nam = 'certificate';
@endphp

@section('page_name' , 'Certification')

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
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/ogenix-icons/style.css') }}">
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
@if ($p_nam == 'projects')
<link rel="stylesheet"
    href="{{ asset('orionFrontAssets/assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
@endif
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/jquery-ui/jquery-ui.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/timepicker/timePicker.css') }}" />
@if ($p_nam == 'projects')
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/nice-select/nice-select.css') }}" />
@endif
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/css/style.css') }}" />
@endsection

@section('cust_js')
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jarallax/jarallax.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}">
</script>
<script src="{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/wow/wow.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/timepicker/timePicker.js') }}"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="https://threejs.org/examples/js/libs/stats.min.js"></script>
<script src="{{ asset('orionFrontAssets/assets/js/main.js') }}"></script>
@endsection

@section('page_content')

<!--Page Header Start-->
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
                <li><a>Certifications</a></li>
            </ul>
            <h2 class="fnt-clr-g">Orion Certification</h2>
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
                        <span class="section-title__tagline">Checkout Our Certifications</span>
                        <h2 class="section-title__title">Orion <br> Contracting Company</h2>
                    </div>
                </div>
            </div>
        </div>

        @forelse ($certificates as $index => $certificate)
        <div class="portfolio-details__bottom">
            <div class="row">
                @php $imageFirst = $index % 2 === 1; @endphp

                @if ($imageFirst)
                <div class="col-xl-6 col-lg-6">
                    <div class="portfolio-details__right">
                        <div class="banner-one__right wow">
                            <div class="banner-one__inner20 ">
                                <div class="banner-one__img-20">
                                    <img style="width: 100%"
                                        src="{{ $certificate->hasMedia('certificates') ? $certificate->getFirstMediaUrl('certificates') : asset('orionFrontAssets/assets/images/certificate/placeholder.png') }}"
                                        alt="{{ $certificate->title }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-xl-6 col-lg-6">
                    <div class="portfolio-details__left">
                        <h3 class="portfolio-details__title">{{ $certificate->title }}</h3>
                        @if ($certificate->subtitle)
                        <h5 class="portfolio-details__title fnt-clr-sb">{{ $certificate->subtitle }}</h5>
                        @endif
                        @if ($certificate->description)
                        <p class="portfolio-details__text-1">{{ $certificate->description }}</p>
                        @endif
                        @if ($certificate->summary)
                        <p class="portfolio-details__text-2">{{ $certificate->summary }}</p>
                        @endif
                        @if (!empty($certificate->points))
                        <ul class="portfolio-details__points-box list-unstyled">
                            @foreach ($certificate->points as $point)
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p>
                                        @if (!empty($point['title']))
                                        <span class="f-w-900">{{ $point['title'] }}:</span>
                                        @endif
                                        {{ $point['text'] ?? '' }}
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        @if ($certificate->closing_text)
                        <p class="portfolio-details__text-2">{{ $certificate->closing_text }}</p>
                        @endif
                    </div>
                </div>

                @unless ($imageFirst)
                <div class="col-xl-6 col-lg-6">
                    <div class="portfolio-details__right">
                        <div class="banner-one__right wow">
                            <div class="banner-one__inner20 ">
                                <div class="banner-one__img-20">
                                    <img style="width: 100%"
                                        src="{{ $certificate->hasMedia('certificates') ? $certificate->getFirstMediaUrl('certificates') : asset('orionFrontAssets/assets/images/certificate/placeholder.png') }}"
                                        alt="{{ $certificate->title }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endunless
            </div>
        </div>
        @empty
        <div class="portfolio-details__bottom">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <p>Certifications will be published here soon.</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</section>

@endsection
