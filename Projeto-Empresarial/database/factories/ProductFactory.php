<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        $name = $this->faker->sentence(3);

        $priceCost = $this->faker->randomFloat(2, 1, 100);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'cover' => $this->faker->imageUrl(640, 480),
            'price_cost' => $priceCost,
            'price_sell' => $priceCost + 0.1 * $priceCost,
            'stock' => $this->faker->randomDigit(),
        ];
    }
}
