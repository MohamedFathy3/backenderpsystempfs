<?php

namespace Database\Seeders;

use App\Models\Processor;
use Illuminate\Database\Seeder;

class ProcessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $processors = [
            // Intel Laptop CPUs (2018 - 2024)
            ['name' => 'Intel Core i9-8950HK'],
            ['name' => 'Intel Core i7-8750H'],
            ['name' => 'Intel Core i5-8300H'],
            ['name' => 'Intel Core i9-9980HK'],
            ['name' => 'Intel Core i7-9750H'],
            ['name' => 'Intel Core i5-9300H'],
            ['name' => 'Intel Core i9-10980HK'],
            ['name' => 'Intel Core i7-10875H'],
            ['name' => 'Intel Core i5-10300H'],
            ['name' => 'Intel Core i9-11980HK'],
            ['name' => 'Intel Core i7-11800H'],
            ['name' => 'Intel Core i5-11400H'],
            ['name' => 'Intel Core i9-12900HK'],
            ['name' => 'Intel Core i7-12700H'],
            ['name' => 'Intel Core i5-12500H'],
            ['name' => 'Intel Core i9-13900H'],
            ['name' => 'Intel Core i7-13700H'],
            ['name' => 'Intel Core i5-13500H'],
            ['name' => 'Intel Core i9-14900HX'],
            ['name' => 'Intel Core i7-14700HX'],
            ['name' => 'Intel Core i5-14650HX'],

            // AMD Laptop CPUs (2018 - 2024)
            ['name' => 'AMD Ryzen 7 2700U'],
            ['name' => 'AMD Ryzen 5 2500U'],
            ['name' => 'AMD Ryzen 7 3750H'],
            ['name' => 'AMD Ryzen 5 3550H'],
            ['name' => 'AMD Ryzen 9 4900HS'],
            ['name' => 'AMD Ryzen 7 4800H'],
            ['name' => 'AMD Ryzen 5 4600H'],
            ['name' => 'AMD Ryzen 9 5900HX'],
            ['name' => 'AMD Ryzen 7 5800H'],
            ['name' => 'AMD Ryzen 5 5600H'],
            ['name' => 'AMD Ryzen 9 6900HX'],
            ['name' => 'AMD Ryzen 7 6800H'],
            ['name' => 'AMD Ryzen 5 6600H'],
            ['name' => 'AMD Ryzen 9 7945HX'],
            ['name' => 'AMD Ryzen 7 7745HX'],
            ['name' => 'AMD Ryzen 5 7645HX'],
            ['name' => 'AMD Ryzen 9 8945HX'],
            ['name' => 'AMD Ryzen 7 8845HX'],
            ['name' => 'AMD Ryzen 5 8645HX'],

            // Intel Desktop CPUs (2018 - 2024)
            ['name' => 'Intel Core i9-9900K'],
            ['name' => 'Intel Core i7-9700K'],
            ['name' => 'Intel Core i5-9600K'],
            ['name' => 'Intel Core i9-10900K'],
            ['name' => 'Intel Core i7-10700K'],
            ['name' => 'Intel Core i5-10600K'],
            ['name' => 'Intel Core i9-11900K'],
            ['name' => 'Intel Core i7-11700K'],
            ['name' => 'Intel Core i5-11600K'],
            ['name' => 'Intel Core i9-12900K'],
            ['name' => 'Intel Core i7-12700K'],
            ['name' => 'Intel Core i5-12600K'],
            ['name' => 'Intel Core i9-13900K'],
            ['name' => 'Intel Core i7-13700K'],
            ['name' => 'Intel Core i5-13600K'],
            ['name' => 'Intel Core i9-14900K'],
            ['name' => 'Intel Core i7-14700K'],
            ['name' => 'Intel Core i5-14600K'],

            // AMD Desktop CPUs (2018 - 2024)
            ['name' => 'AMD Ryzen 9 3900X'],
            ['name' => 'AMD Ryzen 7 3700X'],
            ['name' => 'AMD Ryzen 5 3600'],
            ['name' => 'AMD Ryzen 9 5900X'],
            ['name' => 'AMD Ryzen 7 5800X'],
            ['name' => 'AMD Ryzen 5 5600X'],
            ['name' => 'AMD Ryzen 9 7900X'],
            ['name' => 'AMD Ryzen 7 7700X'],
            ['name' => 'AMD Ryzen 5 7600X'],
            ['name' => 'AMD Ryzen 9 7950X'],
            ['name' => 'AMD Ryzen 7 7800X3D'],
            ['name' => 'AMD Ryzen 5 7600X'],
        ];

        foreach ($processors as $processor) {
            Processor::updateOrCreate(
                ['name' => $processor['name']],
            );
        }
    }
}
