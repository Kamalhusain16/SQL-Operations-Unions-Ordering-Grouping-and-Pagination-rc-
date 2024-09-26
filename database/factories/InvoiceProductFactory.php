<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Invoice;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceProduct>
 */
class InvoiceProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_id' => Invoice::factory(),
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'qty' => $this->faker->numberBetween(1, 100),
            'sale_price' => $this->faker->randomFloat(2, 10, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
