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
    <input type="text" name="title" value="{{ old('title', $feature->title ?? '') }}" required class="w-full px-4 py-2 border rounded-lg" placeholder="Quality Assurance">
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
    <input type="text" name="subtitle" value="{{ old('subtitle', $feature->subtitle ?? '') }}" class="w-full px-4 py-2 border rounded-lg" placeholder="Top-notch craftsmanship">
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
    <input type="number" name="sort_order" value="{{ old('sort_order', $feature->sort_order ?? 0) }}" min="0" class="w-full px-4 py-2 border rounded-lg">
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
    @isset($feature)
        @if ($feature->hasMedia('icon'))
            <img src="{{ $feature->getFirstMediaUrl('icon') }}" alt="" class="w-16 h-16 object-contain mb-2 border rounded p-2">
        @endif
    @endisset
    <input type="file" name="icon" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
</div>
