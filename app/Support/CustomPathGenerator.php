<?php

namespace App\Support;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class CustomPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        $model = $media->model;

        // Get the project slug
        $projectSlug = $model->slug_name ?? 'default';

        // Determine subfolder based on collection name
        $subfolder = $media->collection_name === 'flipster' ? 'images' : 'gallery';

        return "projects/{$projectSlug}/{$subfolder}/";
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media) . 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive/';
    }
}
