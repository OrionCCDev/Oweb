@extends('layouts.front.app')
@php
$p_nam = 'news';
$eventImage = $event->hasMedia('events') ? $event->getFirstMediaUrl('events') : asset('orionFrontAssets/assets/images/blog/' . $event->main_image);
$eventDescription = $event->mini_description ?: strip_tags($event->description);
$eventDate = \Carbon\Carbon::parse($event->created_at)->format('F j, Y');
@endphp
@section('page_name' , $event->title )

{{-- SEO Meta Tags --}}
@section('meta_description', $eventDescription)
@section('meta_keywords', "{{ $event->title }}, Orion Contracting news, construction news UAE, events, {{ $eventDate }}")
@section('canonical_url', route('news.show', $event->id))

{{-- Open Graph Tags --}}
@section('og_type', 'article')
@section('og_title', "{{ $event->title }} | Orion Contracting Company News")
@section('og_description', $eventDescription)
@section('og_image', $eventImage)
@section('og_url', route('news.show', $event->id))

{{-- Twitter Card Tags --}}
@section('twitter_title', "{{ $event->title }} | Orion Contracting Company News")
@section('twitter_description', $eventDescription)
@section('twitter_image', $eventImage)

@section('meta_tags')
<!-- Breadcrumb Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ url('/') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "News & Events",
      "item": "{{ route('news.index') }}"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ $event->title }}",
      "item": "{{ route('news.show', $event->id) }}"
    }
  ]
}
</script>

<!-- Article Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NewsArticle",
  "headline": "{{ $event->title }}",
  "description": "{{ $eventDescription }}",
  "image": "{{ $eventImage }}",
  "datePublished": "{{ $event->created_at->toIso8601String() }}",
  "dateModified": "{{ $event->updated_at->toIso8601String() }}",
  "author": {
    "@type": "Organization",
    "name": "Orion Contracting Company",
    "url": "{{ url('/') }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Orion Contracting Company",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ site_logo_url('web', 'orionFrontAssets/assets/images/resources/logo-blue.webp') }}"
    }
  }
}
</script>
@endsection

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

<!-- template js (main.js also opens the photo gallery in Magnific Popup) -->
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
                        <img src="{{ $eventImage }}" alt="{{ $event->title }}" loading="lazy">
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
                                    <img src="{{ $eventt->hasMedia('events') ? $eventt->getFirstMediaUrl('events') : asset('orionFrontAssets/assets/images/blog/' . $eventt->main_image) }}"
                                        alt="{{ $eventt->title }}" loading="lazy">
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
{{-- Photo gallery: small thumbnails in the grid, full-size image in a
     Magnific Popup lightbox (main.js wires up every .img-popup link, and
     data-group keeps them in one swipeable set). Hidden when empty. --}}
@php $galleryMedia = $event->getMedia('gallery'); @endphp
@if ($galleryMedia->isNotEmpty())
<section class="news-gallery">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Gallery</span>
            <h2 class="section-title__title">Event Photos</h2>
        </div>
        <div class="row news-gallery__grid">
            @foreach ($galleryMedia as $photo)
                <div class="col-xl-3 col-lg-4 col-md-4 col-6">
                    <a href="{{ $photo->getUrl() }}" class="img-popup news-gallery__item" data-group="1"
                        aria-label="Open photo {{ $loop->iteration }} of {{ $galleryMedia->count() }}">
                        <img src="{{ $photo->hasGeneratedConversion('thumb') ? $photo->getUrl('thumb') : $photo->getUrl() }}"
                            alt="{{ $event->title }} — photo {{ $loop->iteration }}" loading="lazy">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!--Video One Start-->
<section class="video-one">
    <div class="video-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
        style="background-image: url({{ $eventImage }})">
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
