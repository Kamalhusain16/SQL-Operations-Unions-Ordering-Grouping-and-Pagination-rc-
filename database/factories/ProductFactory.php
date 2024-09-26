<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 100), // Random price between 10 and 100 with 2 decimal places
            'unit' => $this->faker->word,
            'img_url' => $this->faker->imageUrl(640, 480, 'products', true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
