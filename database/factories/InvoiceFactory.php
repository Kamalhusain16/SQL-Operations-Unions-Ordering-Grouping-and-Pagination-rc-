<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
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
            'customer_id' => Customer::factory(),
            'total_price' => $this->faker->randomFloat(2, 100, 1000), // Random price between 100 and 1000 with 2 decimal places
            'paid' => $this->faker->boolean, // Random boolean value
            'vat' => $this->faker->randomFloat(2, 0, 50), // Random VAT between 0 and 50 with 2 decimal places
            'discount' => $this->faker->randomFloat(2, 0, 50), // Random discount between 0 and 50 with 2 decimal places
            'payable' => $this->faker->randomFloat(2, 50, 1000), // Random payable amount between 50 and 1000 with 2 decimal places
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
