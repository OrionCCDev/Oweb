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
