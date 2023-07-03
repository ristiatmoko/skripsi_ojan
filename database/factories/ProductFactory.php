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
            'product_name' => $this->faker->sentence(mt_rand(1,3)),
//            'product_slug' => $this->faker->slug(),
            'product_stock' => $this->faker->randomDigit(2),
            'expired_date' => $this->faker->date(),
            'user_id' => mt_rand(1,2),
            'category_id' => mt_rand(1,3)
        ];
    }
}
