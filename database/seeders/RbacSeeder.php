<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RbacSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [
            'dashboard', 'master-data', 'employees', 'tickets', 'messages',
            'devices', 'companies', 'branches', 'reports', 'roles', 'permissions',
        ];
        $actions = ['view', 'create', 'update', 'delete', 'export', 'approve'];
        $permissions = collect();

        foreach ($modules as $module) {
            foreach ($actions as $action) {
                $permissions->push(Permission::updateOrCreate(
                    ['name' => $module . '.' . $action],
                    ['link' => $module . '.' . $action]
                ));
            }
        }

        $admin = Role::updateOrCreate(
            ['name' => 'Super Admin'],
            ['display_name' => 'Super Administrator', 'description' => 'Full access to every module.', 'scope' => 'global', 'is_system' => true]
        );
        $admin->permissions()->sync($permissions->pluck('id'));

        $helpDesk = Role::updateOrCreate(
            ['name' => 'Help Desk'],
            ['display_name' => 'Help Desk Operator', 'description' => 'Manage tickets, messages and assigned devices.', 'scope' => 'department', 'is_system' => true]
        );
        $helpDesk->permissions()->sync($permissions->filter(fn ($p) => str_starts_with($p->name, 'tickets.') || str_starts_with($p->name, 'messages.') || str_starts_with($p->name, 'devices.view'))->pluck('id'));

        $employee = Role::updateOrCreate(
            ['name' => 'Employee'],
            ['display_name' => 'Employee', 'description' => 'Create and follow own tickets and messages.', 'scope' => 'self', 'is_system' => true]
        );
        $employee->permissions()->sync($permissions->filter(fn ($p) => in_array($p->name, ['dashboard.view', 'tickets.view', 'tickets.create', 'messages.view', 'messages.create']))->pluck('id'));
    }
}
