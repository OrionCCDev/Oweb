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
    <label class="block text-sm font-medium text-gray-700 mb-2">Caption</label>
    <input type="text" name="caption" value="{{ old('caption', $image->caption ?? '') }}" class="w-full px-4 py-2 border rounded-lg">
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
    <input type="number" name="sort_order" value="{{ old('sort_order', $image->sort_order ?? 0) }}" min="0" class="w-full px-4 py-2 border rounded-lg">
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Image @isset($image) @else * @endisset</label>
    @isset($image)
        @if ($image->hasMedia('image'))
            <img src="{{ $image->getFirstMediaUrl('image') }}" alt="" class="w-32 h-32 object-cover mb-2 rounded border">
        @endif
    @endisset
    <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border rounded-lg" {{ isset($image) ? '' : 'required' }}>
</div>
