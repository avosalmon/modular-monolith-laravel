<?php

declare(strict_types=1);

namespace Laracon\Shipping\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Laracon\Order\Contracts\Events\OrderFulfilled;
use Laracon\Shipping\Domain\Listeners\NotifyWarehouse;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        OrderFulfilled::class => [
            NotifyWarehouse::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
