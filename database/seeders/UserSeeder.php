<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all existing companies
        $companies = Company::pluck('id')->toArray();

        if (empty($companies)) {
            $this->command->info('No companies found. Please seed companies first.');
            return;
        }

        // Fetch all existing departments or create some if missing
        $departments = Department::pluck('id')->toArray();
        if (empty($departments)) {
            $this->command->info('No departments found. Seeding 5 default departments...');
            $departments = Department::factory(5)->create()->pluck('id')->toArray();
        }

        // Assign departments to companies if the pivot table is empty
        $existingRelations = DB::table('company_department')->count();
        if ($existingRelations === 0) {
            foreach ($companies as $companyId) {
                foreach ($departments as $departmentId) {
                    DB::table('company_department')->insertOrIgnore([
                        'company_id' => $companyId,
                        'department_id' => $departmentId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        // Create users for the companies and departments
        User::factory()->create([
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'first_login_at' => now(),
//            'company_id' => $companies[array_rand($companies)],
//            'department_id' => $departments[array_rand($departments)],
        ]);

        User::factory()->create([
            'email' => 'help.desk@wsa-network.com',
            'role' => 'help_desk',
            'email_verified_at' => now(),
            'first_login_at' => now(),
//            'company_id' => $companies[array_rand($companies)],
//            'department_id' => $departments[array_rand($departments)],
        ]);

        User::factory()->create([
            'email' => 'employee@wsa-network.com',
            'role' => 'employee',
            'email_verified_at' => now(),
            'first_login_at' => now(),
//            'company_id' => $companies[array_rand($companies)],
//            'department_id' => $departments[array_rand($departments)],
        ]);

        // 1. Create 2 Admins for random companies and departments
//        foreach (range(1, 2) as $i) {
//            User::factory()->create([
//                'role' => 'admin',
//                'company_id' => $companies[array_rand($companies)],
//                'department_id' => $departments[array_rand($departments)],
//                'email_verified_at' => null
//            ]);
//        }

        // 2. Create 3 Help Desk Users for random companies and departments
//        foreach (range(1, 3) as $i) {
//            User::factory()->create([
//                'role' => 'help_desk',
//                'company_id' => $companies[array_rand($companies)],
//                'department_id' => $departments[array_rand($departments)],
//                'email_verified_at' => null
//            ]);
//        }

        // 3. Create 50 Employees for random companies and departments
//        foreach (range(1, 2000) as $i) {
//            User::factory()->create([
//                'role' => 'employee',
//                'company_id' => $companies[array_rand($companies)],
//                'department_id' => $departments[array_rand($departments)],
//                'email_verified_at' => null
//            ]);
//        }
    }
}
