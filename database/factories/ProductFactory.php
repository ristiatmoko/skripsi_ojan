<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
//            'unique_id' => $this->faker->randomDigit(5),
            'user_id' => User::factory(),
            'product_name' => $this->faker->sentence(3, true),
//            'product_slug' => $this->faker->slug(),
            'product_stock' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'expired_date' => $this->faker->date(),
            'category_id' => Category::factory()
        ];
    }
}
