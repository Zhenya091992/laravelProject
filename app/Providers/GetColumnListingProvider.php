<?php

namespace App\Providers;

use App\Contracts\GetColumnListingContract;
use Illuminate\Support\ServiceProvider;
use App\Services\GetColumnListing;

class GetColumnListingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GetColumnListingContract::class, function() {
            return new GetColumnListing();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
