<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CartService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CartService::class, function ($app) {
            return new CartService();
        });
    }

    public function boot()
    {
        //
    }
}
