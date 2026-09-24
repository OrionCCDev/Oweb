<?php

use App\Helpers\SEOHelper;
use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Get a dashboard-editable setting value, with a fallback for when
     * the admin hasn't set one yet (or the settings table is empty).
     */
    function setting(string $key, ?string $default = null): ?string
    {
        return Setting::get($key, $default);
    }
}

if (!function_exists('setting_image')) {
    /**
     * Resolve a dashboard-uploaded 'image' type setting to a public URL,
     * falling back to a static asset path if the admin hasn't uploaded one.
     */
    function setting_image(string $key, string $fallbackAssetPath): string
    {
        $value = Setting::get($key);

        if ($value) {
            return \Illuminate\Support\Facades\Storage::disk('public')->url($value);
        }

        return asset($fallbackAssetPath);
    }
}

if (!function_exists('site_logo_url')) {
    /**
     * Resolve the admin-uploaded site logo for a given placement
     * (conversion name from Setting::registerMediaConversions()), falling
     * back to the current static asset until the admin uploads one -
     * every call site keeps its own current fallback so nothing visibly
     * changes until the admin actively replaces the logo.
     */
    function site_logo_url(string $conversion, string $fallbackAssetPath): string
    {
        static $setting = null;
        static $loaded = false;

        if (!$loaded) {
            $setting = \App\Models\Setting::where('key', 'site_logo')->first();
            $loaded = true;
        }

        if ($setting && $setting->hasMedia('logo')) {
            return $setting->getFirstMediaUrl('logo', $conversion);
        }

        return asset($fallbackAssetPath);
    }
}

if (!function_exists('resolve_project_image')) {
    /**
     * Resolve a project's card thumbnail. Checks a few legacy filename
     * locations on the 'projects' disk before falling back to a static
     * asset path - projects imported before the media library conversion
     * only have a plain filename column, not a media collection.
     */
    function resolve_project_image(\App\Models\Project $project): string
    {
        $name = $project->main_image ?: ($project->gif ?: 'main.webp');
        $candidates = [$name];
        if ($name && !str_contains($name, '/')) {
            $candidates[] = $project->slug_name . '/' . $name;
            $candidates[] = $project->slug_name . '/gallery/' . $name;
        }

        // The thumbnail is saved as main.{ext} and overwritten in place on
        // re-upload, so browsers caching it would keep showing the old one.
        // Stamp it with the project's last update to force a fresh copy.
        $version = $project->updated_at ? '?v=' . $project->updated_at->timestamp : '';

        foreach (array_unique($candidates) as $candidate) {
            if (\Illuminate\Support\Facades\Storage::disk('projects')->exists($candidate)) {
                return \Illuminate\Support\Facades\Storage::disk('projects')->url($candidate) . $version;
            }
        }
        return asset('orionFrontAssets/assets/images/project/' . $project->slug_name . '/' . $name) . $version;
    }
}

if (!function_exists('resolve_client_logo')) {
    /**
     * Resolve a client's logo. Clients imported before the media library
     * conversion only have a plain filename in the legacy 'logo' column.
     */
    function resolve_client_logo(\App\Models\Client $client): ?string
    {
        if ($client->hasMedia('clients')) {
            return $client->getFirstMediaUrl('clients');
        }

        if ($client->logo) {
            return asset('orionFrontAssets/assets/images/clinets/' . $client->logo);
        }

        return null;
    }
}

if (!function_exists('resolve_sector_photo')) {
    /**
     * Resolve a sector's photo. Sectors imported before the media library
     * conversion only have a plain filename in the legacy 'photo' column.
     */
    function resolve_sector_photo(\App\Models\Sector $sector): ?string
    {
        if ($sector->hasMedia('sectors')) {
            return $sector->getFirstMediaUrl('sectors');
        }

        if ($sector->photo) {
            return asset('orionFrontAssets/assets/images/sectors/' . $sector->photo);
        }

        return null;
    }
}

if (!function_exists('resolve_event_image')) {
    /**
     * Resolve an event's main image. Events imported before the media
     * library conversion only have a plain filename in the legacy
     * 'main_image' column.
     */
    function resolve_event_image(\App\Models\Event $event): ?string
    {
        if ($event->hasMedia('events')) {
            return $event->getFirstMediaUrl('events');
        }

        if ($event->main_image) {
            return asset('orionFrontAssets/assets/images/blog/' . $event->main_image);
        }

        return null;
    }
}

if (!function_exists('asset_v')) {
    /**
     * asset() plus a ?v=<last-modified> stamp, for the site's own CSS/JS
     * that gets edited. Lets the server tell browsers to cache these for a
     * long time: the URL changes the moment the file does, so visitors
     * never get stuck on a stale stylesheet after a deploy.
     */
    function asset_v(string $path): string
    {
        $file = public_path($path);

        return asset($path) . (is_file($file) ? '?v=' . filemtime($file) : '');
    }
}

if (!function_exists('setting_video')) {
    /**
     * Resolve a dashboard-managed video setting. The stored value is either
     * a full URL (video hosted elsewhere) or a path on the public disk (an
     * uploaded file), so handle both and fall back to the built-in asset
     * until an admin sets one.
     */
    function setting_video(string $key, string $fallbackAssetPath): string
    {
        $value = Setting::get($key);

        if (!$value) {
            return asset($fallbackAssetPath);
        }

        if (\Illuminate\Support\Str::startsWith($value, ['http://', 'https://', '//'])) {
            return $value;
        }

        return \Illuminate\Support\Facades\Storage::disk('public')->url($value);
    }
}

if (!function_exists('max_upload_kb')) {
    /**
     * The largest file this server will actually accept, in kilobytes.
     * PHP silently discards a POST larger than post_max_size (which then
     * surfaces as a confusing 419), so the real ceiling is the smaller of
     * the two limits - used for both validation and the dashboard hint.
     */
    function max_upload_kb(): int
    {
        $toBytes = function ($value): int {
            $value = trim((string) $value);
            if ($value === '') {
                return 0;
            }

            $number = (int) $value;
            return match (strtolower(substr($value, -1))) {
                'g' => $number * 1024 * 1024 * 1024,
                'm' => $number * 1024 * 1024,
                'k' => $number * 1024,
                default => $number,
            };
        };

        $limits = array_filter([
            $toBytes(ini_get('upload_max_filesize')),
            $toBytes(ini_get('post_max_size')),
        ]);

        return $limits ? (int) floor(min($limits) / 1024) : 51200;
    }
}

if (!function_exists('seo')) {
    /**
     * Get the SEO helper instance
     *
     * @return SEOHelper
     */
    function seo()
    {
        return app(SEOHelper::class);
    }
}
