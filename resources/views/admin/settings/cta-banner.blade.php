@extends('layouts.admin')
@section('title', 'CTA Banner')
@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('admin.settings.homepage') }}" class="text-sm text-blue-600 hover:underline mb-4 inline-block">← Homepage Sections</a>
    <h2 class="text-2xl font-bold mb-6">CTA Banner ("Need Orion Help?")</h2>
    <p class="text-sm text-gray-500 mb-6">The banner right before the footer, with a "Contact Us" button.</p>

    <form action="{{ route('admin.settings.cta-banner.update') }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-4">
        @csrf
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

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
