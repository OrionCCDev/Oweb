@extends('layouts.admin')
@section('title', 'Edit Setting')
@section('content')
<div class="max-w-2xl mx-auto">
    <a href="{{ route('admin.settings.index') }}" class="text-sm text-blue-600 hover:underline mb-4 inline-block">← All Settings</a>
    <h2 class="text-2xl font-bold mb-6">Edit Setting: {{ $setting->key }}</h2>

    <form action="{{ route('admin.settings.update', $setting) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 space-y-4">
        @csrf
        @method('PATCH')
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Key</label>
            <input type="text" value="{{ $setting->key }}" disabled class="w-full px-4 py-2 border rounded-lg bg-gray-50 text-gray-500">
            <p class="text-sm text-gray-500 mt-1">The key can't be changed after creation.</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Type *</label>
            <select name="type" class="w-full px-4 py-2 border rounded-lg">
                <option value="text" @selected(old('type', $setting->type) === 'text')>Text</option>
                <option value="textarea" @selected(old('type', $setting->type) === 'textarea')>Textarea</option>
                <option value="image" @selected(old('type', $setting->type) === 'image')>Image (path)</option>
                <option value="video" @selected(old('type', $setting->type) === 'video')>Video (URL)</option>
                <option value="file" @selected(old('type', $setting->type) === 'file')>File (path)</option>
            </select>
        </div>

        @if ($setting->type === 'image')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                @if ($setting->value)
                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($setting->value) }}" alt="{{ $setting->key }}" class="w-40 h-28 object-cover rounded-lg border mb-2" onerror="this.style.display='none'">
                @else
                    <p class="text-sm text-gray-500 mb-2">No image uploaded yet — the site is showing its built-in default.</p>
                @endif
                <input type="file" name="image_file" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
                <p class="text-sm text-gray-500 mt-1">Uploading here replaces the current image and updates the stored path below automatically.</p>
            </div>
        @endif

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Value {{ $setting->type === 'image' ? '(stored path)' : '' }}</label>
            <textarea name="value" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ old('value', $setting->value) }}</textarea>
            @if ($setting->type === 'image')
                <p class="text-sm text-gray-500 mt-1">Set automatically when you upload above — you normally shouldn't need to edit this by hand.</p>
            @endif
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Group</label>
            <input type="text" name="group" value="{{ old('group', $setting->group) }}" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.settings.index') }}" class="px-6 py-2 bg-gray-200 rounded-lg">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg">Update</button>
        </div>
    </form>
</div>
@endsection
