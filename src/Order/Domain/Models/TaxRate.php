<?php

declare(strict_types=1);

namespace Laracon\Order\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class TaxRate extends Model
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public static function current(): self
    {
        $now = now();

        $rate = self::where('start_at', '<=', $now)
            ->where('end_at', '>=', $now)
            ->first();

        if (!$rate) {
            // throw exception
        }

        return $rate;
    }
}
