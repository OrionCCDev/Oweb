@extends('layouts.admin')
@section('title', 'Add Setting')
@section('content')
<div class="max-w-2xl mx-auto">
    <a href="{{ route('admin.settings.index') }}" class="text-sm text-blue-600 hover:underline mb-4 inline-block">← All Settings</a>
    <h2 class="text-2xl font-bold mb-6">Add Setting</h2>

    <form action="{{ route('admin.settings.store') }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Key *</label>
            <input type="text" name="key" value="{{ old('key') }}" required class="w-full px-4 py-2 border rounded-lg" placeholder="e.g. custom_banner_text">
            <p class="text-sm text-gray-500 mt-1">Used in code as <code>setting('{{ old('key', 'your_key') }}')</code>. Must be unique.</p>
            @error('key')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Type *</label>
            <select name="type" class="w-full px-4 py-2 border rounded-lg">
                <option value="text" @selected(old('type') === 'text')>Text</option>
                <option value="textarea" @selected(old('type') === 'textarea')>Textarea</option>
                <option value="image" @selected(old('type') === 'image')>Image (path)</option>
                <option value="video" @selected(old('type') === 'video')>Video (URL)</option>
                <option value="file" @selected(old('type') === 'file')>File (path)</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Value</label>
            <textarea name="value" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ old('value') }}</textarea>
            <p class="text-sm text-gray-500 mt-1">For "Image" or "File" types, this should be a storage path (e.g. <code>settings/xyz.jpg</code>), not an upload — set those from the dedicated pages (Homepage Sections, Site Logo, etc.) where possible.</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Group</label>
            <input type="text" name="group" value="{{ old('group') }}" class="w-full px-4 py-2 border rounded-lg" placeholder="e.g. misc">
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.settings.index') }}" class="px-6 py-2 bg-gray-200 rounded-lg">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg">Create</button>
        </div>
    </form>
</div>
@endsection
