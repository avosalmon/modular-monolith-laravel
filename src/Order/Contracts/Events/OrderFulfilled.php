<?php

declare(strict_types=1);

namespace Laracon\Order\Contracts\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderFulfilled
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param  int $orderId
     * @return void
     */
    public function __construct(public readonly int $orderId) {}
}
