<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Password;

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
        // Strong password policy everywhere Password::defaults() is used
        // (registration is disabled, but this covers admin-user creation
        // and password resets): 12+ chars, mixed case, number, symbol,
        // and rejected if it appears in a known-breach list.
        Password::defaults(fn () => Password::min(12)
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised());

        // Gate for the entire /admin panel (sectors, events, clients,
        // settings, projects). Role-based: 'admin' and 'super_admin' get in.
        Gate::define('manage-projects', function ($user) {
            return $user->isAdmin();
        });

        // Gate for managing OTHER admin accounts — super admins only.
        Gate::define('manage-admins', function ($user) {
            return $user->isSuperAdmin();
        });
    }
}
