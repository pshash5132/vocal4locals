<?php

namespace App\Providers;

use App\Models\CompanyDetails;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if(env('APP_ENV') !== 'local') {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
       }
        //
        $company = CompanyDetails::first();

        View::composer('*', function ($view) use ($company) {
            $view->with('company', $company);
        });
    }
}