@extends('layouts.front.app')
@php
$p_nam = 'clients';
@endphp
@section('page_name' , 'Our Clients')

{{-- SEO Meta Tags --}}
@section('meta_description', 'Trusted by leading organizations across the UAE and Saudi Arabia. See the clients Orion Contracting Company has delivered commercial, industrial, and MEP projects for since 2008.')
@section('meta_keywords', 'Orion Contracting clients, construction company clients UAE, trusted contractor Ras Al Khaimah, commercial construction partners')
@section('canonical_url', route('clients'))

{{-- Open Graph Tags --}}
@section('og_type', 'website')
@section('og_title', 'Our Clients - Orion Contracting Company')
@section('og_description', 'Trusted by leading organizations across the UAE and Saudi Arabia since 2008.')
@section('og_url', route('clients'))

@section('css_style_links')
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/animate/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/animate/custom-animate.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/fontawesome/css/all.min.css') }}" />
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/vendors/ogenix-icons/style.css') }}">
<link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/css/style.css') }}" />
<style>
    .orion-clients-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 24px;
    }
    .orion-client-card {
        background: #fff;
        border: 1px solid rgba(10, 22, 40, 0.08);
        padding: 32px 24px;
        text-align: center;
        clip-path: polygon(0 0, calc(100% - 16px) 0, 100% 16px, 100% 100%, 0 100%);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .orion-client-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(10, 22, 40, 0.12);
    }
    .orion-client-card img {
        max-width: 100%;
        max-height: 70px;
        object-fit: contain;
        margin-bottom: 16px;
    }
    .orion-client-card__name {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 600;
        font-size: 15px;
        color: #0A1628;
        margin-bottom: 4px;
    }
    .orion-client-card__count {
        font-size: 13px;
        color: #9FB4C8;
    }
</style>
@endsection

@section('cust_js')
<script src="{{ asset('orionFrontAssets/assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/vendors/wow/wow.js') }}"></script>
<script src="{{ asset('orionFrontAssets/assets/js/main.js') }}"></script>
@endsection

@section('page_content')

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/backgrounds/why-choose-one-bg.jpg') }})">
    </div>
    <div class="page-header__ripped-paper"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/page-header-ripped-paper.png') }});">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span>/</span></li>
                <li>Our Clients</li>
            </ul>
            <h2>Our Clients</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<section class="portfolio-details">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">{{ setting('clients_page.tagline', 'Trusted Partnerships') }}</span>
            <h2 class="section-title__title">{{ setting('clients_page.title', "Organizations We've Built For") }}</h2>
        </div>

        @if ($clients->isEmpty())
            <p class="text-center">Client information will be listed here soon.</p>
        @else
            <div class="orion-clients-grid">
                @foreach ($clients as $client)
                    <div class="orion-client-card">
                        <img src="{{ $client->hasMedia('clients') ? $client->getFirstMediaUrl('clients') : asset('orionFrontAssets/assets/images/clinets/' . $client->logo) }}"
                            alt="{{ $client->name }} logo" loading="lazy">
                        <div class="orion-client-card__name">{{ $client->name }}</div>
                        @if ($client->projects_count > 0)
                            <div class="orion-client-card__count">{{ $client->projects_count }} {{ Str::plural('project', $client->projects_count) }} completed</div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection
