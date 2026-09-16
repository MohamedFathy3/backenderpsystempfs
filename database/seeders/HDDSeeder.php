<?php

namespace Database\Seeders;

use App\Models\Storage;
use Illuminate\Database\Seeder;

class HDDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $storages = [
            // HDD (Most common sizes)
            ['size' => 500, 'type' => 'HDD'],
            ['size' => 1000, 'type' => 'HDD'], // 1TB
            ['size' => 2000, 'type' => 'HDD'], // 2TB
            ['size' => 4000, 'type' => 'HDD'], // 4TB
            ['size' => 8000, 'type' => 'HDD'], // 8TB

            // SATA SSD (Most common sizes)
            ['size' => 128, 'type' => 'SSD'],
            ['size' => 256, 'type' => 'SSD'],
            ['size' => 512, 'type' => 'SSD'],
            ['size' => 1000, 'type' => 'SSD'], // 1TB
            ['size' => 2000, 'type' => 'SSD'], // 2TB

            // NVMe M.2 SSD (Most common sizes)
            ['size' => 128, 'type' => 'M.2 NVMe'],
            ['size' => 256, 'type' => 'M.2 NVMe'],
            ['size' => 512, 'type' => 'M.2 NVMe'],
            ['size' => 1000, 'type' => 'M.2 NVMe'], // 1TB
            ['size' => 2000, 'type' => 'M.2 NVMe'], // 2TB
            ['size' => 4000, 'type' => 'M.2 NVMe'], // 4TB
        ];

        foreach ($storages as $storage) {
            Storage::updateOrCreate(
                ['size' => $storage['size'], 'type' => $storage['type']],
                ['size' => $storage['size'], 'type' => $storage['type']]
            );
        }
    }
}
