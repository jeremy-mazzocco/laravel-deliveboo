<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $created_at = fake()->dateTimeBetween('2023-08-01', '2023-09-01');
        $firstName = fake('it_IT')->firstName();
        $surname = fake('it_IT')->lastName();
        $name = $firstName . ' ' . $surname;
        return [
            'order_code' => fake('it_IT') -> regexify('[A-Z]{3}[0-9]{7}'),
            'customer_name' => $name,
            'customer_address' => fake('it_IT') -> streetAddress(),
            'total_price' => 0,
            'phone_number' => fake('it_IT') -> phoneNumber(),
            'email' => fake('it_IT') -> safeEmail(),
            'status' => fake('it_IT') -> boolean (),
            'created_at' => $created_at,
            'updated_at' => $created_at
        ];
    }
}
