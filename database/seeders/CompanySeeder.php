<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Pyramids Freight Services',
            ],
            [
                'name' => 'Pyramids Freight Services',
            ],
            [
                'name' => 'Pyramids Freight Services',
            ],
            [
                'name' => 'Pyramids Freight Services',
            ],
            [
                'name' => 'Pyramids Freight Services',
            ],
            [
                'name' => 'Pyramids Freight Services',
            ],
            [
                'name' => 'Pyramids Freight Services',
            ],

            // FGS
            [
                'name' => 'Freight Gate Services',
            ],
            [
                'name' => 'Freight Gate Services',
            ],
            [
                'name' => 'Freight Gate Services',
            ],

            // FTS

            [
                'name' => 'Fast Track Shipping',
            ],

            // CSM
            [
                'name' => 'Cornerstone Marine',
            ],
            [
                'name' => 'Cornerstone Marine',
            ],
            [
                'name' => 'World Shipping Alliance',
            ],
        ];

        foreach ($companies as $company) {
            Company::updateOrCreate([
                'name' => $company['name'],
            ], $company);
        }
    }
}
