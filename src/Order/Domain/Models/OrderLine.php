<?php

declare(strict_types=1);

namespace Laracon\Order\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderLine extends Model
{
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function subtotal(): int
    {
        return $this->price * $this->quantity;
    }
}
