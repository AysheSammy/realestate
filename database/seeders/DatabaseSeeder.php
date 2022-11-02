<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Property;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            OwnerTypeSeeder::class,
            PropertyTypeSeeder::class,
            LocationSeeder::class,
        ]);

        Customer::factory()->count(100)->create();
        Property::factory()->count(1000)->create();
    }
}
