<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            'Kotez',
            'Etaz jay',
            'Deniz gyrasynda',
            '1 komnat',
            '2 komnat',
            '3 komnat',
            '4 komnat',
            'Elitka',
            'Saherin gyrasyndaky',
            'Sowuk oy',
            'Ofis',
            '1nji etaz',
            '2nji etaz',
            '3nji etaz',
            '4nji etaz',
        ];
        foreach ($objs as $obj) {
            PropertyType::create([
                'name' => $obj,
            ]);
        }
    }
}
