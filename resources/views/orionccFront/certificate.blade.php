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
                        <h2 class="section-title__title">Orion <br> Contarcting Company

                        </h2>
                    </div>

                </div>
            </div>
        </div>
        <div class="portfolio-details__bottom">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="portfolio-details__left">
                        <h3 class="portfolio-details__title">ISO 9001:2015</h3>
                        <h5 class="portfolio-details__title fnt-clr-sb">Quality management</h5>
                        <p class="portfolio-details__text-1">Orion is committed to a policy of safe working condition
                            and practices, for all its employees. This includes all workers in projects sites, hence all
                            necessary precautions are taken to prevent adverse effects on its employees, equipment and
                            the environment in which its activates are taking place.
                            This commitment to safety is communicated to all employees and its subcontractors by
                            prominent display on the project sites.
                            It is the responsibility of all employees to understand their role in fulfilling this policy
                            and follow the safety instructions and guidelines for the welfare of all.
                        </p>
                        <p class="portfolio-details__text-2">Our company is proudly certified with ISO 9001:2015, the
                            international standard for Quality Management Systems (QMS). This certification underscores
                            our commitment to consistently providing products and services that meet customer and
                            regulatory requirements, enhancing customer satisfaction through effective application of
                            the system.</p>
                        <ul class="portfolio-details__points-box list-unstyled">
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Customer Focus:</span> Meet and exceed customer
                                        expectations.</p>
                                </div>
                            </li>
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Effective Processes:</span> Implement efficient, consistent
                                        processes.
                                    </p>
                                </div>
                            </li>
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Continuous Improvement:</span> Regularly enhance quality
                                        management.</p>
                                </div>
                            </li>
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Stakeholder Trust:</span> Build confidence through quality
                                        assurance.</p>
                                </div>
                            </li>
                        </ul>
                        <p class="portfolio-details__text-2">By achieving ISO 9001:2015 certification, we demonstrate
                            our dedication to maintaining high standards of quality management, ultimately contributing
                            to the overall success and sustainability of our business.</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="portfolio-details__right">
                        <div class="banner-one__right wow">
                            <div class="banner-one__inner20 ">
                                <div class="banner-one__img-20">
                                    <img style="width: 100%"
                                        src="{{ asset('orionFrontAssets/assets/images/certificate/صورة5.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-details__bottom">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="portfolio-details__right">
                        <div class="banner-one__right wow">
                            <div class="banner-one__inner20 ">
                                <div class="banner-one__img-20">
                                    <img style="width: 100%"
                                        src="{{ asset('orionFrontAssets/assets/images/certificate/صورة4.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="portfolio-details__left">
                        <h3 class="portfolio-details__title">ISO 14001:2015 {EMS}</h3>
                        <h5 class="portfolio-details__title fnt-clr-sb">Environment management</h5>
                        <p class="portfolio-details__text-1">Orion is committed to a policy of safe working condition
                            and practices, for all its employees. This includes all workers in projects sites, hence all
                            necessary precautions are taken to prevent adverse effects on its employees, equipment and
                            the environment in which its activates are taking place.

                            This commitment to safety is communicated to all employees and its subcontractors by
                            prominent display on the project sites.

                            It is the responsibility of all employees to understand their role in fulfilling this policy
                            and follow the safety instructions and guidelines for the welfare of all.

                        </p>
                        <p class="portfolio-details__text-2">Our company is proudly certified with ISO 14001:2015, the
                            international standard for Environmental Management Systems (EMS). This certification
                            highlights our commitment to environmental responsibility and sustainable practices. By
                            adhering to the rigorous requirements of ISO 14001:2015, we systematically manage our
                            environmental impact and continuously improve our environmental performance.</p>
                        <ul class="portfolio-details__points-box list-unstyled">
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Environmental Performance:</span> Reduce footprint,
                                        efficient resource use.</p>
                                </div>
                            </li>
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Regulatory Compliance:</span> Meet environmental laws and
                                        standards.
                                    </p>
                                </div>
                            </li>
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Risk Management:</span>Identify and manage environmental
                                        risks.</p>
                                </div>
                            </li>
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Continuous Improvement:</span> Enhance EMS through audits
                                        and updates.</p>
                                </div>
                            </li>
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Stakeholder Trust:</span> Build confidence in environmental
                                        responsibility.</p>
                                </div>
                            </li>
                        </ul>
                        <p class="portfolio-details__text-2">By achieving ISO 14001:2015 certification, we demonstrate
                            our dedication to protecting the environment and promoting sustainable practices, ultimately
                            contributing to the overall success and sustainability of our business.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-details__bottom">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="portfolio-details__left">
                        <h3 class="portfolio-details__title">ISO 45001:2018</h3>
                        <h5 class="portfolio-details__title fnt-clr-sb">Health & Safety <br>Management system</h5>
                        <p class="portfolio-details__text-1">Orion is committed to a policy of safe working condition
                            and practices, for all its employees. This includes all workers in projects sites, hence all
                            necessary precautions are taken to prevent adverse effects on its employees, equipment and
                            the environment in which its activates are taking place.
                            This commitment to safety is communicated to all employees and its subcontractors by
                            prominent display on the project sites.
                            It is the responsibility of all employees to understand their role in fulfilling this policy
                            and follow the safety instructions and guidelines for the welfare of all.
                        </p>
                        <p class="portfolio-details__text-2">Our company is proudly certified with ISO 45001:2018, the
                            international standard for Occupational Health and Safety Management Systems (OH&S). This
                            certification underscores our commitment to providing a safe and healthy workplace for our
                            employees, contractors, and visitors. By adhering to the rigorous requirements of ISO
                            45001:2018, we systematically manage and mitigate risks associated with occupational health
                            and safety.</p>
                        <ul class="portfolio-details__points-box list-unstyled">
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Enhanced Safety:</span> Prioritize workforce well-being,
                                        control hazards.</p>
                                </div>
                            </li>
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Regulatory Compliance:</span> Meet legal and safety
                                        standards.
                                    </p>
                                </div>
                            </li>
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Risk Management:</span> Identify and manage safety risks.
                                    </p>
                                </div>
                            </li>
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Continuous Improvement:</span> Regular audits, reviews,
                                        safety updates.</p>
                                </div>
                            </li>
                            <li class="my-2">
                                <div class="icon">
                                    <span class="fa fa-check"></span>
                                </div>
                                <div class="text">
                                    <p><span class="f-w-900">Stakeholder Confidence:</span> Foster trust, reliable
                                        contracting reputation.</p>
                                </div>
                            </li>
                        </ul>
                        <p class="portfolio-details__text-2">By achieving ISO 9001:2015 certification, we demonstrate
                            our dedication to maintaining high standards of quality management, ultimately contributing
                            to the overall success and sustainability of our business.</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="portfolio-details__right">
                        <div class="banner-one__right wow">
                            <div class="banner-one__inner20 ">
                                <div class="banner-one__img-20">
                                    <img style="width: 100%"
                                        src="{{ asset('orionFrontAssets/assets/images/certificate/صورة3.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-details__bottom">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="portfolio-details__right">
                        <div class="banner-one__right wow">
                            <h3 class="portfolio-details__title">Main Trade License ( UAE )</h3>
                            <h5 class="portfolio-details__title fnt-clr-sb">Commercial Licence</h5>
                            <div class="banner-one__inner20 ">
                                <div class="banner-one__img-20">
                                    <img style="width: 100%"
                                        src="{{ asset('orionFrontAssets/assets/images/certificate/صورة1.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="portfolio-details__right">
                        <div class="banner-one__right wow">
                            <h3 class="portfolio-details__title">Main Trade License ( KSA )</h3>
                            <h5 class="portfolio-details__title fnt-clr-sb">Commercial Licence</h5>
                            <div class="banner-one__inner20 ">
                                <div class="banner-one__img-20">
                                    <img style="width: 100%"
                                        src="{{ asset('orionFrontAssets/assets/images/certificate/صورة2.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
