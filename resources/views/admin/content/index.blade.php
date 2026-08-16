@extends('layouts.admin')
@section('title', 'Page Content')
@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div>
        <h2 class="text-2xl font-bold">Page Content</h2>
        <p class="text-sm text-gray-500 mt-1">Text and images for individual sections across the site. Repeatable content (features, gallery, projects, sectors, etc.) has its own page in the sidebar.</p>
    </div>

    <div class="bg-white rounded-lg shadow divide-y divide-gray-200">
        @foreach ($groups as $definition)
            <a href="{{ route('admin.content.edit', $definition['group']) }}" class="flex items-center justify-between px-6 py-4 hover:bg-gray-50">
                <div>
                    <div class="font-medium text-gray-900">{{ $definition['label'] }}</div>
                    <div class="text-xs text-gray-500 mt-0.5">{{ collect($definition['fields'])->pluck('label')->join(', ') }}</div>
                </div>
                <span class="text-blue-600 text-sm">Edit &rarr;</span>
            </a>
        @endforeach
    </div>
</div>
@endsection
