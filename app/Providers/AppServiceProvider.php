<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use App\Models\Sector;
use App\Models\Event;
use App\Models\Project;
use App\Models\Client;
use App\Observers\HomepageCacheObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register observers to automatically clear homepage cache when data changes
        Sector::observe(HomepageCacheObserver::class);
        Event::observe(HomepageCacheObserver::class);
        Project::observe(HomepageCacheObserver::class);
        Client::observe(HomepageCacheObserver::class);

        // Define a simple ability for managing projects.
        // Admin emails are read from env PROJECT_ADMIN_EMAILS as a comma-separated list.
        Gate::define('manage-projects', function ($user) {
            $emailsEnv = (string) env('PROJECT_ADMIN_EMAILS', 'ahmed@orion.com');
            $allowedEmails = collect(explode(',', $emailsEnv))
                ->map(fn ($e) => trim(Str::lower($e)))
                ->filter()
                ->all();

            return in_array(Str::lower($user->email), $allowedEmails, true);
        });
    }
}
