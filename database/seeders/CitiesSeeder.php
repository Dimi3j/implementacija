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
            ['name' => 'New York'],
            ['name' => 'Los Angeles'],
            ['name' => 'Chicago'],
            ['name' => 'Houston'],
            ['name' => 'Phoenix'],
            ['name' => 'Philadelphia'],
            ['name' => 'San Antonio'],
            ['name' => 'San Diego'],
            ['name' => 'Dallas'],
            ['name' => 'San Jose'],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
