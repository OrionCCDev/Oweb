<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Orion Contracting Company') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'IBM Plex Sans', ui-sans-serif, system-ui, sans-serif; }
            .orion-guest-title { font-family: 'Space Grotesk', sans-serif; }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background: linear-gradient(180deg, #0A1628 0%, #0F2138 100%);">
            <div>
                <a href="/" class="flex flex-col items-center gap-2">
                    <img src="{{ asset('orionFrontAssets/assets/images/resources/logo-white.webp') }}" alt="Orion Contracting Company" class="h-14 w-auto">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white overflow-hidden" style="clip-path: polygon(0 0, calc(100% - 24px) 0, 100% 24px, 100% 100%, 0 100%); box-shadow: 0 20px 60px rgba(0,0,0,0.35);">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
