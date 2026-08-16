@extends('layouts.admin')
@section('title', 'Homepage Gallery')
@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Homepage Gallery</h2>
        <a href="{{ route('admin.gallery-images.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">+ Add Image</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg">{{ session('success') }}</div>
    @endif

    <p class="text-sm text-gray-500">Images shown in the scrolling gallery strip near the bottom of the homepage.</p>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @forelse($images as $image)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="aspect-square bg-gray-100">
                    @if ($image->hasMedia('image'))
                        <img src="{{ $image->getFirstMediaUrl('image') }}" alt="{{ $image->caption }}" class="w-full h-full object-cover">
                    @endif
                </div>
                <div class="p-2 text-xs">
                    <div class="text-gray-500">Order: {{ $image->sort_order }}</div>
                    @if ($image->caption)
                        <div class="truncate">{{ $image->caption }}</div>
                    @endif
                    <div class="flex justify-between mt-1">
                        <a href="{{ route('admin.gallery-images.edit', $image) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <form action="{{ route('admin.gallery-images.destroy', $image) }}" method="POST" onsubmit="return confirm('Delete this image?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 py-8">No gallery images found.</div>
        @endforelse
    </div>
</div>
@endsection
