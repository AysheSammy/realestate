<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $customer = DB::table('customers')->inRandomOrder()->first();
        $location = DB::table('locations')->inRandomOrder()->first();
        $owner_type = DB::table('owner_types')->inRandomOrder()->first();
        $property_type = DB::table('property_types')->inRandomOrder()->first();
        return [
            'customer_id' => $customer->id,
            'location_id' => $location->id,
            'owner_type_id' => $owner_type->id,
            'property_type_id' => $property_type->id,
            'rent' => rand(0, 2),
            'area' => rand(100, 5000),
            'repair' => fake()->boolean(40),
            'description' => fake()->paragraph(5),
            'price' => rand(5, 500),
            'credit' => fake()->boolean(30),
            'documents' => fake()->boolean(60),
            'viewed' => rand(0, 100),
            'created_at' => fake()->dateTimeBetween('-20 days', now()),
            'updated_at' => now(),
        ];
    }
}
