<?php

namespace Database\Seeders;

use App\Models\OwnerType;
use Illuminate\Database\Seeder;

class OwnerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            'Dowlet',
            'Hususy',
            'Ikisem',
            'Hijisi',
        ];
        foreach ($objs as $obj) {
            OwnerType::create([
                'name' => $obj,
            ]);
        }
    }
}
