<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'productImg' => $this->faker->imageUrl(640, 480, 'products', true),
            'productTitle' => $this->faker->words(3, true),
            'productPrice' => $this->faker->randomFloat(2, 10, 1000),
            'productDescription' => $this->faker->paragraph(),
            'productRating' => $this->faker->randomFloat(1, 1, 5),
            'productCategory' => $this->faker->word(),
        ];
    }
}
