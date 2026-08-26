<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Setting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    /**
     * The single site-wide logo lives on the Setting row with
     * key = 'site_logo' (see the site_logo() helper below). One upload,
     * every placement (header, footer, favicons, social previews) reads
     * from the same media item via named conversions.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();
    }

    /**
     * nonQueued() on every conversion here: the logo is shown on nearly
     * every page (including the favicon), so it can't be left broken
     * until a queue worker happens to process it - and this shared
     * hosting deployment has no queue worker running. Generating
     * synchronously on upload means it's always correct immediately.
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('web')
            ->width(600)
            ->format('webp')
            ->nonQueued()
            ->performOnCollections('logo');

        $this->addMediaConversion('favicon_180')
            ->fit(Fit::Contain, 180, 180)
            ->format('png')
            ->nonQueued()
            ->performOnCollections('logo');

        $this->addMediaConversion('favicon_32')
            ->fit(Fit::Contain, 32, 32)
            ->format('png')
            ->nonQueued()
            ->performOnCollections('logo');

        $this->addMediaConversion('favicon_16')
            ->fit(Fit::Contain, 16, 16)
            ->format('png')
            ->nonQueued()
            ->performOnCollections('logo');
    }

    /**
     * Get a setting value by key
     */
    public static function get($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value
     */
    public static function set($key, $value, $type = 'text', $group = null)
    {
        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'group' => $group,
            ]
        );
    }

    /**
     * Get all settings by group
     */
    public static function getByGroup($group)
    {
        return static::where('group', $group)->get()->pluck('value', 'key');
    }
}
