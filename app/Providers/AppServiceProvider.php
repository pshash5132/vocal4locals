<?php

namespace App\Providers;

use App\Models\CompanyDetails;
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
        //
        $company = CompanyDetails::first();

        View::composer('*', function ($view) use ($company) {
            $view->with('company', $company);
        });
    }
}
