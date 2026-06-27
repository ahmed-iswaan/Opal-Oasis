<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::findOrCreate('Admin', 'web');
        $admin->syncPermissions(PermissionSeeder::PERMISSIONS);

        Role::findOrCreate('Super Admin', 'web');
    }
}
