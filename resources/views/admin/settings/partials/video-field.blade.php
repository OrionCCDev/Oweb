@php
    // A video setting holds either a link (hosted elsewhere) or a path on the
    // public disk (uploaded here). Resolve whichever it is so the admin always
    // previews exactly what visitors are seeing right now.
    $isUrl = $current && \Illuminate\Support\Str::startsWith($current, ['http://', 'https://', '//']);
    $currentSrc = $current
        ? ($isUrl ? $current : \Illuminate\Support\Facades\Storage::disk('public')->url($current))
        : asset($fallbackAsset);
    $maxKb = max_upload_kb();
    $maxMb = round($maxKb / 1024, 1);
@endphp

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">{{ $label }}</label>

    @if (!$current)
        <p class="text-sm text-gray-500 mb-2">Currently playing the built-in default video (nothing custom set):</p>
    @elseif ($isUrl)
        <p class="text-sm text-gray-500 mb-2">Currently playing a linked video:</p>
    @else
        <p class="text-sm text-gray-500 mb-2">Currently playing an uploaded video:</p>
    @endif

    <video src="{{ $currentSrc }}" muted playsinline controls preload="metadata" class="w-64 rounded mb-3 border"></video>

    <div class="space-y-3">
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Upload a video file</label>
            <input type="file" name="{{ $key }}_file" accept="video/mp4,video/webm,video/ogg" class="w-full px-4 py-2 border rounded-lg">
            <p class="text-xs text-gray-500 mt-1">MP4 works everywhere. This server accepts files up to <strong>{{ $maxMb }} MB</strong>.</p>
            @error($key . '_file')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">…or paste a link to a video hosted elsewhere</label>
            <input type="url" name="{{ $key }}_url" value="{{ old($key . '_url', $isUrl ? $current : '') }}" placeholder="https://example.com/video.mp4" class="w-full px-4 py-2 border rounded-lg">
            <p class="text-xs text-gray-500 mt-1">Best for anything larger than {{ $maxMb }} MB — it also keeps the file off this server. Uploading a file above replaces this link.</p>
            @error($key . '_url')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>

        @if ($current)
            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="{{ $key }}_remove" value="1">
                Remove this and go back to the built-in default video
            </label>
        @endif
    </div>

    @if (!empty($help))
        <p class="text-sm text-gray-500 mt-2">{{ $help }}</p>
    @endif
</div>
