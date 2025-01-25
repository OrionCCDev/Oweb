@extends('layouts.front.app')
@php
$p_nam = 'projects';
@endphp
@section('page_name' , 'Orion Projects')
@section('pageLoader')
<div class="preloader">
    <div class="preloader__image"></div>
</div>
<!-- /.preloader -->
@endsection
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

<!--Product Start-->
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product__items">
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
                                            class="product__menu-icon-one active"><span class="icon-menu"></span></a>
                                        <a href="{{ route('indexOfList', ['page' => $page]) }}"
                                            class="product__menu-icon-two"><span class="icon-list"></span></a>
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
                    <div class="product__all">
                        <div class="row">
                            @foreach ($allData as $data )

                            <!--Product All Single Start-->
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="product__all-single">
                                    <a href="{{ route('projects.show' ,['project'=>$data['id']] ) }}">
                                        <div class="product__all-single-inner">
                                            <div class="product__all-img">
                                                <img src="{{ asset('orionFrontAssets/assets/images/project/' . $data->slug_name . '/main.webp') }}"
                                                    alt="">
                                            </div>
                                            <div class="product__all-content">
                                                <h4 class="product__all-title"><a
                                                        href="{{ route('projects.show' , ['project'=>$data['id']]) }}">{{
                                                        $data->name }}</a></h4>
                                                {{-- <p class="product__all-price">{{ $data->Client->name }}</p> --}}
                                                <div class="product__all-btn-box">
                                                    <a href="{{ route('projects.show', ['project'=>$data['id']]) }}"
                                                        class="thm-btn product__all-btn">More</a>
                                                </div>
                                            </div>
                                            @if ($data->status == 'completed')
                                            <div class="products__all-icon-boxes">
                                                <span href="#" class="bg-lbn fnt-clr-g"><i
                                                        class="fas fa-check-square px-2"></i>{{ $data->status }}</span>
                                                <span href="#" class="bg-blu fnt-clr-w"><i
                                                        class="far fa-calendar-alt px-2"></i>{{ $data->end }}</span>
                                            </div>
                                            @else
                                            <div class="products__all-icon-boxes">
                                                <span href="#" class="bg-lim fnt-clr-b"><i
                                                        class="fas fa-spinner px-2"></i>{{ $data->status }}</span>

                                            </div>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--Product All Single End-->
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                {{ $allData->appends(['page' => $page])->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script src="{{ asset('orionFrontAssets/assets/vendors/circleType/jquery.lettering.min.js') }}"></script>-->
<script src="{{ asset('orionFrontAssets/assets/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
<!-- template js -->
<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
<script src="{{ asset('orionFrontAssets/assets/js/main.js') }}"></script>

@endsection
