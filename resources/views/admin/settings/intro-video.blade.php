@extends('layouts.admin')
@section('title', 'Intro Video')
@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('admin.settings.homepage') }}" class="text-sm text-blue-600 hover:underline mb-4 inline-block">← Homepage Sections</a>
    <h2 class="text-2xl font-bold mb-2">Intro Video</h2>
    <p class="text-sm text-gray-500 mb-6">The full-screen clip that plays once when someone first opens the homepage (they can skip it), and the same video behind the “Watch Our Story” button.</p>

    <form action="{{ route('admin.settings.intro-video.update') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 space-y-4">
        @csrf

        <div class="border rounded-lg p-4">
            @include('admin.settings.partials.video-field', [
                'key' => 'intro_video',
                'label' => 'Intro / Story Video',
                'current' => $settings['intro_video']->value ?? null,
                'fallbackAsset' => 'orionFrontAssets/assets/video/orion-story.mp4',
                'help' => 'Shown full-screen on first visit and in the “Watch Our Story” popup. Visitors only see the intro once per session.',
            ])
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
