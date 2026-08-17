@extends('layouts.admin')
@section('title', 'Homepage Settings')
@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Homepage Sections</h2>
    <form action="{{ route('admin.settings.homepage.update') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 space-y-6">
        @csrf
        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">Hero Section</h3>

            <div class="space-y-4">
                <div class="border rounded-lg p-4">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">1. Content</p>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                            <input type="text" name="hero_title" value="{{ $settings['hero_title']->value ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                            <input type="text" name="hero_subtitle" value="{{ $settings['hero_subtitle']->value ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                        </div>
                    </div>
                </div>

                <div class="border rounded-lg p-4">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">2. Background Video</p>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Video Link</label>
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
            </div>
        </div>
        
        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">About Section</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">About Tagline</label>
                    <input type="text" name="about_tagline" value="{{ $settings['about_tagline']->value ?? '' }}" placeholder="You Dream We Build" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">About Title</label>
                    <input type="text" name="about_title" value="{{ $settings['about_title']->value ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">About Description</label>
                    <textarea name="about_description" rows="4" class="w-full px-4 py-2 border rounded-lg">{{ $settings['about_description']->value ?? '' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Commitment Statement</label>
                    <input type="text" name="about_commitment_text" value="{{ $settings['about_commitment_text']->value ?? '' }}" placeholder="Our unwavering commitment is to achieve the ultimate satisfaction of our clients" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">About Image</label>
                    <input type="file" name="about_image" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
        </div>
        
        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">Services Section</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Services Title</label>
                    <input type="text" name="services_title" value="{{ $settings['services_title']->value ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Services Description</label>
                    <textarea name="services_description" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ $settings['services_description']->value ?? '' }}</textarea>
                </div>
            </div>
        </div>
        
        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">Projects Section</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Projects Title</label>
                    <input type="text" name="projects_title" value="{{ $settings['projects_title']->value ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Projects Description</label>
                    <textarea name="projects_description" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ $settings['projects_description']->value ?? '' }}</textarea>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
