<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Event extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('events')
            ->withResponsiveImages();

        // Extra photos shown as a lightbox gallery on the article page.
        $this->addMediaCollection('gallery');
    }

    /**
     * Gallery photos are often multi-MB camera originals, so the grid on the
     * article page shows a small thumbnail and only the lightbox loads the
     * full image. nonQueued(): this host runs no queue worker, so a queued
     * conversion would never be generated.
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(600)
            ->format('webp')
            ->nonQueued()
            ->performOnCollections('gallery');
    }
}
