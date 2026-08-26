@extends('layouts.admin')
@section('title', 'Site Logo')
@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-2">Site Logo</h2>
    <p class="text-sm text-gray-500 mb-6">One upload controls the logo everywhere it appears on the site — header, footer, mobile menu, admin sidebar, browser favicon, and social share previews. Each placement is automatically resized from what you upload.</p>

    @if ($setting->hasMedia('logo'))
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Current logo — how it looks in each placement</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="text-center">
                    <div class="h-20 flex items-center justify-center bg-gray-900 rounded border p-2">
                        <img src="{{ $setting->getFirstMediaUrl('logo', 'web') }}" alt="Header preview" class="max-h-full max-w-full">
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Header / Footer</p>
                </div>
                <div class="text-center">
                    <div class="h-20 flex items-center justify-center bg-white rounded border p-2">
                        <img src="{{ $setting->getFirstMediaUrl('logo', 'favicon_180') }}" alt="Favicon preview" class="max-h-full max-w-full">
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Favicon (180×180)</p>
                </div>
                <div class="text-center">
                    <div class="h-20 flex items-center justify-center bg-white rounded border p-2">
                        <img src="{{ $setting->getFirstMediaUrl('logo', 'favicon_32') }}" alt="Favicon preview small" class="max-h-full max-w-full">
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Browser tab (32×32)</p>
                </div>
                <div class="text-center">
                    <div class="h-20 flex items-center justify-center bg-gray-100 rounded border p-2">
                        <img src="{{ $setting->getFirstMediaUrl('logo') }}" alt="Original upload" class="max-h-full max-w-full">
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Original upload</p>
                </div>
            </div>
        </div>
    @else
        <div class="bg-blue-50 border border-blue-200 text-blue-800 text-sm px-4 py-3 rounded-lg mb-6">
            No logo uploaded yet — the site is showing its default built-in logo everywhere. Upload one below to replace it.
        </div>
    @endif

    <form action="{{ route('admin.settings.logo.update') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Upload New Logo</label>
            <input type="file" name="logo" accept="image/png,image/jpeg,image/webp" class="w-full px-4 py-2 border rounded-lg">
            <p class="text-sm text-gray-500 mt-1">PNG or WebP with a transparent background works best, since the header and footer show it on a dark background. Max 5MB.</p>
        </div>

        @if ($setting->hasMedia('logo'))
            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remove_logo" value="1">
                Remove current logo and revert to the site's default
            </label>
        @endif

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
