<?php

return [
    App\Providers\AppServiceProvider::class,

    // composer.json excludes spatie/laravel-medialibrary from package
    // discovery, so register its provider here. Without it the observer that
    // deletes a media item's files never runs, and every replaced or removed
    // image (logos, photos, galleries) was left orphaned on disk.
    Spatie\MediaLibrary\MediaLibraryServiceProvider::class,
];
