<?php

declare(strict_types=1);

namespace Laracon\Order\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Laracon\Order\Domain\Models\Order;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('order', function ($value) {
            return Order::with('orderLines')->findOrFail($value);
        });

        // $this->app['router']->aliasMiddleware('do-something', \Laracon\Order\Application\Http\Middleware\SomeMiddleware::class);
    }
}
