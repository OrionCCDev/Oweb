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
            </div>
        </div>
        
        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">Stats Bar</h3>
            <p class="text-sm text-gray-500 mb-4">The 4 numbers under the hero. "Years of Experience", "Projects Delivered" and "Sectors Served" are pre-filled with the live, auto-counted numbers — leave them alone to keep auto-updating, or type a fixed number to override.</p>

            <div class="space-y-4">
                @foreach ([1, 2, 3, 4] as $n)
                <div class="border rounded-lg p-4">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Item {{ $n }}</p>
                    <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Value</label>
                            <input type="text" name="stats_{{ $n }}_value" value="{{ $settings['stats_' . $n . '_value']->value ?? $defaults['stats_' . $n . '_value'] }}" class="w-full px-4 py-2 border rounded-lg">
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Suffix</label>
                            <input type="text" name="stats_{{ $n }}_suffix" value="{{ $settings['stats_' . $n . '_suffix']->value ?? $defaults['stats_' . $n . '_suffix'] }}" placeholder="e.g. +" class="w-full px-4 py-2 border rounded-lg">
                        </div>
                        <div class="md:col-span-3">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Label</label>
                            <input type="text" name="stats_{{ $n }}_label" value="{{ $settings['stats_' . $n . '_label']->value ?? $defaults['stats_' . $n . '_label'] }}" class="w-full px-4 py-2 border rounded-lg">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">About Section (Founders Message)</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tagline</label>
                    <input type="text" name="about_tagline" value="{{ $settings['about_tagline']->value ?? $defaults['about_tagline'] }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="about_title" value="{{ $settings['about_title']->value ?? $defaults['about_title'] }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Paragraph 1</label>
                    <textarea name="about_description_1" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ $settings['about_description_1']->value ?? $defaults['about_description_1'] }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Paragraph 2</label>
                    <textarea name="about_description_2" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ $settings['about_description_2']->value ?? $defaults['about_description_2'] }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Commitment Statement</label>
                    <input type="text" name="about_commitment_text" value="{{ $settings['about_commitment_text']->value ?? $defaults['about_commitment_text'] }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
        </div>
        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">Projects Section</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tagline (small line above the title)</label>
                    <input type="text" name="projects_tagline" value="{{ $settings['projects_tagline']->value ?? $defaults['projects_tagline'] }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Projects Title</label>
                    <input type="text" name="projects_title" value="{{ $settings['projects_title']->value ?? $defaults['projects_title'] }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Projects Description (optional, blank on the site right now)</label>
                    <textarea name="projects_description" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ $settings['projects_description']->value ?? '' }}</textarea>
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-2">The projects shown here are the ones marked "Priority" highest, up to 9 — manage individual projects (image, status, sector, title) under Catalog → Projects.</p>
        </div>

        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">CTA Banner ("Need Orion Help?")</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tagline</label>
                    <input type="text" name="cta_tagline" value="{{ $settings['cta_tagline']->value ?? $defaults['cta_tagline'] }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="contact_title" value="{{ $settings['contact_title']->value ?? $defaults['contact_title'] }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description (optional, blank on the site right now)</label>
                    <textarea name="contact_description" rows="2" class="w-full px-4 py-2 border rounded-lg">{{ $settings['contact_description']->value ?? '' }}</textarea>
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-2">The banner right before the footer, with a "Contact Us" button.</p>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
