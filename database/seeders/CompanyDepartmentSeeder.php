<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Department;

class CompanyDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = Department::all();

        // Attach all departments to each company
        Company::all()->each(function ($company) use ($departments) {
            $company->departments()->sync($departments->pluck('id')->toArray());
        });
    }
}
