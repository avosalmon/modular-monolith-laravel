<?php

declare(strict_types=1);

namespace Laracon\Shipping\Domain\Listeners;

use Illuminate\Support\Facades\Log;
use Laracon\Order\Contracts\Events\OrderFulfilled;

class NotifyWarehouse
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
     * @param  \Laracon\Order\Contracts\Events\OrderFulfilled  $event
     * @return void
     */
    public function handle(OrderFulfilled $event)
    {
        Log::info('NotifyWarehouse: '.$event->orderId);

        // notify warehouse system
    }
}
