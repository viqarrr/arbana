<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Information;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        if (!request()->is('admin/*')) {
            View::share('contacts', Contact::all());
            View::share('information', Information::first());
        }
    }
}
