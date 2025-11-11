@extends('layouts.front.app')

@php
$p_nam = 'about';
@endphp

@section('page_name' , 'About Orion Contracting Company')

{{-- SEO Meta Tags --}}
@section('meta_description', 'Learn about Orion Contracting Company - a premier construction and contracting firm established in 2008 with over 15 years of expertise in commercial, industrial, and MEP projects across UAE and Saudi Arabia.')
@section('meta_keywords', 'about Orion Contracting, construction company UAE, company profile, construction expertise, MEP contractors, industrial construction UAE, commercial construction Dubai, Ras Al Khaimah contractors')
@section('canonical_url', route('about'))

{{-- Open Graph Tags --}}
@section('og_type', 'website')
@section('og_title', 'About Us - Orion Contracting Company | 15+ Years of Construction Excellence')
@section('og_description', 'Discover Orion Contracting Company - Your trusted partner for construction projects in UAE and Saudi Arabia since 2008. Specializing in commercial, industrial, and MEP services.')
@section('og_url', route('about'))

{{-- Twitter Card Tags --}}
@section('twitter_title', 'About Us - Orion Contracting Company | 15+ Years of Construction Excellence')
@section('twitter_description', 'Discover Orion Contracting Company - Your trusted partner for construction projects in UAE and Saudi Arabia since 2008.')

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
      "name": "About Us",
      "item": "{{ route('about') }}"
    }
  ]
}
</script>

<!-- AboutPage Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "name": "About Orion Contracting Company",
  "description": "Orion Contracting Company has been providing exceptional construction services since 2008, with expertise in commercial, industrial, and MEP projects across UAE and Saudi Arabia.",
  "mainEntity": {
    "@type": "Organization",
    "name": "Orion Contracting Company",
    "foundingDate": "2008",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('orionFrontAssets/assets/images/resources/logo-blue.webp') }}",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Al-Hamra Industrial Area",
      "addressLocality": "Ras Al Khaimah",
      "addressRegion": "Ras Al Khaimah",
      "addressCountry": "AE"
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
<style>
    canvas {
        position: relative !important;


    }
</style>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'doughnut',

        data: {
            labels: [
                'MS', 'PC', 'PMV', 'BD', 'PA', 'SWD', 'Cstr', 'MEP',
            ],

            datasets: [{
                data: [12, 14, 17, 14, 14, 2, 86, 44],
                backgroundColor: [
                    'rgb(255, 99, 132)',  // Red
                    'rgb(54, 162, 235)',  // Blue
                    'rgb(255, 205, 86)',   // Yellow
                    'rgb(75, 192, 192)',   // Teal
                    'rgb(153, 102, 255)',  // Purple
                    'rgb(192, 57, 43)',    // Dark Red
                    'rgb(46, 204, 113)',   // Green
                    'rgb(241, 196, 15)'    // Bright Yellow
                ],
                hoverOffset: 4
            }]
        },
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const labels = [
                                'Staff Management',
                                'Project Control',
                                'Plan, Machineries, Vehicles',
                                'Business Development',
                                'Personal & Admin',
                                'Steel Work Department',
                                'Construction',
                                'MEP Department'
                            ];
                            return labels[context.dataIndex] + ': ' + context.formattedValue;
                        }
                    }
                }
            }
        }
    });

    const ctx2 = document.getElementById('myPolarAreaChart');

const data = {
  labels: ['Semi-Skilled Labors', 'Welders', 'Painters', 'Electricians', 'Carpenters','Steel Erectors' , 'Mechanics' ,'Reinforcing Fitters' , 'Plumbers' , 'Masons' , 'AC Tech'],
  datasets: [{
    label: 'Dataset 1',
    data: [266,22,21,63,333,61,14,292,61,346,21],
    backgroundColor: [
     'rgba(255, 99, 132, 0.7)',   // Soft Red
      'rgba(54, 162, 235, 0.7)',   // Sky Blue
      'rgba(255, 206, 86, 0.7)',   // Sunny Yellow
      'rgba(75, 192, 192, 0.7)',   // Teal
      'rgba(153, 102, 5, 0.7)',  // Lavender
      'rgba(255, 005, 64, 0.7)',   // Orange
      'rgba(46, 204, 113, 0.7)',   // Emerald Green
      'rgba(236, 112, 99, 0.7)',   // Coral
      'rgba(09, 200, 5, 0.7)',   // Dodger Blue
      'rgba(155, 89, 182, 0.7)',   // Amethyst
      'rgba(255, 188, 156, 0.7)'    // Turquoise
    ]
  }]
};

new Chart(ctx2, {
  type: 'doughnut',
  data: data,
  options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const labels = ['Semi-Skilled Labors', 'Welders', 'Painters', 'Electricians', 'Carpenters','Steel Erectors' , 'Mechanics' ,'Reinforcing Fitters' , 'Plumbers' , 'Masons' , 'AC Tech'];
                            return labels[context.dataIndex] + ': ' + context.formattedValue;
                        }
                    }
                }
            }
        }
});

const equipmentCtx = document.getElementById('equipmentChart');
new Chart(equipmentCtx, {
    type: 'pie',
    data: {
        labels: [
            'Laser Screed Machine', 'Boom Loader', 'Skid Steel Loader', 'Jeep', 'Pick-up Double Cabin',
            'Pick-up Long Cabin', 'Car', 'Trailer', 'Bus', 'Backhoe Loader', 'Tyre Roller', 'Shovel',
            'Crane', 'Excavator', 'Low Bed', 'Flat Trailer', 'Water Tanker', 'Scissor Lift', 'Man Lift',
            'Generator', 'Plate Compactor', 'Concrete Vibrator', 'Power Float', 'Roller Compactor',
            'Floor Cutter Machine', 'Bar Bending Machine', 'Bar Cutting Machine', 'Tower Light',
            'Air Compressor', 'Concrete Mixing Machine'
        ],
        datasets: [{
            data: [2,10,10,7,19,23,19,8,12,5,4,8,2,2,2,4,6,4,8,31,20,50,20,4,5,13,14,10,8,10], // Replace with actual data
            backgroundColor: [
                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                '#FF9F40', '#32CD32', '#BA55D3', '#20B2AA', '#FF4500',
                '#7B68EE', '#00CED1', '#FF1493', '#1E90FF', '#FFD700',
                '#8A2BE2', '#00FA9A', '#DC143C', '#00BFFF', '#F4A460',
                '#9370DB', '#98FB98', '#DDA0DD', '#40E0D0', '#FF6347',
                '#4682B4', '#D8BFD8', '#228B22', '#FF69B4', '#4169E1'
            ],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            }
        }
    }
});
</script>
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
                <li><a>About Us</a></li>
            </ul>
            <h2 class="fnt-clr-g">About Orion</h2>
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
                        <span class="section-title__tagline">About Our Company</span>
                        <h2 class="section-title__title">Orion <br> Contarcting Company

                        </h2>
                    </div>

                </div>
            </div>
        </div>
        <!--About Three Start-->
        <section class="about-three">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="about-three__left">
                            <div class="about-three__shape-2 float-bob-x">
                                <img src="{{ asset('orionFrontAssets/assets/images/shapes/about-three-shape-2.png') }}"
                                    alt="">
                            </div>
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Get to Know us</span>
                                <h2 class="section-title__title">Welcome to Orion Contracting Company</h2>
                            </div>
                            <p class="about-three__text-1">We Experienced in Dealing with Local Authorities
                            </p>
                            <p class="about-three__text-1">We have Long Experience in Local Market and relationships
                                with Key providers
                            </p>
                            <p class="about-three__text-1">Dedicated Services After the Completion of the Contractual
                                Commitment

                            </p>
                            <ul class="about-three__points list-unstyled">
                                <li>
                                    <div class="about-three__count"></div>
                                    <p class="about-three__text">Professionalism
                                    </p>
                                </li>
                                <li>
                                    <div class="about-three__count"></div>
                                    <p class="about-three__text">Commitment
                                    </p>
                                </li>
                            </ul>
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
                                    <img src="{{ asset('orionFrontAssets/assets/images/shapes/main-slide.svg')}}"
                                        alt="">
                                </div>
                                <div class="about-three__experience">
                                    <div class="about-three__experience-shape-1">
                                        <img src="{{ asset('orionFrontAssets/assets/images/shapes/about-three-experience-shape-1.png')}}"
                                            alt="">
                                    </div>
                                    <div class="about-three__experience-inner">
                                        <div class="about-three__experience-shape-2">
                                            <img src="{{ asset('orionFrontAssets/assets/images/')}}" alt="">
                                        </div>
                                        <div class="about-three__experience-year">
                                            <h3>18</h3>
                                        </div>
                                        <div class="about-three__experience-text">
                                            <p>Years of <br> experience</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About Three End-->
        <!--About Three Start-->

        <!--About Three End-->
        <!--About Three Start-->
        {{-- <section class="about-three">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="about-three__left">
                            <div class="about-three__shape-2 float-bob-x">
                            </div>
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Our Mission</span>
                                <h2 class="section-title__title">Orion Contracting Company</h2>
                            </div>
                            <p class="about-three__text-1">To become the highest-value provider of UAE contracting
                                services and technical expertise.</p>
                            <p class="about-three__text-1">We strive for excellence in every project, delivering
                                unparalleled quality and innovation to our clients.</p>
                            <p class="about-three__text-1">Our commitment to professionalism and dedication sets us
                                apart in the UAE construction industry.</p>

                            <ul class="about-three__points list-unstyled">
                                <li>
                                    <div class="about-three__count"></div>
                                    <p class="about-three__text">Excellence in Service</p>
                                </li>
                                <li>
                                    <div class="about-three__count"></div>
                                    <p class="about-three__text">Innovation in Construction</p>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-three__right">
                            <div class="about-three__img-box wow slideInRight" data-wow-delay="100ms"
                                data-wow-duration="2500ms">
                                <img src="{{ asset('orionFrontAssets/assets/images/resources/mission.png') }}" alt="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!--About Three End-->
    </div>
</section>
<div class="container-fluid px-0">
    <section class="why-choose-one about-page">
        <div class="why-choose-one__bg"
            style="background-image: url({{ asset('orionFrontAssets/assets/images/backgrounds/why-choose-one-bg.jpg') }});">
        </div>
        <div class="why-choose-one__shape-1 float-bob-y">
            <img src="{{ asset('orionFrontAssets/assets/images/backgrounds/EideBaillyimage1-02.webp') }}" alt="">
        </div>
        {{-- <div class="why-choose-one__shape-2 float-bob-x">
            <img src="" alt="">
        </div>
        <div class="why-choose-one__shape-3">
            <img src="{{ asset('orionFrontAssets/assets/images/backgrounds/') }}" alt="">
        </div>
        <div class="why-choose-one__shape-4">
            <img src="{{ asset('orionFrontAssets/assets/images/backgrounds/') }}" alt="">
        </div>
        <div class="why-choose-one__img-1 wow fadeInUp animated" data-wow-duration="1500ms"
            style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
            <img src="{{ asset('orionFrontAssets/assets/images/backgrounds/4450462.png') }}" alt="">
        </div> --}}

        <div class="container">
            <div class="row">
                <div class="col-xl-6 ">
                    <div class="why-choose-one__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline fnt-clr-g">ORION Mission</span>
                            <h2 class="section-title__title fs-18">To become the highest-value provider of UAE
                                contracting
                                services and technical expertise.</h2>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="why-choose-one__single">

                                    <h4 class="why-choose-one__title">Innovation in Construction</h4>
                                    <p class="why-choose-one__text f-clr-w">We strive for excellence in every project,
                                        delivering
                                        unparalleled quality and innovation to our clients.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6 ">
                    <div class="why-choose-one__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline fnt-clr-g">ORION Vission</span>
                            <h2 class="section-title__title fs-18">To design, construct, and deliver high-quality,
                                cost-effective, and timely construction projects to our clients .</h2>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="why-choose-one__single">

                                    <h4 class="why-choose-one__title">Excellence in Delivery</h4>
                                    <p class="why-choose-one__text f-clr-w">We are committed to delivering superior
                                        projects on
                                        time and within budget, while fostering growth and development for our team.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<section class="portfolio-details">
    <div class="container">
        <section class="about-three">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="about-three__left">
                            <div class="about-three__shape-2 float-bob-x">
                                <img src="{{ asset('orionFrontAssets/assets/images/shapes/about-three-shape-2.png') }}"
                                    alt="">
                            </div>
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Get to Know us</span>
                                <h2 class="section-title__title">STAFF, MANPOWER AND EQUIPMENT BREAKDOWN</h2>
                            </div>
                            <p class="about-three__text-1">We Experienced in Dealing with Local Authorities
                            </p>
                            <p class="about-three__text-1">We have Long Experience in Local Market and relationships
                                with Key providers
                            </p>
                            <p class="about-three__text-1">Dedicated Services After the Completion of the Contractual
                                Commitment

                            </p>

                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-three__right">
                            <div class="about-three__img-box wow slideInRight" data-wow-delay="100ms"
                                data-wow-duration="2500ms">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-three__right">
                            <div class="about-three__img-box wow slideInLeft" data-wow-delay="100ms"
                                data-wow-duration="2500ms">
                                <canvas id="equipmentChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-three__right">
                            <div class="about-three__img-box wow slideInRight" data-wow-delay="100ms"
                                data-wow-duration="2500ms">
                                <canvas id="myPolarAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

@endsection
