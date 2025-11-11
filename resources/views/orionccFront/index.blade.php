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
<style>
    #particles-js {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 1;
}
    /* Add CSS custom property for slider height */
    :root {
        --slider-height: 100vh;
    }

    @media screen and (max-width: 900px) {
        :root {
            --slider-height: 70vh;
        }
    }

    @media screen and (max-width: 400px) {
        :root {
            --slider-height: 50vh;
        }
    }

    /* Add preload styles to improve above-the-fold loading */
    .lazy-load {
        opacity: 0;
        transition: opacity 0.3s;
    }
    .lazy-load.loaded {
        opacity: 1;
    }
    /* Critical CSS for improved above-the-fold rendering */
    .main-slider {
        position: relative;
        overflow: hidden;
        min-height: 100vh; /* Full viewport height */
    }
    #background-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh; /* Full viewport height */
        object-fit: cover;
        z-index: 0;
    }

    /* Ensure video works on mobile */
    @media (max-width: 767px) {
        #background-video {
            height: 70vh; /* 70% viewport height on mobile */
            min-height: 70%;
            width: 100%;
            z-index: 0;
        }
        .main-slider {
            min-height: 70vh; /* 70% viewport height on mobile */
        }
    }

    /* Override the global style that hides videos on mobile */
    @media screen and (max-width: 900px) {
        #background-video {
            display: block !important;
            z-index: 0;
            height: 70vh; /* 70% viewport height */
        }
        .swiper-container,
        .main-slider__content {
            position: relative;
            z-index: 5;
        }
    }

    /* Center content in full-height video section */
    .main-slider .container {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 5;
    }

    /* Adjust main slider container height on mobile */
    @media screen and (max-width: 900px) {
        .main-slider .container {
            height: 70vh;
        }
        .main-slider {
            min-height: 70vh;
            height: 70vh;
        }
    }

    /* Fix z-index issues for slider content */
    .main-slider__content {
        position: relative;
        z-index: 2;
    }

    .swiper-container {
        position: relative;
        z-index: 2;
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



{{-- @section('pageLoader')
<div class="preloader">
    <div class="preloader__image"></div>
</div>
@endsection --}}
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

        // Create the video element with proper loading strategy
        const videoContainer = document.getElementById('hero-slider-sect');
        if (videoContainer) {
            // Check if browser supports HTML5 video
            if (!!document.createElement('video').canPlayType) {
                const video = document.createElement('video');

                // Set video attributes
                video.setAttribute('muted', 'muted');
                video.setAttribute('loop', 'loop');
                video.setAttribute('autoplay', 'autoplay');
                video.setAttribute('playsinline', 'playsinline');
                video.setAttribute('id', 'background-video');
                video.setAttribute('poster', '{{ asset('orionFrontAssets/assets/video/video-screen.png') }}');
                video.muted = true;
                video.defaultMuted = true;
                video.playsInline = true;
                video.autoplay = true;
                video.loop = true;
                // Force video to be visible on mobile and full height
                video.style.display = 'block';
                video.style.zIndex = '0';

                // Set responsive height based on screen width
                if (window.innerWidth <= 400) {
                    video.style.height = '50vh';
                    videoContainer.style.height = '50vh';
                    videoContainer.style.minHeight = '50vh';
                    document.getElementById('video-overlay').style.height = '50vh';
                    video.style.objectFit = 'fill';
                } else if (window.innerWidth <= 900) {
                    video.style.height = '70vh';
                    videoContainer.style.height = '70vh';
                    videoContainer.style.minHeight = '70vh';
                    document.getElementById('video-overlay').style.height = '70vh';
                    video.style.objectFit = 'fill';
                } else {
                    video.style.height = '100vh';
                    videoContainer.style.height = '100vh';
                    videoContainer.style.minHeight = '100vh';
                    document.getElementById('video-overlay').style.height = '100vh';
                    video.style.objectFit = 'cover';
                }

                video.style.width = '100%';
                video.preload = 'auto';

                // Add resize listener to adjust video height on window resize
                window.addEventListener('resize', function() {
                    if (window.innerWidth <= 400) {
                        video.style.height = '50vh';
                        videoContainer.style.height = '50vh';
                        videoContainer.style.minHeight = '50vh';
                        document.getElementById('video-overlay').style.height = '50vh';
                        video.style.objectFit = 'fill';
                    } else if (window.innerWidth <= 900) {
                        video.style.height = '70vh';
                        videoContainer.style.height = '70vh';
                        videoContainer.style.minHeight = '70vh';
                        document.getElementById('video-overlay').style.height = '70vh';
                        video.style.objectFit = 'fill';
                    } else {
                        video.style.height = '100vh';
                        videoContainer.style.height = '100vh';
                        videoContainer.style.minHeight = '100vh';
                        document.getElementById('video-overlay').style.height = '100vh';
                        video.style.objectFit = 'cover';
                    }
                });

                // Create the source element
                const source = document.createElement('source');
                source.src = '{{ asset('orionFrontAssets/assets/video/11188(9).mp4') }}';
                source.type = "video/mp4";

                // Append the source to the video
                video.appendChild(source);

                // Append the video to the container
                videoContainer.prepend(video);

                const isMobileDevice = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
                let autoplaySucceeded = false;
                let interactionFallbackArmed = false;
                let autoplayBlocked = false;
                let retryTimer = null;
                let mobilePlayButton;

                const ensureMobilePlayButton = () => {
                    if (!isMobileDevice || mobilePlayButton) {
                        return;
                    }
                    mobilePlayButton = document.createElement('div');
                    mobilePlayButton.style.cssText = 'position:absolute; z-index:10; top:50%; left:50%; height:75px; width:75px; transform:translate(-50%,-50%); background:rgba(0,0,0,0.55); color:white; border-radius:50%; cursor:pointer; display:flex; align-items:center; justify-content:center; box-shadow:0 12px 24px rgba(0,0,0,0.4);';
                    mobilePlayButton.innerHTML = '<i class="fa fa-play" style="font-size:26px;"></i>';
                    mobilePlayButton.addEventListener('click', function() {
                        video.play().then(() => {
                            autoplaySucceeded = true;
                            this.style.display = 'none';
                        }).catch(e => console.log('Still could not play from button:', e));
                    }, { once: true });
                    videoContainer.appendChild(mobilePlayButton);
                };

                const enableInteractionFallback = () => {
                    if (interactionFallbackArmed) {
                        return;
                    }
                    interactionFallbackArmed = true;

                    const playVideoOnInteraction = function() {
                        video.play().then(() => {
                            autoplaySucceeded = true;
                            if (mobilePlayButton) {
                                mobilePlayButton.style.display = 'none';
                            }
                        }).catch(e => console.log('Still could not play after interaction:', e));
                        document.removeEventListener('touchstart', playVideoOnInteraction);
                        document.removeEventListener('click', playVideoOnInteraction);
                    };

                    document.addEventListener('touchstart', playVideoOnInteraction, { once: true });
                    document.addEventListener('click', playVideoOnInteraction, { once: true });
                    ensureMobilePlayButton();
                };

                const attemptAutoplay = (reason, allowRetry = true) => {
                    if (autoplaySucceeded || autoplayBlocked) {
                        return;
                    }
                    if (retryTimer) {
                        clearTimeout(retryTimer);
                        retryTimer = null;
                    }
                    console.log(`Attempting video autoplay (${reason})`);

                    const playPromise = video.play();
                    if (playPromise !== undefined) {
                        playPromise.then(() => {
                            autoplaySucceeded = true;
                            console.log(`Video autoplay successful (${reason})`);
                            if (mobilePlayButton) {
                                mobilePlayButton.style.display = 'none';
                            }
                        }).catch(error => {
                            console.log(`Autoplay attempt failed (${reason})`, error);
                            if (error && (error.name === 'NotAllowedError' || error.name === 'PermissionDeniedError')) {
                                autoplayBlocked = true;
                                enableInteractionFallback();
                            } else if (allowRetry) {
                                retryTimer = setTimeout(() => attemptAutoplay('retry-after-error'), 600);
                            }
                        });
                    } else {
                        autoplaySucceeded = true;
                        console.log(`Video autoplay succeeded synchronously (${reason})`);
                    }
                };

                const isFullyBuffered = () => {
                    try {
                        if (!video.duration || !video.buffered.length) {
                            return false;
                        }
                        const bufferedEnd = video.buffered.end(video.buffered.length - 1);
                        return bufferedEnd >= (video.duration - 0.1);
                    } catch (error) {
                        return false;
                    }
                };

                const maybeAutoplayWhenBuffered = (reason) => {
                    if (autoplaySucceeded || autoplayBlocked) {
                        return;
                    }
                    if (isFullyBuffered() || video.readyState >= HTMLMediaElement.HAVE_ENOUGH_DATA) {
                        attemptAutoplay(reason, false);
                    }
                };

                const waitForCompleteDownload = () => {
                    if (autoplaySucceeded || autoplayBlocked) {
                        return;
                    }
                    if (isFullyBuffered()) {
                        attemptAutoplay('fully-buffered', false);
                        return;
                    }
                    setTimeout(waitForCompleteDownload, 400);
                };

                video.addEventListener('canplaythrough', () => {
                    console.log('Video can play through; verifying buffer before autoplay');
                    attemptAutoplay('canplaythrough');
                });

                video.addEventListener('progress', () => {
                    maybeAutoplayWhenBuffered('buffered');
                });

                video.addEventListener('loadeddata', () => {
                    maybeAutoplayWhenBuffered('loadeddata');
                    waitForCompleteDownload();
                });

                video.addEventListener('loadedmetadata', () => {
                    console.log('Video metadata loaded; ensuring download is forced');
                    video.setAttribute('preload', 'auto');
                    video.preload = 'auto';
                    video.load();
                    waitForCompleteDownload();
                }, { once: true });

                // Safety fallback in case the browser never fires canplaythrough
                setTimeout(() => {
                    if (!autoplaySucceeded && !autoplayBlocked) {
                        attemptAutoplay('timeout');
                    }
                }, 8000);

                // Add error handling
                video.addEventListener('error', function() {
                    console.log("Video playback error, falling back to background image");
                    setFallbackBackground();
                });
            } else {
                // Browser doesn't support HTML5 video
                console.log("Browser doesn't support HTML5 video, using fallback");
                setFallbackBackground();
            }

            // Fallback function
            function setFallbackBackground() {
                videoContainer.style.backgroundImage = "url('{{ asset('orionFrontAssets/assets/video/video-screen.png') }}')";
                videoContainer.style.backgroundSize = "cover";
                videoContainer.style.backgroundPosition = "center center";
            }
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

    // Defer loading of particles.js until after critical content
    function loadParticles() {
        const script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js';
        script.onload = function() {
            particlesJS("particles-js", {
                "particles": {
                    "number": { "value": 60, "density": { "enable": true, "value_area": 800 } },
                    "color": { "value": "#aef490" },
                    "shape": { "type": "star", "stroke": { "width": 0, "color": "#000000" }, "polygon": { "nb_sides": 5 } },
                    "opacity": { "value": 0.5, "random": false, "anim": { "enable": false, "speed": 1, "opacity_min": 0.1, "sync": false } },
                    "size": { "value": 3, "random": true, "anim": { "enable": false, "speed": 40, "size_min": 0.1, "sync": false } },
                    "line_linked": { "enable": true, "distance": 150, "color": "#fff", "opacity": 0.4, "width": 1 },
                    "move": { "enable": true, "speed": 6, "direction": "none", "random": true, "straight": false, "out_mode": "bounce", "bounce": false, "attract": { "enable": true, "rotateX": 600, "rotateY": 1200 } }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": { "enable": true, "mode": "grab" },
                        "onclick": { "enable": true, "mode": "push" },
                        "resize": true
                    },
                    "modes": {
                        "grab": { "distance": 400, "line_linked": { "opacity": 1 } },
                        "push": { "particles_nb": 4 }
                    }
                },
                "retina_detect": true
            });
        };
        document.body.appendChild(script);
    }

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
                loadParticles();
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

<!--Main Slider Start-->
<section class="main-slider clearfix" id="hero-slider-sect" style="position: relative; height: var(--slider-height, 100vh); min-height: var(--slider-height, 100vh);">
    <!-- Video is added via JS -->
    <div id="video-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: var(--slider-height, 100vh); background-color: rgba(0,0,0,0.3); z-index: 1;"></div>
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
                            <h2 class="section-title__title">Our Projects</h2>
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
                                            <img loading="lazy" data-src="{{ asset('orionFrontAssets/assets/images/project/' . $project->slug_name . '/' . $project->main_image) }}"
                                                alt="{{ $project->name }}" class="lazy">
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
                    <!-- First slide -->
                    <div class="col-xl-6 col-lg-6 swiper-slide" data-wow-delay="100ms">
                        <div class="banner-one__right wow" data-wow-delay="100ms" data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;">
                            <div class="banner-one__inner ">
                                <div class="banner-one__img-2">
                                    <img data-src="{{ asset('orionFrontAssets/assets/images/certificate/صورة3.png') }}"
                                        alt="" class="lazy">
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
                                <h3 class="banner-one__title">ISO 45001:2018
                                    <br> WRG
                                </h3>
                                <div class="banner-one__btn-box">
                                    <p class="banner-one__tagline">Health & Safety <br> Management system</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Second slide -->
                    <div class="col-xl-6 col-lg-6 swiper-slide" data-wow-delay="100ms">
                        <div class="banner-one__right wow" data-wow-delay="100ms" data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;">
                            <div class="banner-one__inner banner-one__inner-2">
                                <div class="banner-one__img-2">
                                    <img data-src="{{ asset('orionFrontAssets/assets/images/certificate/صورة2.jpg') }}"
                                        alt="" class="lazy">
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
                                <h3 class="banner-one__title">Suadi Arabia
                                    <br> Branch Certificate
                                </h3>
                                <div class="banner-one__btn-box">
                                    <p class="banner-one__tagline">We offer professionalism <br>and workmanship</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Third slide -->
                    <div class="col-xl-6 col-lg-6 swiper-slide" data-wow-delay="100ms">
                        <div class="banner-one__right wow" data-wow-delay="100ms" data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;">
                            <div class="banner-one__inner">
                                <div class="banner-one__img-2">
                                    <img data-src="{{ asset('orionFrontAssets/assets/images/certificate/صورة4.png') }}"
                                        alt="" class="lazy">
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
                                <h3 class="banner-one__title">ISO 14001:2015
                                    <br> WRG
                                </h3>
                                <div class="banner-one__btn-box">
                                    <p class="banner-one__tagline">Environment <br> management</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fourth slide -->
                    <div class="col-xl-6 col-lg-6 swiper-slide" data-wow-delay="100ms">
                        <div class="banner-one__left wow" data-wow-delay="100ms" data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInLeft;">
                            <div class="banner-one__inner banner-one__inner-2">
                                <div class="banner-one__img-2">
                                    <img data-src="{{ asset('orionFrontAssets/assets/images/certificate/صورة1.png') }}"
                                        alt="" class="lazy">
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
                                <h3 class="banner-one__title">Commercial
                                    <br> Licence
                                </h3>
                                <div class="banner-one__btn-box">
                                    <p class="banner-one__tagline">We offer professionalism <br>and workmanship</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fifth slide -->
                    <div class="col-xl-6 col-lg-6 swiper-slide" data-wow-delay="100ms">
                        <div class="banner-one__right wow" data-wow-delay="100ms" data-wow-duration="2500ms"
                            style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;">
                            <div class="banner-one__inner ">
                                <div class="banner-one__img-2">
                                    <img data-src="{{ asset('orionFrontAssets/assets/images/certificate/صورة5.png') }}"
                                        alt="" class="lazy">
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
                        <span class="section-title__tagline">You Dream We Build</span>
                        <h2 class="section-title__title">Orion Founders Message</h2>
                    </div>

                    <p class="about-one__text-1">Founded in 2008 by a team of young, Experts engineers, our
                        company has grown by leveraging extensive knowledge in industrial and commercial
                        construction within the region.</p>
                    <p class="about-one__text-2">We have built our reputation on the foundation of innovative
                        technologies and methods, combined with creative concepts, designs, and meticulous
                        project execution.</p>
                    <div class="about-one__bottom">
                        <div class="about-one__bottom-icon">
                            <img data-src="{{ asset('orionFrontAssets/assets/images/icon/014-labor.png') }}" alt="" class="lazy">
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
                                <span class="fa fa-play" style="font-size:24px;position: absolute;top: 50%;left: 50%;transform: translate(-50% , -50%);"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>
                    </div>
                    <div class="video-one__shape">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/shapes/team-two-shape-3.png') }}" alt="" class="lazy">
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
                                    <img data-src="{{ asset('orionFrontAssets/assets/images/sectors/' . $sector->photo) }}"
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
                    <h2 class="cta-one__title">We're leader in Contracting of Constructions market</h2>
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
        <img data-src="{{ asset('orionFrontAssets/assets/images/shapes/testimonial-two-shape-1.png') }}" alt="" class="lazy">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial-two__center">
                    <div class="section-title text-center">
                        <span class="section-title__tagline">Our Clients</span>
                        <h2 class="section-title__title">Building Success Together</h2>
                    </div>
                    <p class="testimonial-two__text-1 text-center">"At the heart of our success are the strong
                        partnerships
                        we've built with our clients. We believe in a collaborative approach, working
                        hand-in-hand to achieve shared goals. Our clients are more than just business partners;
                        they are integral to our journey, inspiring us to innovate and excel. Together, we build
                        a foundation of trust, mutual respect, and lasting success."</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5">

        <div class="col-12">
            <div class="row">
                @foreach ($clients as $client )
                    <div class="col clinet-logo-item">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/clinets/' . $client->logo) }}" alt="{{ $client->name . ' company image' }}" srcset="" class="lazy">
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
                            <img data-src="{{ asset('orionFrontAssets/assets/images/project/Picture1.jpg') }}" alt="" class="lazy">
                        </a>
                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/project/Picture10.png') }}" alt="" class="lazy">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/project/Picture12.png') }}" alt="" class="lazy">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/project/Picture212.jpg') }}" alt="" class="lazy">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/project/Picture3.jpg') }}" alt="" class="lazy">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/project/Picture32.jpg') }}" alt="" class="lazy">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/project/Picture6.jpg') }}" alt="" class="lazy">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/project/Picture8.png') }}" alt="" class="lazy">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
            <!--Gallery Three Single Start-->
            <div class="item">
                <div class="gallery-three__single">
                    <div class="gallery-three__img">
                        <img data-src="{{ asset('orionFrontAssets/assets/images/project/Picture5.jpg') }}" alt="" class="lazy">

                    </div>
                </div>
            </div>
            <!--Gallery Three Single End-->
        </div>
    </div>
</section>
<!--Gallery Three End-->

@endsection
