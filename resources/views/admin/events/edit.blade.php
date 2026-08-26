@extends('layouts.admin')
@section('title', 'Edit Event')
@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Edit Event: {{ $event->title }}</h2>
    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 space-y-6">
        @csrf
        @method('PATCH')
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
            <input type="text" name="title" value="{{ old('title', $event->title) }}" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Mini Description</label>
            <textarea name="mini_description" rows="2" class="w-full px-4 py-2 border rounded-lg">{{ old('mini_description', $event->mini_description) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="6" class="w-full px-4 py-2 border rounded-lg">{{ old('description', $event->description) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
            <input type="text" name="type" value="{{ old('type', $event->type) }}" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
            <input type="text" name="tags" value="{{ old('tags', $event->tags) }}" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Video URL</label>
            <input type="url" name="video_url" value="{{ old('video_url', $event->video_url) }}" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Main Image</label>
            @if (resolve_event_image($event))
                <img src="{{ resolve_event_image($event) }}" alt="{{ $event->title }}" class="w-40 h-28 object-cover rounded-lg mb-2 border">
            @endif
            <input type="file" name="main_image" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
            <p class="text-sm text-gray-500 mt-1">Uploading a new image replaces the current one.</p>
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.events.index') }}" class="px-6 py-2 bg-gray-200 rounded-lg">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg">Update</button>
        </div>
    </form>
</div>
@endsection
