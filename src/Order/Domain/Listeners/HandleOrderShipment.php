<?php

declare(strict_types=1);

namespace Laracon\Order\Domain\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laracon\Shipping\Contracts\Events\ParcelShipped;

class HandleOrderShipment
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Laracon\Shipping\Contracts\Events\ParcelShipped $event
     * @return void
     */
    public function handle(ParcelShipped $event)
    {
        // do something
    }
}
