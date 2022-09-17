<?php

declare(strict_types=1);

namespace Laracon\Order\Infrastructure\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Laracon\Order\Domain\Models\Order;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}
