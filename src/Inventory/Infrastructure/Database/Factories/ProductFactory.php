<?php

declare(strict_types=1);

namespace Laracon\Inventory\Infrastructure\Database\Factories;

use Laracon\Inventory\Domain\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'price' => $this->faker->randomNumber(2),
            'stock' => $this->faker->randomNumber(3),
            'is_active' => $this->faker->boolean,
        ];
    }
}
