<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $cities = [
            ['name' => 'Skopje'],
            ['name' => 'Dojran'],
            ['name' => 'Belgrade'],
            ['name' => 'Ohrid'],
            ['name' => 'Sofia'],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
