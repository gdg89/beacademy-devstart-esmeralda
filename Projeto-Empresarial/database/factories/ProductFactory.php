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
    public function definition()
    {
        return [
            'product_name'=>$this->faker->word(),
            'product_description'=>$this->faker->text(),
            'stock_quantity'=>$this->faker->numberBetween($min = 10, $max = 180),
            'cost_price'=>$this->faker->randomFloat($nbMaxDecimals = NULL, $min = 5, $max = 10000),
            'sale_price'=>$this->faker->randomFloat($nbMaxDecimals = NULL, $min = 5, $max = 10000),
            'image'=>$this->faker->imageUrl($width = 200, $height = 350) 
        ];
    }
}
