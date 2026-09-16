<?php

namespace Database\Seeders;

use App\Models\DeviceStatus;
use App\Models\Memory;
use Illuminate\Database\Seeder;

class DeviceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memories = [
            ['name' => 'damage'],
            ['name' => 'deprecated'],

        ];

        foreach ($memories as $memory) {
            DeviceStatus::updateOrCreate(
                ['name' => $memory['name']],
            );
        }
    }
}
