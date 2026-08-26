<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\FileAdder;

class Project extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('flipster')
            ->withResponsiveImages()
            ->useDisk('projects');

        $this->addMediaCollection('mini_gallary')
            ->withResponsiveImages()
            ->useDisk('projects');
    }

    /**
     * nonQueued(): this hosting has no queue worker running, so a queued
     * conversion never actually generates and getFirstMediaUrl() ends up
     * pointing at a file that doesn't exist. Generating synchronously on
     * upload means the conversion is always there when a view needs it.
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('flip_out')
            ->width(350)
            ->height(380)
            ->withResponsiveImages()
            ->nonQueued()
            ->performOnCollections('flipster');

        $this->addMediaConversion('flip_out_low')
            ->width(350)
            ->height(380)
            ->quality(70)
            ->nonQueued()
            ->performOnCollections('flipster');

        $this->addMediaConversion('mini_gallary_out')
            ->width(770)
            ->height(340)
            ->nonQueued()
            ->performOnCollections('mini_gallary');
    }

    public function Client(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }
    public function Sector(){
        return $this->belongsTo(Sector::class , 'sector_id' , 'id');
    }
    public function points(){
        return $this->hasMany(ProjectPoint::class , 'project_id' , 'id');
    }

    public function gallaries(){
        return $this->hasMany(ProjectGallary::class , 'project_id' , 'id');
    }

    public function details(){
        return $this->hasMany(ProjectDetail::class , 'project_id' , 'id')->orderBy('sort_order');
    }
}
