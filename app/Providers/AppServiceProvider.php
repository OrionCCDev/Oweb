<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

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
        // Gate for the entire /admin panel (sectors, events, clients, settings, projects).
        // Role-based: 'admin' and 'super_admin' both get in. The old
        // PROJECT_ADMIN_EMAILS env allowlist is kept as a fallback so an
        // account never loses access just because its role wasn't migrated.
        Gate::define('manage-projects', function ($user) {
            if ($user->isAdmin()) {
                return true;
            }

            $emailsEnv = (string) env('PROJECT_ADMIN_EMAILS', 'ahmed@orion.com');
            $allowedEmails = collect(explode(',', $emailsEnv))
                ->map(fn ($e) => trim(Str::lower($e)))
                ->filter()
                ->all();

            return in_array(Str::lower($user->email), $allowedEmails, true);
        });

        // Gate for managing OTHER admin accounts — super admins only.
        Gate::define('manage-admins', function ($user) {
            return $user->isSuperAdmin();
        });
    }
}
