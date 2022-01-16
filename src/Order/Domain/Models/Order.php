<?php

declare(strict_types=1);

namespace Laracon\Order\Domain\Models;

use Laracon\Order\Infrastructure\Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return OrderFactory::new();
    }

    public function orderLines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }

    public function orderHistories(): HasMany
    {
        return $this->hasMany(OrderHistory::class);
    }
}
