<?php

declare(strict_types=1);

namespace Laracon\Order\Infrastructure\Database\Factories;

use Laracon\Order\Domain\Models\TaxRate;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxRateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaxRate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rate' => 0.08,
            'start_at' => now()->subYears(3),
            'end_at' => now()->addYears(2),
        ];
    }
}
