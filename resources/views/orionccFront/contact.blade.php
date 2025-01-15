@php
$p_nam = 'contact';
@endphp
@section('page_name' , 'Contact Us')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Orion CC | {{ 'Contact Us' }}</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/favicon.webp" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon32.webp" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon16.webp" />
    <meta name="description"
        content="ORION Leading contracting company in Ras Al Khaimah, UAE, specializing in residential, commercial, and industrial projects. Trusted for quality, reliability, and timely delivery. Contact us for your construction needs." />
    <meta name="keywords"
        content="constructing, contracting, build, UAE, Ras Al Khaimah, Dubai,Mechanical electrical and plumbing ,Businesses, construct, mep, MEP, INFRASTRUCTURE, roads, LANDSCAPE">
    <meta name="robots" content="index, follow">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500&amp;family=Manrope:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('orionFrontAssets/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/ogenix-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('orionFrontAssets/assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/timepicker/timePicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/nice-select/nice-select.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/lightgallery@2.3.0/css/lightgallery.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/js/flip/jquery.flipster.min.css') }}" />

    <!-- template styles -->
    <!-- <link rel="stylesheet" href="assets/css/packages.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/css/style.css') }}" />
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="page-wrapper">
        <header class="main-header">
            <div class="main-header__wrapper">
                <div class="main-header__wrapper-inner">
                    <div class="main-header__logo">
                        <a href="{{ route('home') }}"><img
                                src="{{ asset('orionFrontAssets/assets/images/resources/logo-white.webp')}}"
                                alt="Orion Company White Logo"></a>
                    </div>
                    <div class="main-header__right">
                        <div class="main-header__top">
                            <div class="main-header__top-inner">
                                <div class="main-header__top-left">
                                    <p class="main-header__top-left-text">You Dream We Build</p>
                                    <div class="main-header__social">
                                        <a href="https://www.facebook.com/orioncontractingcompany"><i
                                                class="fab fa-facebook"></i></a>
                                        <a
                                            href="https://www.linkedin.com/company/orion-contracting-company-llc/mycompany/"><i
                                                class="fab fa-linkedin"></i></a>
                                        <a href="https://www.youtube.com/@orioncontracting9881"><i
                                                class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                                <div class="main-header__top-right">
                                    <ul class="list-unstyled main-header__contact-list">
                                        <li>
                                            <div class="icon">
                                                <i class="fas fa-mobile"></i>
                                            </div>
                                            <div class="text">
                                                <p><a href="tel:97172335531">+971 7 2335531</a></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="fas fa-envelope-open"></i>
                                            </div>
                                            <div class="text">
                                                <p><a href="mailto:info@orioncc.com">info@orioncc.com</a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="main-header__right-bottom">
                            <nav class="main-menu">
                                <div class="main-menu__wrapper">
                                    <div class="main-menu__wrapper-inner">
                                        <div class="main-menu__main-menu-box">
                                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                            <ul class="main-menu__list">
                                                <li @class(['current'=> $p_nam == 'home'])>
                                                    <a href="{{ route('home') }}">Home </a>
                                                </li>
                                                <li @class(['current'=> $p_nam == 'projects'])>
                                                    <a href="{{ route('projects.index') }}">Our Projects</a>
                                                </li>
                                                <li @class(['current'=> $p_nam == 'sectors'])>
                                                    <a href="{{ route('sectors.index') }}">Sectors We Serve</a>
                                                </li>
                                                <li @class(['current'=> $p_nam == 'certificate'])>
                                                    <a href="{{ route('certificate.index') }}">Certification</a>
                                                </li>
                                                <li @class(['current'=> $p_nam == 'team'])>
                                                    <a href="{{ route('team') }}">Our Team</a>
                                                </li>
                                                <li @class(['current'=> $p_nam == 'about'])>
                                                    <a href="{{ route('about') }}">About Us</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="main-menu__right">
                                            <div class="main-menu__search-cart-btn">

                                                <div class="main-menu__btn-box">
                                                    <a href="{{ route('contact') }}"
                                                        class="thm-btn main-menu__btn">Contact Us</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

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
                        <li>Contact Us</li>
                    </ul>
                    <h2 class="fnt-clr-g">Contact Us</h2>
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
                                <span class="section-title__tagline">Happy To Contact Us</span>
                                <h2 class="section-title__title">Orion Contracting
                                    <br> Company
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Google Map Start-->
                <section class="google-map">
                    <div class="container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14385.822519137293!2d55.79079679999999!3d25.656186799999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ef676cd70cb41b3%3A0x3541967be2e9616!2sOrion%20Contracting%20Company%20LLC!5e0!3m2!1sen!2sae!4v1727673395878!5m2!1sen!2sae"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="google-map__one"></iframe>

                    </div>
                </section>
                <!--Google Map End-->

                <!--Contact Details Start-->
                <section class="contact-details">
                    <div class="container">
                        <div class="contact-details__inner">
                            <div class="row justify-content-center flex-wrap">
                                <ul class="contact-details__contact-list list-unstyled d-flex flex-wrap">
                                    <li class="col-12 col-md-6 col-lg-3">
                                        <div class="icon">
                                            <i class="fas fa-phone-square-alt"></i>
                                        </div>

                                        <div class="content">
                                            <p>Call Us</p>
                                            <h4>
                                                <a href="tel:97172335531">+971 7 2335531</a>
                                            </h4>
                                        </div>
                                    </li>
                                    <li class="col-12 col-md-6 col-lg-3">
                                        <div class="icon">
                                            <i class="fas fa-fax"></i>
                                        </div>
                                        <div class="content">
                                            <p>Fax</p>
                                            <h4>
                                                <a href="tel:97172335531">+971 7 2335541</a>
                                            </h4>
                                        </div>
                                    </li>
                                    <li class="col-12 col-md-6 col-lg-3">
                                        <div class="icon">
                                            <i class="fab fa-usps"></i>
                                        </div>
                                        <div class="content">
                                            <p>Post Number</p>
                                            <h4>
                                                <a>34698</a>
                                            </h4>
                                        </div>
                                    </li>
                                    <li class="col-12 col-md-6 col-lg-3">
                                        <div class="icon">
                                            <span class="icon-mailbox"></span>
                                        </div>
                                        <div class="content">
                                            <p>Write email</p>
                                            <h4>
                                                <a href="mailto:info@orioncc.com">info@orioncc.com</a>
                                            </h4>
                                        </div>
                                    </li>
                                    <li class="col-12 col-md-12 d-flex justify-content-center mt-3">
                                        <div class="icon">
                                            <span class="icon-maps-and-flags"></span>
                                        </div>
                                        <div class="content text-center">
                                            <p>Visit Us</p>
                                            <h4>Al Hamrah Industrial Zone Al Jazirah Alhamra – Ras al Khaimah – United
                                                Arab Emirates</h4>
                                        </div>
                                    </li>
                                </ul>
                                <div class="contact-details__social-box justify-content-center mt-5">

                                    <a href="https://www.facebook.com/orioncontractingcompany"><i
                                            class="fab fa-facebook"></i></a>
                                    <a href="https://www.linkedin.com/company/orion-contracting-company-llc/mycompany/"><i
                                            class="fab fa-linkedin"></i></a>

                                    <a href="ttps://www.youtube.com/@orioncontracting9881"><i
                                            class="fab fa-youtube"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!--Contact Details End-->

                <!--Contact Page Start-->
                <section class="contact-page">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="section-title text-center">
                                    <span class="section-title__tagline">Write a Message</span>
                                    <h2 class="section-title__title">We’re always here to
                                        <br> help you
                                    </h2>
                                </div>
                                <div class="contact-page__content">
                                    <form action="https://layerdrops.com/ogenix/main-html/assets/inc/sendemail.php"
                                        class="contact-page__form contact-form-validated" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="contact-page__form-input-box">
                                                    <input type="text" placeholder="Your name" name="name">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="contact-page__form-input-box">
                                                    <input type="email" placeholder="Email address" name="email">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="contact-page__form-input-box">
                                                    <input type="text" placeholder="Subject" name="Subject">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="contact-page__form-input-box">
                                                    <input type="text" placeholder="Phone" name="phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="contact-page__form-input-box text-message-box">
                                                <textarea name="message" placeholder="Write a massage"></textarea>
                                            </div>
                                            <div class="contact-page__btn-box">
                                                <button type="submit" class="thm-btn contact-page__btn">Send a
                                                    message</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Contact Page End-->

            </div>
        </section>

        <footer class="site-footer">
            <div class="site-footer__bg"
                style="background-image: url({{ asset('orionFrontAssets/assets/images/backgrounds/site-footer-bg-img.png')}});background-repeat: repeat;background-size: 350px;">
            </div>
            <div class="site-footer__ripped-paper"
                style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/site-footer-ripped-paper.png')}});">
            </div>
            <div class="container">
                <div class="site-footer__top">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget__column footer-widget__about">
                                <div class="footer-widget__logo">
                                    <a href="index-2.html"><img
                                            src="{{ asset('orionFrontAssets/assets/images/resources/logo-white.webp')}}"
                                            alt=""></a>
                                </div>
                                <div class="footer-widget__about-text-box">
                                    <p class="footer-widget__about-text">We’re Making Your Dream <br> Became Reality</p>
                                </div>
                                <div class="footer-widget__social-box">
                                    <a href="https://www.facebook.com/orioncontractingcompany"><i
                                            class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com/company/orion-contracting-company-llc/mycompany/"><i
                                            class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__column footer-widget__explore">
                                <div class="footer-widget__title-box">
                                    <h3 class="footer-widget__title">Explore</h3>
                                </div>
                                <div class="footer-widget__explore-list-box">
                                    <ul class="footer-widget__explore-list list-unstyled">
                                        <li><a href="about.html">About Company</a></li>
                                        <li><a href="services.html">Our Sectors</a></li>
                                        <li><a href="pricing.html">Our Staff</a></li>
                                        <li><a href="products.html">Projects</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                            <div class="footer-widget__column footer-widget__contact">
                                <div class="footer-widget__title-box">
                                    <h3 class="footer-widget__title">Contact</h3>
                                </div>
                                <p class="footer-widget__contact-text">UAE , Ras Al-Khaimah , Al-Hamra Industrial Area
                                </p>
                                <ul class="list-unstyled footer-widget__contact-list">
                                    <li>
                                        <div class="text">
                                            <p><a href="tel:97172335531">
                                                    +971 7233 5531</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="text">
                                            <p><a href="mailto:info@orioncc.com ">info@orioncc.com</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget__column footer-widget__gallery">
                                <div class="footer-widget__title-box">
                                    <h3 class="footer-widget__title">Gallery</h3>
                                </div>
                                <ul class="footer-widget__gallery-list list-unstyled clearfix">
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{ asset('orionFrontAssets/assets/images/project/Picture1.jpg')}}"
                                                alt="">
                                            <a href="portfolio-details.html"><span class="fa fa-link"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{ asset('orionFrontAssets/assets/images/project/Picture10.png')}}"
                                                alt="">
                                            <a href="portfolio-details.html"><span class="fa fa-link"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{ asset('orionFrontAssets/assets/images/project/Picture12.png')}}"
                                                alt="">
                                            <a href="portfolio-details.html"><span class="fa fa-link"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{ asset('orionFrontAssets/assets/images/project/Picture32.jpg')}}"
                                                alt="">
                                            <a href="portfolio-details.html"><span class="fa fa-link"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{ asset('orionFrontAssets/assets/images/project/Picture212.jpg')}}"
                                                alt="">
                                            <a href="portfolio-details.html"><span class="fa fa-link"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{ asset('orionFrontAssets/assets/images/project/Picture3.jpg')}}"
                                                alt="">
                                            <a href="portfolio-details.html"><span class="fa fa-link"></span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="site-footer__bottom-inner">
                                <div class="site-footer__bottom-left">
                                    <p class="site-footer__bottom-text">© Copyright 2024 by <a href="#">Orion</a>
                                    </p>
                                </div>
                                <div class="site-footer__bottom-right">
                                    <ul class="list-unstyled site-footer__bottom-menu">
                                        <li><a href="about.html">Terms & Conditions</a></li>
                                        <li><span>/</span></li>
                                        <li><a href="about.html">Privacy Policy</a></li>
                                        <li><span>/</span></li>
                                        <li><a href="about.html">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer End-->
    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index-2.html" aria-label="logo image"><img
                        src="{{ asset('orionFrontAssets/assets/images/resources/logo-white.webp')}}" width="104"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:info@orioncc.com">info@orioncc.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:97172335531">+971 7 2335531</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="https://www.facebook.com/orioncontractingcompany"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.linkedin.com/company/orion-contracting-company-llc/mycompany/"><i
                            class="fab fa-linkedin"></i></a>
                    <a href="https://www.youtube.com/@orioncontracting9881"><i class="fab fa-youtube"></i></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-up-arrow"></i></a>


    <script src="{{ asset('orionFrontAssets/assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}">
    </script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}">
    </script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/isotope/isotope.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.3.0/lightgallery.min.js"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/vegas/vegas.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/timepicker/timePicker.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/circleType/jquery.circleType.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/circleType/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/js/flip/jquery.flipster.min.js') }}"></script>
    <!-- template js -->
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
    <script src="{{ asset('orionFrontAssets/assets/js/main.js') }}"></script>
</body>


</html>