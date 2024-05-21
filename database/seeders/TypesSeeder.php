<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $types = [
            ['name' => 'Concert'],
            ['name' => 'Conference'],
            ['name' => 'Workshop'],
            ['name' => 'Meetup'],
            ['name' => 'Webinar'],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
