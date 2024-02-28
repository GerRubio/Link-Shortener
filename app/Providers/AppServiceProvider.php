<?php

namespace App\Providers;

use App\Contracts\UrlShortenerService;
use App\Services\TinyUrlShortenerService;
use App\Services\TokenValidationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(UrlShortenerService::class, TinyUrlShortenerService::class);
        $this->app->singleton(TokenValidationService::class, function ($app) {
            return new TokenValidationService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
