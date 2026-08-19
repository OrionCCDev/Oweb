@extends('layouts.admin')
@section('title', 'Projects Section')
@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('admin.settings.homepage') }}" class="text-sm text-blue-600 hover:underline mb-4 inline-block">← Homepage Sections</a>
    <h2 class="text-2xl font-bold mb-6">Projects Section</h2>

    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-blue-900">Looking for the project cards themselves? (image, status, sector, title)</p>
            <p class="text-sm text-blue-700">This page only controls the heading text above them. Each card's own content lives in the Projects catalog.</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="shrink-0 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm font-medium">Manage Projects →</a>
    </div>

    <form action="{{ route('admin.settings.projects-section.update') }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-4">
        @csrf
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
        <p class="text-sm text-gray-500">The projects shown here are the ones marked "Priority" highest, up to 9.</p>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
