<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Redirect;
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
        Redirect::macro('basedOnRole', function ($user) {

    return match ($user->role) {

        'admin' => redirect()->route('admin.dashboard'),

        'organization' => redirect()->route('organization.dashboard'),

        default => redirect()->route('volunteer.dashboard'),
    };
});
    }
}
