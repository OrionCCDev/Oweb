<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;

class FilesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('files', function ($app) {
            return new Filesystem;
        });
    }
}
