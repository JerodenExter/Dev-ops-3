<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductOrder>
 */
class ProductOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $random_product = Product::inRandomOrder()->limit(1)->first();
        return [
            'code' => $random_product->code,
            'description' => $random_product->description,
            'price_at_purchase' => $random_product->price_at_purchase + $this->faker->randomFloat(0, -10, 10),
            'payed_at' => $this->faker->boolean ? $this->faker->dateTimeBetween('-6 months', 'now') : null,
        ];
    }
}
