<?php

declare(strict_types=1);

namespace Laracon\Shipping\Infrastructure\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Laracon\Shipping\Domain\Models\ShippingAddress;

class ShippingAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShippingAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'country' => $this->faker->country(),
            'postal_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'address_line_one' => $this->faker->streetAddress(),
            'address_line_one' => $this->faker->buildingNumber(),
        ];
    }
}
