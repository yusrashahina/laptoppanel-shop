<?php

namespace Database\Seeders\AdminDashboard;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Super Admin',
            'Admin',
            'Shop Manager'
        ];

        $permissions = [
            'access_user_management',
            'view_user',      // Users list page
            'create_user',    // Create form page
            'store_user',     // Store action
            'edit_user',      // Edit form page
            'update_user',    // Update action
            'trash_user',     // View soft-deleted users
            'restore_user',   // Restore trashed users
            'delete_user',    // Permanently delete users
        ];


        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName]);
        }
    }
}
