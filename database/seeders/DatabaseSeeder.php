<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CompanySeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(MemorySeeder::class);
        $this->call(ProcessorSeeder::class);
        $this->call(HDDSeeder::class);
        $this->call(VGASeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(DeviceStatusSeeder::class);
        $this->call(CountryDatabaseSeeder::class);
        $this->call(CitySeeder::class);

    }
}

