@extends('layouts.admin')
@section('title', 'Homepage Sections')
@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-2">
        <h2 class="text-2xl font-bold">Homepage Sections</h2>
        <a href="{{ route('home') }}" target="_blank" class="text-sm text-blue-600 hover:underline">View live site →</a>
    </div>
    <p class="text-sm text-gray-500 mb-6">Every section on the homepage, top to bottom. Click a section to edit just that part.</p>

    <div class="space-y-3">

        <a href="{{ route('admin.settings.hero') }}" class="block bg-white rounded-lg shadow p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400">1</span>
                    <h3 class="text-base font-semibold text-gray-900">Hero</h3>
                    <p class="text-sm text-gray-500">Title, subtitle, eyebrow, background video &amp; image</p>
                </div>
                <span class="text-gray-400">→</span>
            </div>
        </a>

        <a href="{{ route('admin.settings.stats-bar') }}" class="block bg-white rounded-lg shadow p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400">2</span>
                    <h3 class="text-base font-semibold text-gray-900">Stats Bar</h3>
                    <p class="text-sm text-gray-500">The 4 numbers under the hero (years, projects, sectors, and a custom one)</p>
                </div>
                <span class="text-gray-400">→</span>
            </div>
        </a>

        <a href="{{ route('admin.home-features.index') }}" class="block bg-white rounded-lg shadow p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400">3</span>
                    <h3 class="text-base font-semibold text-gray-900">Feature Cards</h3>
                    <p class="text-sm text-gray-500">The 4 icon cards ("Quality Assurance", "Timely Delivery"...) — catalog</p>
                </div>
                <span class="text-gray-400">→</span>
            </div>
        </a>

        <a href="{{ route('admin.settings.projects-section') }}" class="block bg-white rounded-lg shadow p-5 hover:shadow-md transition ring-2 ring-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400">4</span>
                    <h3 class="text-base font-semibold text-gray-900">Projects Section</h3>
                    <p class="text-sm text-gray-500">Heading text here — the project cards themselves (image, status, sector, title) are in <span class="text-blue-600 font-medium">Catalog → Projects</span></p>
                </div>
                <span class="text-gray-400">→</span>
            </div>
        </a>

        <a href="{{ route('admin.settings.about-section') }}" class="block bg-white rounded-lg shadow p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400">5</span>
                    <h3 class="text-base font-semibold text-gray-900">Founders Message</h3>
                    <p class="text-sm text-gray-500">Tagline, title, two paragraphs, commitment statement</p>
                </div>
                <span class="text-gray-400">→</span>
            </div>
        </a>

        <a href="{{ route('admin.content.edit', 'home_video') }}" class="block bg-white rounded-lg shadow p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400">6</span>
                    <h3 class="text-base font-semibold text-gray-900">Video Section</h3>
                    <p class="text-sm text-gray-500">"Best Of The Best Managers" — title, YouTube link, background image</p>
                </div>
                <span class="text-gray-400">→</span>
            </div>
        </a>

        <a href="{{ route('admin.content.edit', 'home_sectors') }}" class="block bg-white rounded-lg shadow p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400">7</span>
                    <h3 class="text-base font-semibold text-gray-900">Sectors Carousel</h3>
                    <p class="text-sm text-gray-500">Heading text here — the sector cards are in <span class="text-blue-600 font-medium">Catalog → Sectors</span></p>
                </div>
                <span class="text-gray-400">→</span>
            </div>
        </a>

        <a href="{{ route('admin.settings.cta-banner') }}" class="block bg-white rounded-lg shadow p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400">8</span>
                    <h3 class="text-base font-semibold text-gray-900">CTA Banner</h3>
                    <p class="text-sm text-gray-500">"Need Orion Help?" banner right before the footer</p>
                </div>
                <span class="text-gray-400">→</span>
            </div>
        </a>

        <a href="{{ route('admin.content.edit', 'home_clients') }}" class="block bg-white rounded-lg shadow p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400">9</span>
                    <h3 class="text-base font-semibold text-gray-900">Clients Section</h3>
                    <p class="text-sm text-gray-500">Heading text here — the client logos are in <span class="text-blue-600 font-medium">Catalog → Clients</span></p>
                </div>
                <span class="text-gray-400">→</span>
            </div>
        </a>

        <a href="{{ route('admin.gallery-images.index') }}" class="block bg-white rounded-lg shadow p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400">10</span>
                    <h3 class="text-base font-semibold text-gray-900">Gallery Strip</h3>
                    <p class="text-sm text-gray-500">The scrolling image strip near the bottom — catalog</p>
                </div>
                <span class="text-gray-400">→</span>
            </div>
        </a>

    </div>
</div>
@endsection
