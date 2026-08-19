@extends('layouts.admin')
@section('title', 'Edit Client')
@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Edit Client: {{ $client->name }}</h2>
    <form action="{{ route('admin.clients.update', $client) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 space-y-6">
        @csrf
        @method('PATCH')
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
            <input type="text" name="name" value="{{ $client->name }}" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded-lg">{{ $client->description }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Website URL</label>
            <input type="url" name="website_url" value="{{ old('website_url', $client->website_url) }}" placeholder="https://example.com" class="w-full px-4 py-2 border rounded-lg">
            <p class="text-sm text-gray-500 mt-1">If set, the client's logo links out to their site on the homepage.</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $client->sort_order) }}" min="0" class="w-full px-4 py-2 border rounded-lg">
            <p class="text-sm text-gray-500 mt-1">Lower numbers show first (top-left) in the homepage client grid.</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
            @if ($client->hasMedia('clients'))
                <img src="{{ $client->getFirstMediaUrl('clients') }}" alt="{{ $client->name }}" class="w-32 h-20 object-contain mb-2 border rounded p-2 bg-gray-50">
                <label class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                    <input type="checkbox" name="remove_logo" value="1">
                    Remove current logo
                </label>
            @endif
            <input type="file" name="logo" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
            <p class="text-sm text-gray-500 mt-1">Uploading a new logo replaces the current one.</p>
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.clients.index') }}" class="px-6 py-2 bg-gray-200 rounded-lg">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg">Update</button>
        </div>
    </form>
</div>
@endsection
