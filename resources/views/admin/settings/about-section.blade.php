@extends('layouts.admin')
@section('title', 'Founders Message')
@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('admin.settings.homepage') }}" class="text-sm text-blue-600 hover:underline mb-4 inline-block">← Homepage Sections</a>
    <h2 class="text-2xl font-bold mb-6">Founders Message</h2>
    <p class="text-sm text-gray-500 mb-6">The "Orion Founders Message" section, right after the feature cards.</p>

    <form action="{{ route('admin.settings.about-section.update') }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-4">
        @csrf
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

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
