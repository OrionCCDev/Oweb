@extends('layouts.front.app')
@php
$p_nam = 'projects';
@endphp
@section('page_name' , 'Orion Projects')
{{-- @section('pageLoader')
<div class="preloader">
    <div class="preloader__image"></div>
</div>
<!-- /.preloader -->
@endsection --}}
@section('css_style_links')
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/animate/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/animate/custom-animate.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/fontawesome/css/all.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/ogenix-icons/style.css') }}" />
<link rel="stylesheet"
    href="{{ asset('orionFrontAssets/assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/timepicker/timePicker.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/nice-select/nice-select.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/css/style.css') }}" />
@endsection


@section('page_content')
<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/backgrounds/projects-top.png') }})">
    </div>
    <div class="page-header__ripped-paper"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/page-header-ripped-paper.png') }});">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span>/</span></li>
                <li>All Projects</li>
            </ul>
            <h2>Projects</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Product List Start-->
<section class="product-list">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-list__right">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="product__showing-result">
                                {{-- <div class="shop-search product__sidebar-single">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                    </form>
                                </div> --}}
                                <div class="product__menu-showing-sort">
                                    <div class="product__menu">
                                        <a href="{{ route('projects.index', ['page' => $page]) }}"
                                            class="product__menu-icon-one"><span class="icon-menu"></span></a>
                                        <a href="{{ route('indexOfList', ['page' => $page]) }}"
                                            class="product__menu-icon-two active"><span class="icon-list"></span></a>
                                    </div>
                                    {{-- <div class="product__showing-sort">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="Sort by popular">Sort by Newest</option>
                                                <option value="1">Sort by Older</option>
                                                <option value="2">Sort by Category 1</option>
                                                <option value="3">Sort by Category 2</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($allData as $data )
                    <div class="product-list__inner">
                        <!--Products List Single Start-->
                        <div class="product-list__single">
                            <a href="{{ route('projects.show' , ['project'=>$data['id']]) }}">
                                <div class="product-list__single-inner">
                                    <div class="product-list__img-box">
                                        <div class="product-list__img">
                                            <img data-src="{{ asset('orionFrontAssets/assets/images/project/'.$data->slug_name.'/'.$data->main_image) }}"
                                                alt="{{ $data->name }}" class="lazy" loading="lazy">
                                        </div>

                                    </div>
                                    <div class="product-list__content">
                                        <h4 class="product-list__title"><a
                                                href="{{ route('projects.show' , ['project'=>$data['id']]) }}">{{
                                                $data->name }}</a>
                                        </h4>
                                        {{-- <p class="product-list__price">{{ $data->Client->name }}</p> --}}
                                        <p class="product-list__text">{{ $data->full_desc }}</p>
                                        <div class="product-list__btn-box">
                                            <a href="{{ route('projects.show' , ['project'=>$data['id']]) }}"
                                                class="thm-btn product-list__btn">More</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--Products List Single End-->

                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-xl-12">
                            {{ $allData->appends(['page' => $page])->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
            "{{ asset('orionFrontAssets/assets/vendors/jquery-ui/jquery-ui.js') }}",
            "{{ asset('orionFrontAssets/assets/vendors/timepicker/timePicker.js') }}",
            "{{ asset('orionFrontAssets/assets/vendors/nice-select/jquery.nice-select.min.js') }}",
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
