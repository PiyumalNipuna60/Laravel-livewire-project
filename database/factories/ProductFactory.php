<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

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

       protected $model = Product::class;
       
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->words(3, true),
            'sku' => $this->faker->unique()->bothify('SKU-####-???'),
            'quantity' => $this->faker->numberBetween(0, 1000),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'description' => $this->faker->paragraph,
        ];
    }
}