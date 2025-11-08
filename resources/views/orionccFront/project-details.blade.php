@extends('layouts.front.app')
@php
$p_nam = 'projects';
@endphp
@section('page_name' , $project->name )

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
<!-- lightGallery CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery.min.css" />
<style>
    /* Custom Video Popup Styles */
    .video-modal iframe {
        width: 100%;
        height: 80vh;
        border: none;
    }

</style>
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

<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/css/style.css') }}" />
@endsection
@section('cust_js')
<!-- Critical scripts loaded immediately -->
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Lazy loading implementation -->
<script>
    // Lazy loading for images
    document.addEventListener('DOMContentLoaded', function() {
        const lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

        if ("IntersectionObserver" in window) {
            let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        let lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        if(lazyImage.dataset.srcset) {
                            lazyImage.srcset = lazyImage.dataset.srcset;
                        }
                        lazyImage.classList.add("loaded");
                        lazyImageObserver.unobserve(lazyImage);
                    }
                });
            });

            lazyImages.forEach(function(lazyImage) {
                lazyImageObserver.observe(lazyImage);
            });
        } else {
            // Fallback for browsers without IntersectionObserver
            let active = false;
            const lazyLoad = function() {
                if (active === false) {
                    active = true;
                    setTimeout(function() {
                        lazyImages.forEach(function(lazyImage) {
                            if ((lazyImage.getBoundingClientRect().top <= window.innerHeight &&
                                 lazyImage.getBoundingClientRect().bottom >= 0) &&
                                 getComputedStyle(lazyImage).display !== "none") {
                                lazyImage.src = lazyImage.dataset.src;
                                if(lazyImage.dataset.srcset) {
                                    lazyImage.srcset = lazyImage.dataset.srcset;
                                }
                                lazyImage.classList.add("loaded");
                                lazyImages = lazyImages.filter(function(image) {
                                    return image !== lazyImage;
                                });
                                if (lazyImages.length === 0) {
                                    document.removeEventListener("scroll", lazyLoad);
                                    window.removeEventListener("resize", lazyLoad);
                                    window.removeEventListener("orientationchange", lazyLoad);
                                }
                            }
                        });
                        active = false;
                    }, 200);
                }
            };
            document.addEventListener("scroll", lazyLoad);
            window.addEventListener("resize", lazyLoad);
            window.addEventListener("orientationchange", lazyLoad);
            lazyLoad();
        }

        // Carousel lazy loading - load next/prev images when carousel slides
        const carousel = document.querySelector('#carouselExampleIndicators');
        if (carousel) {
            carousel.addEventListener('slide.bs.carousel', function(e) {
                const nextSlide = e.relatedTarget;
                const lazyImg = nextSlide.querySelector('img.lazy');
                if (lazyImg && lazyImg.dataset.src) {
                    lazyImg.src = lazyImg.dataset.src;
                    lazyImg.classList.remove('lazy');
                    lazyImg.classList.add('loaded');
                }
            });
        }
    });

    // Deferred script loading
    function loadDeferredScripts() {
        const scripts = [
            "{{ asset('orionFrontAssets/assets/vendors/jarallax/jarallax.min.js') }}",
            "{{ asset('orionFrontAssets/assets/vendors/jquery-appear/jquery.appear.min.js') }}",
            "{{ asset('orionFrontAssets/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}",
            "{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.js') }}",
            "{{ asset('orionFrontAssets/assets/vendors/wow/wow.js') }}",
            "{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.js') }}",
            "https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js",
            "https://cdnjs.cloudflare.com/ajax/libs/lg-zoom/2.7.1/lg-zoom.min.js",
            "https://cdnjs.cloudflare.com/ajax/libs/lg-fullscreen/2.7.1/lg-fullscreen.min.js",
            "{{ asset('orionFrontAssets/assets/js/main.js') }}"
        ];

        let loadedScripts = 0;
        function loadScript(index) {
            if (index >= scripts.length) return;

            const script = document.createElement('script');
            script.src = scripts[index];
            script.onload = function() {
                loadedScripts++;
                loadScript(index + 1);
            };
            script.onerror = function() {
                console.warn('Failed to load script:', scripts[index]);
                loadScript(index + 1);
            };
            document.body.appendChild(script);
        }
        loadScript(0);
    }

    // Use requestIdleCallback or setTimeout to defer non-critical scripts
    if ('requestIdleCallback' in window) {
        requestIdleCallback(loadDeferredScripts);
    } else {
        setTimeout(loadDeferredScripts, 1000);
    }
</script>
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
            <h2 class="fnt-clr-g">{{ $project?->Client?->name }}</h2>
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
                    <div class="portfolio-details__img video-one video-one__video-link" style="position: relative">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/project/'.$project->slug_name . '/' . $project->gif ?? $project->main_image) }}"
                            alt="{{ $project->name }}" class="lazy" loading="lazy">
                        <a href="#" style="position: absolute;top:50%;left:50%;transform:translate(-50% , -50%)" class="video-popup-trigger" data-bs-toggle="modal" data-bs-target="#videoModal">
                            <div class="video-one__video-icon">
                                <span class="fa fa-play"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>
                    </div>

                    <!-- Deferred YouTube iframe loading -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-body video-modal">
                                    @if($videoUrl)
                                    <div id="youtubePlayerContainer" data-video-url="{{ $videoUrl }}"></div>
                                    @else
                                    <div class="alert alert-info">Video not available</div>
                                    @endif
                                </div>
                            </div>
                        </div>
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
    {{-- <section class="testimonial-two" style="padding: 50px 0 50px;">
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

                            <div id="inline-gallery-container" class="inline-gallery-container swiper-wrapper"></div>
                            <script>
                                var videoUrl = @json($videoUrl);
                                var projectg = @json($projectg->gallaries);


                                    var galleryImages = @json($project->gallaries->map(function($gallery) use ($project) {
                                    return [
                                        'src' => asset('orionFrontAssets/assets/images/project/' . $project->slug_name . '/' . $gallery->image),
                                        'thumb' => asset('orionFrontAssets/assets/images/project/' . $project->slug_name . '/' . $gallery->image),
                                    ];

                                }));
                                var lgContainer = document.getElementById('inline-gallery-container');
                                    var inlineGallery = lightGallery(lgContainer, {
                                        container: lgContainer,
                                    dynamic: true,
                                    dynamicEl: galleryImages,
                                    autoplay: true,
                                    thumbnail: true,
                                    hash: false,
                                    closable: false,
                                    showMaximizeIcon: false,
                                    appendSubHtmlTo: '.lg-item',
                                    slideDelay: 400,
                                    thumbWidth: 60,
                                    thumbHeight: "40px",
                                    thumbMargin: 4,
                                    download: false,
                                    counter: true,
                                    enableSwipe: true,
                                    enableDrag: true,
                                    swipeThreshold: 50,
                                    loop: true,
                                    fullScreen: true,
                                    zoom: true,
                                    scale: 1,
                                    actualSize: true
                                    });

                                    // Since we are using dynamic mode, we need to programmatically open lightGallery
                                    inlineGallery.openGallery();

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

                            </script>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="testimonial-two" style="padding: 50px 0 50px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="testimonial-two__left mt-5">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Our project Gallery</span>
                            <h2 class="section-title__title">It's Good To Share Our Work With You</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        {{-- <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div> --}}
                        <div class="carousel-inner">
                            @foreach($project->gallaries as $gallery)
                          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img {{ $loop->first ? 'src' : 'data-src' }}="{{ asset('orionFrontAssets/assets/images/project/' .$project->slug_name .  '/' . $gallery->image ) }}"
                                class="d-block w-100{{ $loop->first ? '' : ' lazy' }}"
                                alt="{{ $project->name }} gallery image"
                                {{ $loop->first ? '' : 'loading="lazy"' }}>
                          </div>
                          @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>




                </div>
            </div>
        </div>
    </section>

    <script>
    // Deferred YouTube iframe loading - only load when modal is opened
    let youtubeLoaded = false;
    let ytPlayer = null;

    $('#videoModal').on('show.bs.modal', function() {
        const container = document.getElementById('youtubePlayerContainer');
        if (container && !youtubeLoaded) {
            const videoUrl = container.dataset.videoUrl;
            if (videoUrl) {
                const iframe = document.createElement('iframe');
                iframe.id = 'youtubePlayer';
                iframe.src = videoUrl + '?autoplay=1&mute=1&enablejsapi=1&rel=0';
                iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
                iframe.allowFullscreen = true;
                iframe.style.width = '100%';
                iframe.style.height = '80vh';
                iframe.style.border = 'none';
                container.appendChild(iframe);
                youtubeLoaded = true;

                // Load YouTube API after iframe is created
                if (!window.YT) {
                    const tag = document.createElement('script');
                    tag.src = 'https://www.youtube.com/iframe_api';
                    document.body.appendChild(tag);
                }
            }
        }
    });

    // Handle modal close events
    $('#videoModal').on('hidden.bs.modal', function() {
        const iframe = document.getElementById('youtubePlayer');
        if (iframe) {
            // Stop video by removing and re-adding iframe
            const container = iframe.parentNode;
            const videoUrl = container.dataset.videoUrl;
            container.removeChild(iframe);
            youtubeLoaded = false;
        }
    });
    </script>
</div>

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
                                    <img data-src="{{ asset('orionFrontAssets/assets/images/project/' . $pro->slug_name . '/' . $pro->main_image) }}"
                                        alt="{{ $pro->name }}" class="lazy" loading="lazy">
                                </div>
                                <div class="gallery-one__content-box">
                                    <div class="gallery-one__content">
                                        <div class="gallery-one__shape-1">
                                            <img data-src="{{ asset('orionFrontAssets/assets/images/shapes/gallery-one-shape-1.png') }}"
                                                alt="" class="lazy" loading="lazy">
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
