<?php

declare(strict_types=1);

namespace Laracon\Order\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laracon\Order\Domain\Exceptions\TaxRateNotFoundException;
use Laracon\Order\Infrastructure\Database\Factories\TaxRateFactory;

class TaxRate extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return TaxRateFactory::new();
    }

    /**
     * Get the current tax rate.
     *
     * @return self
     * @throws \Laracon\Order\Domain\Exceptions\TaxRateNotFoundException
     */
    public static function current(): self
    {
        $now = now();

        $rate = self::where('start_at', '<=', $now)
            ->where('end_at', '>=', $now)
            ->first();

        if (!$rate) {
            throw new TaxRateNotFoundException();
        }

        return $rate;
    }
}
