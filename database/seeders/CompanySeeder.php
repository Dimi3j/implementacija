<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'company_name' => 'Brainster',
                'premium' => 1
            ],
            [
                'company_name' => 'MOB',
                'premium' => 0
            ],
            [
                'company_name' => 'Laboratorium',
                'premium' => 1
            ]

        ];

        foreach ($events as $event) {
            Company::create($event);
        }
    }
}
