@extends('layouts.front.app')
@php
$p_nam = 'contact';
@endphp
@section('page_name' , 'Contact Us')
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
                                    <h4>Al Hamrah Industrial Zone Al Jazirah Alhamra – Ras al Khaimah – United Arab
                                        Emirates</h4>
                                </div>
                            </li>
                        </ul>
                        <div class="contact-details__social-box justify-content-center mt-5">

                            <a href="https://www.facebook.com/orioncontractingcompany/"><i
                                    class="fab fa-facebook"></i></a>
                            <a href="https://www.linkedin.com/company/orion-contracting-company-llc/"><i
                                    class="fab fa-linkedin"></i></a>
                            <a href="https://www.instagram.com/orioncontracting/"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com/@orioncontracting9881"><i class="fab fa-youtube"></i></a>
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
                                        <button type="submit" class="thm-btn contact-page__btn">Send a message</button>
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

<script src="{{ asset('orionFrontAssets/assets/js/main.js') }}"></script>
@endsection