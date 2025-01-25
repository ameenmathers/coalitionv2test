<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->word(),
            'quantity'     => $this->faker->numberBetween(10, 500),
            'price'        => $this->faker->numberBetween(1000, 500000),
            'created_at'   => now(),
            'updated_at'   => now(),
        ];
    }
}
