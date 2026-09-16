<?php

namespace Database\Seeders;

use App\Models\Memory;
use Illuminate\Database\Seeder;

class MemorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memories = [
            ['size' => 4, 'type' => 'DDR3'],
            ['size' => 8, 'type' => 'DDR3'],
            ['size' => 16, 'type' => 'DDR3'],
            ['size' => 4, 'type' => 'DDR4'],
            ['size' => 8, 'type' => 'DDR4'],
            ['size' => 16, 'type' => 'DDR4'],
            ['size' => 32, 'type' => 'DDR4'],
            ['size' => 8, 'type' => 'DDR5'],
            ['size' => 16, 'type' => 'DDR5'],
            ['size' => 32, 'type' => 'DDR5'],
            ['size' => 64, 'type' => 'DDR5'],
        ];

        foreach ($memories as $memory) {
            Memory::updateOrCreate(
                ['size' => $memory['size'], 'type' => $memory['type']],
            );
        }
    }
}
