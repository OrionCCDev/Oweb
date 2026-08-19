@extends('layouts.admin')
@section('title', 'Stats Bar')
@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('admin.settings.homepage') }}" class="text-sm text-blue-600 hover:underline mb-4 inline-block">← Homepage Sections</a>
    <h2 class="text-2xl font-bold mb-6">Stats Bar</h2>
    <p class="text-sm text-gray-500 mb-6">The 4 numbers under the hero. "Years of Experience", "Projects Delivered" and "Sectors Served" are pre-filled with the live, auto-counted numbers — leave them alone to keep auto-updating, or type a fixed number to override.</p>

    <form action="{{ route('admin.settings.stats-bar.update') }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-4">
        @csrf
        @foreach ([1, 2, 3, 4] as $n)
        <div class="border rounded-lg p-4">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Item {{ $n }}</p>
            <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Value</label>
                    <input type="text" name="stats_{{ $n }}_value" value="{{ $settings['stats_' . $n . '_value']->value ?? $defaults['stats_' . $n . '_value'] }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div class="md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Suffix</label>
                    <input type="text" name="stats_{{ $n }}_suffix" value="{{ $settings['stats_' . $n . '_suffix']->value ?? $defaults['stats_' . $n . '_suffix'] }}" placeholder="e.g. +" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div class="md:col-span-3">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Label</label>
                    <input type="text" name="stats_{{ $n }}_label" value="{{ $settings['stats_' . $n . '_label']->value ?? $defaults['stats_' . $n . '_label'] }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
        </div>
        @endforeach

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>
@endsection
