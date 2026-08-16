@extends('layouts.admin')
@section('title', $definition['label'])
@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">{{ $definition['label'] }}</h2>
        <a href="{{ route('home') }}" target="_blank" class="text-sm text-blue-600 hover:underline">View live site &rarr;</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 px-4 py-3 rounded-lg mb-6">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.content.update', $group) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 space-y-6">
        @csrf

        @foreach ($definition['fields'] as $field => $config)
            @php
                $current = optional($values[$field] ?? null)->value;
                $displayValue = old($field, $current ?? ($config['default'] ?? ''));
            @endphp
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ $config['label'] }}</label>

                @if ($config['type'] === 'textarea')
                    <textarea name="{{ $field }}" rows="4" class="w-full px-4 py-2 border rounded-lg">{{ $displayValue }}</textarea>

                @elseif ($config['type'] === 'image')
                    @if ($current)
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($current) }}" alt="" class="w-40 h-24 object-cover rounded mb-2 border">
                    @endif
                    <input type="file" name="{{ $field }}" accept="image/*" class="w-full px-4 py-2 border rounded-lg">

                @elseif ($config['type'] === 'url')
                    <input type="url" name="{{ $field }}" value="{{ $displayValue }}" class="w-full px-4 py-2 border rounded-lg">

                @else
                    <input type="text" name="{{ $field }}" value="{{ $displayValue }}" class="w-full px-4 py-2 border rounded-lg">
                @endif

                @if (!empty($config['help']))
                    <p class="text-xs text-gray-500 mt-1">{{ $config['help'] }}</p>
                @endif
            </div>
        @endforeach

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
