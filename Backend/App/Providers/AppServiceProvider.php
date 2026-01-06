<?php

namespace App\Providers;

use App\Repositories\Contracts\AddressRepositoryContract;
use App\Repositories\Eloquent\AddressRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            AddressRepositoryContract::class,
            AddressRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
