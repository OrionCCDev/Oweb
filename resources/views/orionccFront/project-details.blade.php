@extends('layouts.front.app')
@php
$p_nam = 'projects';

// Backward-compatible image resolver for the main/gallery images.
// Ensures old flat structure `project/{slug}/` and new `project/{slug}/gallery/` both work.
if (!isset($resolveProjectImage)) {
    $resolveProjectImage = function (string $path) use ($project) {
        $candidates = [];
        $candidates[] = $path;
        if ($path !== '' && !str_contains($path, '/')) {
            $candidates[] = $project->slug_name . '/' . $path;
        }
        $candidates[] = str_replace($project->slug_name . '/gallery/', $project->slug_name . '/', $path);
        $candidates = array_values(array_unique(array_filter($candidates)));
        // Images here can be overwritten in place (main.{ext}), so stamp them
        // with the project's last update to keep browser caches honest.
        $version = $project->updated_at ? '?v=' . $project->updated_at->timestamp : '';
        foreach ($candidates as $candidate) {
            if (Storage::disk('projects')->exists($candidate)) {
                return Storage::disk('projects')->url($candidate) . $version;
            }
        }
        return asset('orionFrontAssets/assets/images/project/' . $project->slug_name . '/' . basename($path)) . $version;
    };
}

$projectImage = $project->hasMedia('flipster') ? $project->getFirstMediaUrl('flipster') : $resolveProjectImage($project->main_image ?: $project->gif ?: '');
$sectorName = $project->Sector?->name ?: 'Construction';
$projectDescription = $project->mini_desc ?: "Explore {$project->name} - a {$sectorName} project by Orion Contracting Company, delivering expertise in commercial and industrial construction across the UAE and Saudi Arabia.";
@endphp
@section('page_name' , $project->name )

{{-- SEO Meta Tags --}}
@section('meta_description', $projectDescription)
@section('meta_keywords', "{{ $project->name }}, {{ $sectorName }}, construction project UAE, {{ $project->Client?->name }}, Orion Contracting, MEP project, construction company")
@section('canonical_url', route('projects.show', $project->id))

{{-- Open Graph Tags --}}
@section('og_type', 'article')
@section('og_title', "{$project->name} - {$sectorName} Project | Orion Contracting")
@section('og_description', $projectDescription)
@section('og_image', $projectImage)
@section('og_url', route('projects.show', $project->id))

{{-- Twitter Card Tags --}}
@section('twitter_title', "{$project->name} - {$sectorName} Project | Orion Contracting")
@section('twitter_description', $projectDescription)
@section('twitter_image', $projectImage)

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
      "name": "Projects",
      "item": "{{ route('projects.index') }}"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ $project->name }}",
      "item": "{{ route('projects.show', $project->id) }}"
    }
  ]
}
</script>

<!-- Project Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Project",
  "name": "{{ $project->name }}",
  "description": "{{ $projectDescription }}",
  "image": "{{ $projectImage }}",
  "startDate": "{{ $project->start }}",
  "endDate": "{{ $project->end }}",
  "contractor": {
    "@type": "Organization",
    "name": "Orion Contracting Company",
    "url": "{{ url('/') }}"
  },
  "category": "{{ $sectorName }}"
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
<style>
    /* Custom Video Popup Styles */
    .video-modal iframe {
        width: 100%;
        height: 80vh;
        border: none;
    }

</style>
<!-- template styles -->
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
<!-- template js -->
{{-- <script src="{{ asset('orionFrontAssets/assets/js/flip/jquery.flipster.min.js') }}"></script> --}}
<!-- template js -->


<script src="{{ asset_v('orionFrontAssets/assets/js/main.js') }}" defer></script>
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
            <h2 class="fnt-clr-g">{{ $project->name }}</h2>
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
                        <h2 class="section-title__title">{{ $project->name }}</h2>
                        @if ($project->sub_name)
                            <h5>{{ $project->sub_name }}</h5>
                        @endif
                        @if ($project->Client)
                            <p class="section-title__tagline" style="margin-top: 6px;">{{ $project->Client->name }}</p>
                        @endif
                    </div>
                    <div class="portfolio-details__img video-one video-one__video-link" style="position: relative">
                        @php
                            $mainName = $project->main_image ?: $project->gif;
                            $mainUrl = $resolveProjectImage($mainName ?? '');
                        @endphp
                        <img src="{{ $mainUrl }}"
                            alt="{{ $project->name }} - Main Project Image">
                        @if ($project->video)
                        <a href="#" style="position: absolute;top:50%;left:50%;transform:translate(-50% , -50%)" class="video-popup-trigger" data-bs-toggle="modal" data-bs-target="#videoModal">
                            <div class="video-one__video-icon">
                                <span class="fa fa-play"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>
                        @endif
                    </div>

                    @if ($project->video)
                    <script src="https://www.youtube.com/iframe_api"></script>

                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-body video-modal">
                                    <iframe id="youtubePlayer"
                                        src="{{ $videoUrl }}?autoplay=1&mute=1&enablejsapi=1&rel=0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="portfolio-details__bottom">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="portfolio-details__left">
                        <h3 class="portfolio-details__title">About our project</h3>
                        @if ($project->mini_desc)
                            <p class="portfolio-details__text-1">{{ $project->mini_desc }}</p>
                        @endif
                        @if ($project->full_desc)
                            <p class="portfolio-details__text-2">{{ $project->full_desc }}</p>
                        @endif
                        <ul class="portfolio-details__points-box list-unstyled">
                            @foreach ($project->points as $point)
                            <li>
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p>{{ $point->point }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="portfolio-details__right">
                        <ul class="list-unstyled portfolio-details__details-list">
                            @foreach ($project->details as $detail)
                            <li>
                                <p class="portfolio-details__client">{{ $detail->label }}:</p>
                                <h4 class="portfolio-details__name">{{ $detail->value }}</h4>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    @if ($project->gallaries->isNotEmpty())
    <section class="testimonial-two" style="padding: 50px 0 50px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="testimonial-two__left mt-5">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Our Project Gallery</span>
                            <h2 class="section-title__title">It's Good To Share Our Work With You</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                        <div class="carousel-indicators">
                            @foreach ($project->gallaries as $index => $gallery)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($project->gallaries as $gallery)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ $resolveProjectImage($gallery->image ?? '') }}" class="d-block w-100" loading="lazy" alt="{{ $project->name }} - Gallery Image {{ $loop->iteration }}">
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
    @endif

    @if ($project->video)
    <script>
        var ytPlayer;

        function onYouTubeIframeAPIReady() {
            ytPlayer = new YT.Player('youtubePlayer', {});
        }

        document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById('videoModal');
            if (!modal) return;

            modal.addEventListener('hide.bs.modal', function () {
                if (ytPlayer && typeof ytPlayer.pauseVideo === 'function') {
                    ytPlayer.pauseVideo();
                }
            });

            modal.addEventListener('hidden.bs.modal', function () {
                if (ytPlayer && typeof ytPlayer.stopVideo === 'function') {
                    ytPlayer.stopVideo();
                }
            });
        });
    </script>
    @endif
</div>


@if ($sug_proj->isNotEmpty())
<!--Related Projects Start-->
<section class="gallery-one gallery-two">
    <div class="section-title text-center">
        <span class="section-title__tagline">Checkout</span>
        <h2 class="section-title__title">Related Projects
            <br> For You
        </h2>
    </div>
    <div class="container">
        <div class="thm-swiper__slider swiper-container related-projects-slider" data-swiper-options='{"spaceBetween": 30,"slidesPerView": 3,"speed": 500, "autoplay": { "delay": 3500 },"loop": false, "pagination": {"el": ".swiper-pagination", "clickable": true}, "navigation": {"nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev"}, "breakpoints": {
            "0": { "spaceBetween": 20, "slidesPerView": 1 },
            "575": { "spaceBetween": 20, "slidesPerView": 1 },
            "767": { "spaceBetween": 24, "slidesPerView": 2 },
            "1199": { "spaceBetween": 30, "slidesPerView": 3 }
        }}'>
            <div class="swiper-wrapper">
                @foreach ($sug_proj as $index => $pro)
                <div class="swiper-slide">
                    @include('orionccFront.partials.project-card', ['project' => $pro, 'index' => $index])
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>
<!--Related Projects End-->
<script>
document.addEventListener('DOMContentLoaded', function () {
    function initRelatedSlider() {
        if (typeof Swiper === 'undefined') {
            return setTimeout(initRelatedSlider, 100);
        }
        var el = document.querySelector('.related-projects-slider');
        if (!el) return;
        var options = el.dataset.swiperOptions ? JSON.parse(el.dataset.swiperOptions.replace(/'/g, '"')) : {};
        new Swiper('.related-projects-slider', options);
    }
    initRelatedSlider();
});
</script>
@endif
@endsection
