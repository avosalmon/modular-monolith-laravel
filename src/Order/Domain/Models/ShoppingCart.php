<?php

declare(strict_types=1);

namespace Laracon\Order\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShoppingCart extends Model
{
    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
