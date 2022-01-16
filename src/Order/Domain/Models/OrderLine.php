<?php

declare(strict_types=1);

namespace Laracon\Order\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    public function subtotal(): int
    {
        return $this->price * $this->quantity;
    }
}
