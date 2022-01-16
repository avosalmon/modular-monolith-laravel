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
}
