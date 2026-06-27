<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public const PERMISSIONS = [
        // dashboard
        'view dashboard',

        // users
        'users.view',
        'users.create',
        'users.update',
        'users.delete',

        // roles
        'roles.view',
        'roles.create',
        'roles.update',
        'roles.delete',

        // permissions
        'permissions.view',
        'permissions.create',
        'permissions.update',
        'permissions.delete',
    ];

    public function run(): void
    {
        foreach (self::PERMISSIONS as $name) {
            Permission::findOrCreate($name, 'web');
        }
    }
}
