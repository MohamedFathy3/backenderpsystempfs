<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class   DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Customer Service'],
            ['name' => 'Operations'],
            ['name' => 'Sales'],
            ['name' => 'Executives & Board Management'],
            ['name' => 'Business Development'],
            ['name' => 'HR'],
            ['name' => 'IT & Marketing'],
            ['name' => 'Finance'],
        ];

        foreach ($departments as $department) {
            Department::updateOrCreate(['name' => $department['name']], $department);
        }
    }
}
