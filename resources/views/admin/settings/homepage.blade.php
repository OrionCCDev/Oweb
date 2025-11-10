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
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                    <input type="text" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                    <input type="text" name="hero_subtitle" value="{{ $settings['hero_subtitle'] ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Video URL</label>
                    <input type="url" name="hero_video" value="{{ $settings['hero_video'] ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
        </div>
        
        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">About Section</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">About Title</label>
                    <input type="text" name="about_title" value="{{ $settings['about_title'] ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">About Description</label>
                    <textarea name="about_description" rows="4" class="w-full px-4 py-2 border rounded-lg">{{ $settings['about_description'] ?? '' }}</textarea>
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
                    <input type="text" name="services_title" value="{{ $settings['services_title'] ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Services Description</label>
                    <textarea name="services_description" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ $settings['services_description'] ?? '' }}</textarea>
                </div>
            </div>
        </div>
        
        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">Projects Section</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Projects Title</label>
                    <input type="text" name="projects_title" value="{{ $settings['projects_title'] ?? '' }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Projects Description</label>
                    <textarea name="projects_description" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ $settings['projects_description'] ?? '' }}</textarea>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
