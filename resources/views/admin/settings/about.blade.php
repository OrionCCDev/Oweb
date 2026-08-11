@extends('layouts.admin')
@section('title', 'About Page Settings')
@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">About Page</h2>
    <form action="{{ route('admin.settings.about.update') }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-6">
        @csrf
        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">Intro Section</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Intro Title</label>
                    <input type="text" name="about_intro_title" value="{{ $settings['about_intro_title'] ?? '' }}" placeholder="Welcome to Orion Contracting Company" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Intro Text</label>
                    <textarea name="about_intro_text" rows="4" class="w-full px-4 py-2 border rounded-lg">{{ $settings['about_intro_text'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <div class="border-b pb-4">
            <h3 class="text-lg font-semibold mb-4">Mission &amp; Vision</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mission Statement</label>
                    <textarea name="about_mission" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ $settings['about_mission'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Vision Statement</label>
                    <textarea name="about_vision" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ $settings['about_vision'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
