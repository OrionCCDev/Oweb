@php
    $pointsText = old('points', isset($certificate)
        ? collect($certificate->points ?? [])->map(fn ($p) => trim(($p['title'] ?? '') . '|' . ($p['text'] ?? '')))->implode("\n")
        : '');
@endphp

@if ($errors->any())
    <div class="bg-red-100 text-red-800 px-4 py-3 rounded-lg">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
    <input type="text" name="title" value="{{ old('title', $certificate->title ?? '') }}" required class="w-full px-4 py-2 border rounded-lg" placeholder="ISO 9001:2015">
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
    <input type="text" name="subtitle" value="{{ old('subtitle', $certificate->subtitle ?? '') }}" class="w-full px-4 py-2 border rounded-lg" placeholder="Quality management">
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
    <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded-lg">{{ old('description', $certificate->description ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Summary</label>
    <textarea name="summary" rows="4" class="w-full px-4 py-2 border rounded-lg">{{ old('summary', $certificate->summary ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Highlight Points</label>
    <textarea name="points" rows="5" class="w-full px-4 py-2 border rounded-lg font-mono text-sm" placeholder="Customer Focus|Meet and exceed customer expectations.">{{ $pointsText }}</textarea>
    <p class="text-xs text-gray-500 mt-1">One point per line, formatted as <code>Title|Description</code>.</p>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Closing Text</label>
    <textarea name="closing_text" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ old('closing_text', $certificate->closing_text ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
    <input type="number" name="sort_order" value="{{ old('sort_order', $certificate->sort_order ?? 0) }}" min="0" class="w-full px-4 py-2 border rounded-lg">
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Certificate Image</label>
    @isset($certificate)
        @if ($certificate->hasMedia('certificates'))
            <img src="{{ $certificate->getFirstMediaUrl('certificates') }}" alt="" class="w-32 h-32 object-cover rounded mb-2">
        @endif
    @endisset
    <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
</div>
