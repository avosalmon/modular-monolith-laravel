<?php

declare(strict_types=1);

namespace Laracon\Order\Infrastructure\Database\Factories;

use Laracon\Order\Domain\Models\CartItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laracon\Order\Domain\Models\Cart;

class CartItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CartItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cart_id' => Cart::factory(),
            'product_id' => $this->faker->randomNumber(),
            'quantity' => $this->faker->randomNumber(),
        ];
    }
}
