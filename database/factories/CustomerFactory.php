<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => rand(60000000, 65999999),
            'phone2' => rand(0, 4) ? rand(60000000, 65999999) : null,
            'verified' => fake()->boolean(30),
            'remember_token' => Str::random(10),
            'created_at' => fake()->dateTimeBetween('-20 days', now()),
            'updated_at' => now(),
        ];
    }
}
