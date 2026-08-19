@extends('layouts.admin')
@section('title', 'Hero Section')
@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('admin.settings.homepage') }}" class="text-sm text-blue-600 hover:underline mb-4 inline-block">← Homepage Sections</a>
    <h2 class="text-2xl font-bold mb-6">Hero Section</h2>
    <p class="text-sm text-gray-500 mb-6">The first thing visitors see — full-height banner with the title, subtitle, and background video/image.</p>

    <form action="{{ route('admin.settings.hero.update') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 space-y-4">
        @csrf
        <div class="border rounded-lg p-4">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">1. Content</p>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Eyebrow (small line above the title)</label>
                    <input type="text" name="hero_eyebrow" value="{{ $settings['hero_eyebrow']->value ?? $defaults['hero_eyebrow'] }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                    <input type="text" name="hero_title" value="{{ $settings['hero_title']->value ?? $defaults['hero_title'] }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                    <input type="text" name="hero_subtitle" value="{{ $settings['hero_subtitle']->value ?? $defaults['hero_subtitle'] }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-2">These fields show the text currently live on the site. Edit and save to change it.</p>
        </div>

        <div class="border rounded-lg p-4">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">2. Background Video</p>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Video Link</label>
                @if (!empty($settings['hero_video']->value ?? null))
                    <video src="{{ $settings['hero_video']->value }}" muted playsinline class="w-64 rounded mb-2 border" controls></video>
                @else
                    <p class="text-sm text-gray-500 mb-2">Currently playing the built-in default video (no custom link set):</p>
                    <video src="{{ asset('orionFrontAssets/assets/video/hero-bg-loop.mp4') }}" muted playsinline class="w-64 rounded mb-2 border" controls></video>
                @endif
                <input type="url" name="hero_video" value="{{ $settings['hero_video']->value ?? '' }}" placeholder="https://example.com/video.mp4" class="w-full px-4 py-2 border rounded-lg">
                <p class="text-sm text-gray-500 mt-1">Plays behind the hero title on larger screens. Leave blank to use the default background video.</p>
            </div>
        </div>

        <div class="border rounded-lg p-4">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">3. Background Image</p>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                @if (!empty($settings['hero_background_image']->value ?? null))
                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($settings['hero_background_image']->value) }}" alt="" class="w-48 h-28 object-cover rounded mb-2 border">
                @endif
                <input type="file" name="hero_background_image" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
                <p class="text-sm text-gray-500 mt-1">Shown while the video loads, and as the background on mobile / when motion is reduced.</p>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
