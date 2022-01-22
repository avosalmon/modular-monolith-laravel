<?php

declare(strict_types=1);

namespace Laracon\Order\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Laracon\Order\Domain\Listeners\HandleOrderShipment;
use Laracon\Shipping\Contracts\Events\ParcelShipped;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ParcelShipped::class => [
            HandleOrderShipment::class,
        ],
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
