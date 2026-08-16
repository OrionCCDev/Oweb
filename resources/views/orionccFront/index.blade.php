@extends('layouts.front.app')
@php
$p_nam = 'home';
@endphp
@section('page_name' , 'Home | Leading Construction Company in UAE & Saudi Arabia')

{{-- SEO Meta Tags --}}
@section('meta_description', 'Orion Contracting Company: premier construction and contracting firm with 15+ years of expertise in commercial, industrial, and residential projects across UAE and Saudi Arabia. ISO certified, trusted for quality and timely delivery.')
@section('meta_keywords', 'construction company UAE, contracting Saudi Arabia, commercial construction, industrial projects, MEP contractors, construction management, building contractors, Orion Contracting, Dubai construction, Ras Al Khaimah construction company')
@section('canonical_url', route('home'))

{{-- Open Graph Tags --}}
@section('og_type', 'website')
@section('og_title', 'Orion Contracting Company - Leading Construction Experts in UAE & Saudi Arabia')
@section('og_description', 'Leading construction experts delivering innovative solutions across UAE & Saudi Arabia. 15+ years of excellence in commercial and industrial projects.')
@section('og_image', asset('orionFrontAssets/assets/images/resources/logo-blue.webp'))
@section('og_url', route('home'))

{{-- Twitter Card Tags --}}
@section('twitter_title', 'Orion Contracting - Construction Excellence in UAE & KSA')
@section('twitter_description', 'Leading construction and contracting experts with 15+ years of experience across UAE and Saudi Arabia.')
@section('twitter_image', asset('orionFrontAssets/assets/images/resources/logo-blue.webp'))

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
<!-- Organization Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "GeneralContractor",
  "name": "Orion Contracting Company",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('orionFrontAssets/assets/images/resources/logo-blue.webp') }}",
  "image": "{{ asset('orionFrontAssets/assets/images/resources/logo-blue.webp') }}",
  "telephone": "+97172335531",
  "email": "info@orioncc.com",
  "foundingDate": "2008",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Al-Hamra Industrial Area",
    "addressLocality": "Ras Al Khaimah",
    "addressRegion": "Ras Al Khaimah",
    "addressCountry": "AE"
  },
  "sameAs": [
    "https://www.facebook.com/orioncontractingcompany",
    "https://www.linkedin.com/company/orion-contracting-company-llc/",
    "https://www.youtube.com/@orioncontracting9881",
    "https://www.instagram.com/orioncontracting/"
  ]
}
</script>
@endsection
<style>
    /* Add preload styles to improve above-the-fold loading */
    .lazy-load {
        opacity: 0;
        transition: opacity 0.3s;
    }
    .lazy-load.loaded {
        opacity: 1;
    }

    /* Certificate slider custom styles */
    .certificates-slider, .sectors-slider {
        position: relative;
        padding-bottom: 50px;
    }
    .certificates-slider .swiper-button-next,
    .certificates-slider .swiper-button-prev,
    .sectors-slider .swiper-button-next,
    .sectors-slider .swiper-button-prev {
        color: #10ca9d;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        width: 44px;
        height: 44px;
    }
    .certificates-slider .swiper-button-next:after,
    .certificates-slider .swiper-button-prev:after,
    .sectors-slider .swiper-button-next:after,
    .sectors-slider .swiper-button-prev:after {
        font-size: 20px;
    }
    .certificates-slider .swiper-pagination,
    .sectors-slider .swiper-pagination {
        bottom: 10px;
    }
    .certificates-slider .swiper-pagination-bullet,
    .sectors-slider .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background: #10ca9d;
        opacity: 0.5;
    }
    .certificates-slider .swiper-pagination-bullet-active,
    .sectors-slider .swiper-pagination-bullet-active {
        opacity: 1;
        background: #10ca9d;
    }

    /* Shining hover effect for project cards */
    .hot-products__single {
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .hot-products__single::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            45deg,
            transparent 30%,
            rgba(255, 255, 255, 0.3) 50%,
            transparent 70%
        );
        transform: translateX(-100%) translateY(-100%) rotate(45deg);
        transition: transform 0.6s ease;
        z-index: 1;
        pointer-events: none;
    }

    .hot-products__single:hover::before {
        transform: translateX(100%) translateY(100%) rotate(45deg);
    }

    .hot-products__single:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .hot-products__single-inner {
        position: relative;
        z-index: 2;
    }
</style>
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
<div id="site-intro" class="site-intro">
    <video id="site-intro-video" class="site-intro__video" autoplay muted playsinline preload="auto">
        <source src="{{ asset('orionFrontAssets/assets/video/orion-story.mp4') }}" type="video/mp4">
    </video>
    <div class="site-intro__overlay"></div>
    <div class="site-intro__logo">
        <img src="{{ asset('orionFrontAssets/assets/images/resources/logo-white.webp') }}" alt="Orion Contracting Company">
    </div>
    <button type="button" id="site-intro-skip" class="site-intro__skip">
        <span>Skip Intro</span>
        <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h11.5M8 1l4.5 4L8 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <div class="site-intro__progress"><div class="site-intro__progress-bar" id="site-intro-progress-bar"></div></div>
</div>
<script>
(function () {
    var intro = document.getElementById('site-intro');
    if (!intro) return;

    if (sessionStorage.getItem('orion_intro_seen') === '1') {
        intro.style.display = 'none';
        return;
    }

    document.body.style.overflow = 'hidden';

    var video = document.getElementById('site-intro-video');
    var skipBtn = document.getElementById('site-intro-skip');
    var progressBar = document.getElementById('site-intro-progress-bar');
    var closed = false;

    function closeIntro() {
        if (closed) return;
        closed = true;
        sessionStorage.setItem('orion_intro_seen', '1');
        intro.classList.add('site-intro--hidden');
        document.body.style.overflow = '';
        setTimeout(function () {
            intro.style.display = 'none';
            if (video) video.pause();
        }, 650);
    }

    if (skipBtn) skipBtn.addEventListener('click', closeIntro);

    if (video) {
        video.addEventListener('ended', closeIntro);
        video.addEventListener('timeupdate', function () {
            if (video.duration && progressBar) {
                progressBar.style.width = ((video.currentTime / video.duration) * 100) + '%';
            }
        });
        video.play().catch(closeIntro);

        // Safety net: if the video never loads (network issue etc.), don't trap the visitor
        setTimeout(function () {
            if (!closed && video.readyState === 0) closeIntro();
        }, 4000);
    } else {
        closeIntro();
    }
})();
</script>
@endsection
@section('cust_js')
<script>
    // Lazy loading function
    document.addEventListener('DOMContentLoaded', function() {
        // Set slider height based on screen width
        if (window.innerWidth <= 400) {
            document.documentElement.style.setProperty('--slider-height', '50vh');
        } else if (window.innerWidth <= 900) {
            document.documentElement.style.setProperty('--slider-height', '70vh');
        } else {
            document.documentElement.style.setProperty('--slider-height', '100vh');
        }

        // Update on resize
        window.addEventListener('resize', function() {
            if (window.innerWidth <= 400) {
                document.documentElement.style.setProperty('--slider-height', '50vh');
            } else if (window.innerWidth <= 900) {
                document.documentElement.style.setProperty('--slider-height', '70vh');
            } else {
                document.documentElement.style.setProperty('--slider-height', '100vh');
            }
        });

        // Separate priority images (above the fold) from project images
        const priorityImages = [].slice.call(document.querySelectorAll(".feature-one img.lazy, .main-slider img.lazy"));
        const projectImages = [].slice.call(document.querySelectorAll(".hot-products__img img.lazy"));
        const otherImages = [].slice.call(document.querySelectorAll("img.lazy:not(.hot-products__img img):not(.feature-one img):not(.main-slider img)"));

        if ("IntersectionObserver" in window) {
            // Observer for priority images (load immediately)
            let priorityImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        let lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        if(lazyImage.dataset.srcset) {
                            lazyImage.srcset = lazyImage.dataset.srcset;
                        }
                        lazyImage.classList.add("loaded");
                        priorityImageObserver.unobserve(lazyImage);
                    }
                });
            });

            // Observer for project images (load with delay after priority content)
            let projectImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        let lazyImage = entry.target;
                        // Delay loading project images by 500ms to prioritize hero content
                        setTimeout(function() {
                            lazyImage.src = lazyImage.dataset.src;
                            if(lazyImage.dataset.srcset) {
                                lazyImage.srcset = lazyImage.dataset.srcset;
                            }
                            lazyImage.classList.add("loaded");
                        }, 500);
                        projectImageObserver.unobserve(lazyImage);
                    }
                });
            });

            // Observer for other images
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

            // Load priority images first
            priorityImages.forEach(function(lazyImage) {
                priorityImageObserver.observe(lazyImage);
            });

            // Load project images after priority
            projectImages.forEach(function(lazyImage) {
                projectImageObserver.observe(lazyImage);
            });

            // Load other images normally
            otherImages.forEach(function(lazyImage) {
                lazyImageObserver.observe(lazyImage);
            });
        } else {
            // Fallback for browsers without intersection observer
            let active = false;
            let allLazyImages = priorityImages.concat(projectImages).concat(otherImages);

            const lazyLoad = function() {
                if (active === false) {
                    active = true;

                    setTimeout(function() {
                        allLazyImages.forEach(function(lazyImage) {
                            if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
                                lazyImage.src = lazyImage.dataset.src;
                                if(lazyImage.dataset.srcset) {
                                    lazyImage.srcset = lazyImage.dataset.srcset;
                                }
                                lazyImage.classList.add("loaded");

                                allLazyImages = allLazyImages.filter(function(image) {
                                    return image !== lazyImage;
                                });

                                if (allLazyImages.length === 0) {
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

        // Initialize certificate slider specifically
        if (typeof Swiper !== 'undefined') {
            // Check if the Swiper container exists
            const certificateSlider = document.querySelector('.certificates-slider');
            if (certificateSlider) {
                // Get swiper options from data attribute
                const options = certificateSlider.dataset.swiperOptions ?
                    JSON.parse(certificateSlider.dataset.swiperOptions.replace(/'/g, '"')) : {};

                // Initialize the swiper
                new Swiper('.certificates-slider', options);
            }
        } else {
            // If Swiper isn't loaded yet, wait for it
            const checkSwiper = setInterval(function() {
                if (typeof Swiper !== 'undefined') {
                    clearInterval(checkSwiper);

                    const certificateSlider = document.querySelector('.certificates-slider');
                    if (certificateSlider) {
                        const options = certificateSlider.dataset.swiperOptions ?
                            JSON.parse(certificateSlider.dataset.swiperOptions.replace(/'/g, '"')) : {};

                        new Swiper('.certificates-slider', options);
                    }
                }
            }, 100);
        }
    });

    // Load non-critical scripts
    function loadDeferredScripts() {
        const scripts = [
            '{{ asset('orionFrontAssets/assets/vendors/jquery/jquery-3.6.0.min.js') }}',
            '{{ asset('orionFrontAssets/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}',
            '{{ asset('orionFrontAssets/assets/vendors/jarallax/jarallax.min.js') }}',
            '{{ asset('orionFrontAssets/assets/vendors/jquery-appear/jquery.appear.min.js') }}',
            '{{ asset('orionFrontAssets/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}',
            '{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.js') }}',
            '{{ asset('orionFrontAssets/assets/vendors/wow/wow.js') }}',
            '{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.js') }}',
            '{{ asset('orionFrontAssets/assets/vendors/jquery-ui/jquery-ui.js') }}',
            '{{ asset('orionFrontAssets/assets/vendors/timepicker/timePicker.js') }}',
            '{{ asset('orionFrontAssets/assets/js/main.js') }}'
        ];

        let loadedCount = 0;

        function loadScript(index) {
            if (index >= scripts.length) {
                // All scripts loaded
                return;
            }

            const script = document.createElement('script');
            script.src = scripts[index];
            script.onload = function() {
                loadedCount++;
                loadScript(index + 1);

                // Initialize certificate slider after swiper.min.js is loaded
                if (script.src.includes('swiper.min.js')) {
                    setTimeout(function() {
                        const certificateSlider = document.querySelector('.certificates-slider');
                        if (certificateSlider) {
                            const options = certificateSlider.dataset.swiperOptions ?
                                JSON.parse(certificateSlider.dataset.swiperOptions.replace(/'/g, '"')) : {};

                            new Swiper('.certificates-slider', options);
                        }

                        // Initialize sectors slider
                        const sectorsSlider = document.querySelector('.sectors-slider');
                        if (sectorsSlider) {
                            const options = sectorsSlider.dataset.swiperOptions ?
                                JSON.parse(sectorsSlider.dataset.swiperOptions.replace(/'/g, '"')) : {};

                            new Swiper('.sectors-slider', options);
                        }
                    }, 500);
                }
            };
            document.body.appendChild(script);
        }

        // Start loading scripts
        loadScript(0);
    }

    // Use requestIdleCallback or setTimeout to defer non-critical tasks
    if ('requestIdleCallback' in window) {
        requestIdleCallback(loadDeferredScripts);
    } else {
        setTimeout(loadDeferredScripts, 2000);
    }
</script>
@endsection


@section('page_content')

<!--Hero Start-->
<section class="hero-crystal" id="hero-crystal">
    <video class="hero-crystal__video" autoplay muted loop playsinline
        poster="{{ asset('orionFrontAssets/assets/video/video-screen.png') }}">
        <source src="{{ setting('hero_video') ?: asset('orionFrontAssets/assets/video/hero-bg-loop.mp4') }}" type="video/mp4">
    </video>
    <div class="hero-crystal__video-overlay"></div>
    <div class="hero-crystal__blueprint" aria-hidden="true"></div>

    <div class="hero-crystal__facet hero-crystal__facet--1" data-speed="0.4"></div>
    <div class="hero-crystal__facet hero-crystal__facet--2" data-speed="0.25"></div>
    <div class="hero-crystal__facet hero-crystal__facet--3" data-speed="0.15"></div>

    <div class="hero-crystal__corner hero-crystal__corner--tl" aria-hidden="true"></div>
    <div class="hero-crystal__corner hero-crystal__corner--tr" aria-hidden="true"></div>
    <div class="hero-crystal__corner hero-crystal__corner--bl" aria-hidden="true"></div>
    <div class="hero-crystal__corner hero-crystal__corner--br" aria-hidden="true"></div>

    <div class="hero-crystal__content">
        <span class="hero-crystal__eyebrow">Since 2008 · UAE &amp; Saudi Arabia</span>
        <h1 class="hero-crystal__title">{{ setting('hero_title', 'Precision-Built Structures Across the UAE & Saudi Arabia') }}</h1>
        <p class="hero-crystal__subtitle">{{ setting('hero_subtitle', 'Commercial, industrial & MEP construction — trusted for quality, reliability, and on-schedule delivery.') }}</p>
        <div class="hero-crystal__actions">
            <a href="{{ route('projects.index') }}" class="hero-crystal__btn hero-crystal__btn--primary">
                View Our Projects
                <span class="hero-crystal__btn-arrow"><svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h11.5M8 1l4.5 4L8 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            </a>
            <a href="{{ route('contact') }}" class="hero-crystal__btn hero-crystal__btn--ghost">
                Get In Touch
                <span class="hero-crystal__btn-arrow"><svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h11.5M8 1l4.5 4L8 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            </a>
        </div>
        <button type="button" class="hero-crystal__watch-btn" id="orion-story-trigger">
            <span class="hero-crystal__watch-icon">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="currentColor"><path d="M2 1.5v11l10-5.5-10-5.5z"/></svg>
            </span>
            Watch Our Story
        </button>
    </div>

    <div class="hero-crystal__scroll-cue" aria-hidden="true"></div>
</section>

<section class="stats-bar">
    <div class="container">
        <div class="stats-bar__inner">
            <div class="stats-bar__item">
                <div class="stats-bar__value">{{ $stats['years'] }}</div>
                <div class="stats-bar__label">Years of Experience</div>
            </div>
            <div class="stats-bar__item">
                <div class="stats-bar__value">{{ $stats['projects'] }}</div>
                <div class="stats-bar__label">Projects Delivered</div>
            </div>
            <div class="stats-bar__item">
                <div class="stats-bar__value">{{ $stats['sectors'] }}</div>
                <div class="stats-bar__label">Sectors Served</div>
            </div>
            <div class="stats-bar__item">
                <div class="stats-bar__value stats-bar__value--plain">UAE&nbsp;&amp;&nbsp;KSA</div>
                <div class="stats-bar__label">Where We Build</div>
            </div>
        </div>
    </div>
</section>

<div id="orion-story-popup" class="mfp-hide hero-crystal__story-popup">
    <video id="orion-story-video" controls playsinline
        poster="{{ asset('orionFrontAssets/assets/video/video-screen.png') }}">
        <source src="{{ asset('orionFrontAssets/assets/video/orion-story.mp4') }}" type="video/mp4">
    </video>
</div>
<!--Hero End-->

<script>
(function () {
    var hero = document.getElementById('hero-crystal');
    if (!hero) return;
    var facets = hero.querySelectorAll('.hero-crystal__facet');
    if (!facets.length) return;
    if (window.matchMedia('(max-width: 768px)').matches) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    var ticking = false;
    function update() {
        ticking = false;
        var rect = hero.getBoundingClientRect();
        if (rect.bottom < 0 || rect.top > window.innerHeight) return;
        for (var i = 0; i < facets.length; i++) {
            var speed = parseFloat(facets[i].getAttribute('data-speed')) || 0.2;
            facets[i].style.transform = 'translate3d(0,' + (rect.top * -speed) + 'px,0)';
        }
    }
    function onScroll() {
        if (!ticking) {
            ticking = true;
            requestAnimationFrame(update);
        }
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    update();
})();
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var trigger = document.getElementById('orion-story-trigger');
    if (!trigger) return;

    function bindStoryPopup() {
        if (typeof jQuery === 'undefined' || typeof jQuery.fn.magnificPopup === 'undefined') {
            return false;
        }
        jQuery(trigger).magnificPopup({
            items: { src: '#orion-story-popup', type: 'inline' },
            mainClass: 'mfp-fade',
            removalDelay: 160,
            fixedContentPos: true,
            callbacks: {
                open: function () {
                    var video = document.getElementById('orion-story-video');
                    if (video) video.play().catch(function () {});
                },
                close: function () {
                    var video = document.getElementById('orion-story-video');
                    if (video) { video.pause(); video.currentTime = 0; }
                }
            }
        });
        return true;
    }

    if (!bindStoryPopup()) {
        var waitForMagnific = setInterval(function () {
            if (bindStoryPopup()) clearInterval(waitForMagnific);
        }, 100);
    }
});
</script>

<!--Feature One Start-->
<section class="feature-one">
    <div class="container">
        <div class="feature-one__inner">
            <ul class="feature-one__list list-unstyled">
                @forelse ($homeFeatures as $feature)
                <!--feature One Single Start-->
                <li>
                    <div class="feature-one__single">
                        <div class="feature-one__icon">
                            <span class="">
                                @if ($feature->hasMedia('icon'))
                                <img width="64" height="64" loading="lazy"
                                    data-src="{{ $feature->getFirstMediaUrl('icon') }}"
                                    alt="{{ $feature->title }} icon" class="lazy">
                                @endif
                            </span>
                        </div>
                        <div class="feature-one__content">
                            <h3 class="feature-one__title">{{ $feature->title }}</h3>
                            @if ($feature->subtitle)
                            <p class="feature-one__subtitle">{{ $feature->subtitle }}</p>
                            @endif
                        </div>
                    </div>
                </li>
                <!--feature One Single End-->
                @empty
                <!--feature One Single Start-->
                <li>
                    <div class="feature-one__single">
                        <div class="feature-one__icon">
                            <span class="">
                                <img width="64" height="64" loading="lazy"
                                    data-src="{{ asset('orionFrontAssets/assets/images/icon/quality-icon-award-vector-25322832.png') }}"
                                    alt="Quality icon" class="lazy">
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
                                <img width="64" height="64" loading="lazy" data-src="{{ asset('orionFrontAssets/assets/images/icon/efficiency.png') }}"
                                    alt="Efficiency icon" class="lazy">
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
                                <img data-src="{{ asset('orionFrontAssets/assets/images/icon/idea.png') }}" alt="" class="lazy">
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
                                <img data-src="{{ asset('orionFrontAssets/assets/images/icon/safty.png') }}" alt="" class="lazy">
                            </span>
                        </div>
                        <div class="feature-one__content">
                            <h3 class="feature-one__title">Safety Standards</h3>
                            <p class="feature-one__subtitle">Strict safety protocols</p>
                        </div>
                    </div>
                </li>
                <!--feature One Single End-->
                @endforelse
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
            <img data-src="{{ asset('orionFrontAssets/assets/images/shapes/shapes2-05.png') }}" alt="" class="lazy">
        </div>
        <div class="testimonial-one__bg-shape">
            <img data-src="{{ asset('orionFrontAssets/assets/images/shapes/shapes2-05.png') }}" alt="" class="lazy">
        </div>
        <div class="container">
            <div class="hot-products-two__top">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Checkout Our Projects</span>
                            <h2 class="section-title__title">{{ setting('projects_title', 'Our Projects') }}</h2>
                            @if (setting('projects_description'))
                                <p class="section-title__text">{{ setting('projects_description') }}</p>
                            @endif
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
                                            @php
                                                $resolveMain = function($proj){
                                                    $name = $proj->main_image;
                                                    $candidates = [];
                                                    $candidates[] = $name;
                                                    if ($name && !str_contains($name, '/')) {
                                                        $candidates[] = $proj->slug_name . '/' . $name;
                                                        $candidates[] = $proj->slug_name . '/gallery/' . $name;
                                                    }
                                                    foreach (array_unique($candidates) as $c) {
                                                        if (Storage::disk('projects')->exists($c)) {
                                                            return Storage::disk('projects')->url($c);
                                                        }
                                                    }
                                                    return asset('orionFrontAssets/assets/images/project/' . $proj->slug_name . '/' . $name);
                                                };
                                                $cardMainUrl = $resolveMain($project);
                                            @endphp
                                            <img src="{{ $cardMainUrl }}"
                                                alt="{{ $project->name }}">
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
            <span class="section-title__tagline">{{ setting('home_certificates.tagline', 'Our Certificate') }}</span>
            <h2 class="section-title__title">{!! nl2br(e(setting('home_certificates.title', "Orion\nYour Trusted Partner"))) !!}</h2>
        </div>
        @if ($certificates->isNotEmpty())
        <div class="row">
            <div class="thm-swiper__slider swiper-container certificates-slider" data-swiper-options='{"spaceBetween": 100,"slidesPerView": 3,"speed": 500, "autoplay": { "delay": 3000 },"loop":true, "pagination": {"el": ".swiper-pagination", "clickable": true}, "navigation": {"nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev"}, "breakpoints": {
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
                    "slidesPerView": 3
                }
            }}'>
                <div class="swiper-wrapper">
                    @foreach ($certificates as $certificate)
                    <div class="col-xl-6 col-lg-6 swiper-slide" data-wow-delay="100ms">
                        <div class="banner-one__right wow" data-wow-delay="100ms" data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;">
                            <div class="banner-one__inner {{ $loop->even ? 'banner-one__inner-2' : '' }}">
                                <div class="banner-one__img-2">
                                    @if ($certificate->hasMedia('certificates'))
                                    <img data-src="{{ $certificate->getFirstMediaUrl('certificates') }}"
                                        alt="{{ $certificate->title }}" class="lazy">
                                    @endif
                                </div>
                                <div class="banner-one__shape-1">
                                    <img data-src="{{ asset('orionFrontAssets/assets/images/shapes/banner-shape-4.png') }}"
                                        alt="" class="lazy">
                                </div>
                                <div class="banner-one__shape-5">
                                    <img data-src="{{ asset('orionFrontAssets/assets/images/shapes/banner-shape-5.png') }}"
                                        alt="" class="lazy">
                                </div>

                                <p class="banner-one__tagline">OrionCC</p>
                                <h3 class="banner-one__title">{{ $certificate->title }}</h3>
                                @if ($certificate->subtitle)
                                <div class="banner-one__btn-box">
                                    <p class="banner-one__tagline">{{ $certificate->subtitle }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <div class="testimonial-one__btn-box offset-5 mt-5">
                <a href="{{ route('certificate.index') }}" class="testimonial-one__btn thm-btn">View all
                    Certifications</a>
            </div>
        </div>
        @endif
    </div>
</section>
<section class="about-one">
    <div class="about-one__shape-11 float-bob-y">
        <img data-src="{{ asset('orionFrontAssets/assets/images/shapes/shapes2-01.png') }}" alt="" loading="lazy" class="lazy">
    </div>
    <div class="container">
        <div class="row">
            {{-- <div class="col-xl-6">
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
                            <img data-src="{{ asset('orionFrontAssets/assets/images/shapes/shapes2-09.png') }}" alt="" class="lazy">
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
                            <img data-src="{{ asset('orionFrontAssets/assets/images/team/ghasan.png') }}" alt="" class="lazy">
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
            </div> --}}
            <div class="col-xl-12">
                <div class="about-one__right">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">{{ setting('about_tagline', 'You Dream We Build') }}</span>
                        <h2 class="section-title__title">{{ setting('about_title', 'Orion Founders Message') }}</h2>
                    </div>

                    @if (setting('about_description'))
                        <p class="about-one__text-1">{{ setting('about_description') }}</p>
                    @else
                        <p class="about-one__text-1">Founded in 2008 by a team of young, Experts engineers, our
                            company has grown by leveraging extensive knowledge in industrial and commercial
                            construction within the region.</p>
                        <p class="about-one__text-2">We have built our reputation on the foundation of innovative
                            technologies and methods, combined with creative concepts, designs, and meticulous
                            project execution.</p>
                    @endif
                    <div class="about-one__bottom">
                        <div class="about-one__bottom-icon">
                            <img data-src="{{ asset('orionFrontAssets/assets/images/icon/014-labor.png') }}" alt="" class="lazy">
                        </div>
                        <div class="text">
                            <h3>{{ setting('about_commitment_text', 'Our unwavering commitment is to achieve the ultimate satisfaction of our clients') }}</h3>
                        </div>
                    </div>
                    <div class="about-one__btn-box">
                        <a href="{{ route('about') }}" class="about-one__btn thm-btn">About Us</a>
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
    <div class="crystal-grid-bg" aria-hidden="true"></div>
    <div class="crystal-corner crystal-corner--tl" aria-hidden="true"></div>
    <div class="crystal-corner crystal-corner--br" aria-hidden="true"></div>
    <div class="video-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
        style="background-image: url({{ setting_image('home_video.video_background_image', 'orionFrontAssets/assets/images/resources/Screenshot2024-09-04121353.png') }})">
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
                    @php
                        $videoUrlSetting = setting('home_video.video_url', 'https://www.youtube.com/watch?v=3VSpvjEEdIQ');
                        $videoPopupUrl = $videoUrlSetting . (str_contains($videoUrlSetting, '?') ? '&' : '?') . 'autoplay=1&mute=1';
                    @endphp
                    <div class="video-one__video-link">
                        <a href="{{ $videoPopupUrl }}" class="video-popup">
                            <div class="video-one__video-icon">
                                <span class="fa fa-play" style="font-size:24px;position: absolute;top: 50%;left: 50%;transform: translate(-50% , -50%);"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>
                    </div>
                    <div class="video-one__shape">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/shapes/team-two-shape-3.png') }}" alt="" class="lazy">
                    </div>
                    <h2 class="video-one__video-title">{!! nl2br(e(setting('home_video.video_title', "Best Of The Best Managers\nOnly To Make Your Dreams Come True"))) !!}</h2>
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
            <span class="section-title__tagline">{{ setting('home_sectors.tagline', 'Our Sectors') }}</span>
            <h2 class="section-title__title">{!! nl2br(e(setting('home_sectors.title', "Sectors We\nServe"))) !!}</h2>
        </div>
        <div class="row">
            <div class="thm-swiper__slider swiper-container sectors-slider" data-swiper-options='{"spaceBetween": 100,"slidesPerView": 3,"speed": 500, "autoplay": { "delay": 3000 },"loop":true, "pagination": {"el": ".swiper-pagination", "clickable": true}, "navigation": {"nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev"}, "breakpoints": {
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
                                "slidesPerView": 3
                            }
                        }}'>
                <div class="swiper-wrapper">
                    <!--Categories One Single Start-->
                    @foreach ($sectors as $sector)
                    <div class="swiper-slide">
                        <div class="categories-one__single categories-one__single-{{ $loop->index + 1 }}">
                            <div class="categories-one__img-box">
                                <div class="categories-one__img">
                                    <img data-src="{{ $sector->hasMedia('sectors') ? $sector->getFirstMediaUrl('sectors') : asset('orionFrontAssets/assets/images/sectors/' . $sector->photo) }}"
                                        alt="" class="lazy">
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
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

</section>
<!--Cta One Start-->
<section class="cta-one">
    <div class="crystal-grid-bg" aria-hidden="true"></div>
    <div class="crystal-corner crystal-corner--tl" aria-hidden="true"></div>
    <div class="crystal-corner crystal-corner--br" aria-hidden="true"></div>
    <div class="cta-one__bg-img"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/OIU9I511-01-rotat-Copy.png') }});">
    </div>
    <div class="container">
        <div class="cta-one__inner">
            <div class="cta-one__img-1">
                <img data-src="{{ asset('orionFrontAssets/assets/images/resources/Screenshot 2024-09-04 103337.png') }}"
                    alt="" class="lazy">
            </div>
            <div class="cta-one__left">
                <div class="cta-one__title-box">
                    <span class="cta-one__tagline">Need Orion Help?</span>
                    <h2 class="cta-one__title">{{ setting('contact_title', "We're leader in Contracting of Constructions market") }}</h2>
                    @if (setting('contact_description'))
                        <p class="cta-one__text">{{ setting('contact_description') }}</p>
                    @endif
                </div>
            </div>
            <div class="cta-one__right">
                <div class="cta-one__btn-box">
                    <a href="{{ route('contact') }}" class="cta-one__btn thm-btn">
                        Contact Us
                        <span class="thm-btn__arrow"><svg width="12" height="9" viewBox="0 0 14 10" fill="none"><path d="M1 5h11.5M8 1l4.5 4L8 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                    </a>
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
        <img data-src="{{ asset('orionFrontAssets/assets/images/shapes/testimonial-two-shape-1.png') }}" alt="" class="lazy">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial-two__center">
                    <div class="section-title text-center">
                        <span class="section-title__tagline">{{ setting('home_clients.tagline', 'Our Clients') }}</span>
                        <h2 class="section-title__title">{{ setting('home_clients.title', 'Building Success Together') }}</h2>
                    </div>
                    <p class="testimonial-two__text-1 text-center">"{{ setting('home_clients.intro_text', "At the heart of our success are the strong partnerships we've built with our clients. We believe in a collaborative approach, working hand-in-hand to achieve shared goals. Our clients are more than just business partners; they are integral to our journey, inspiring us to innovate and excel. Together, we build a foundation of trust, mutual respect, and lasting success.") }}"</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5">

        <div class="col-12">
            <div class="row">
                @foreach ($clients as $client )
                    <div class="col clinet-logo-item">
                        <img data-src="{{ $client->hasMedia('clients') ? $client->getFirstMediaUrl('clients') : asset('orionFrontAssets/assets/images/clinets/' . $client->logo) }}" alt="{{ $client->name . ' company image' }}" srcset="" class="lazy">
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


            @forelse ($galleryImages as $galleryImage)
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        @if ($galleryImage->hasMedia('image'))
                        <img data-src="{{ $galleryImage->getFirstMediaUrl('image') }}" alt="{{ $galleryImage->caption }}" class="lazy">
                        @endif
                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            @empty
            @foreach (['Picture1.jpg', 'Picture10.png', 'Picture12.png', 'Picture212.jpg', 'Picture3.jpg', 'Picture32.jpg', 'Picture6.jpg', 'Picture8.png', 'Picture5.jpg'] as $staticImage)
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/project/' . $staticImage) }}" alt="" class="lazy">
                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            @endforeach
            @endforelse
        </div>
    </div>
</section>
<!--Gallery Three End-->

@endsection
