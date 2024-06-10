<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Define permissions
        $permissions = [
            'manage statistics',
            'manage hero sections',
            'manage abouts',
            'manage programs',
            'manage blogs',
            'manage events',
            'manage categories',
            'manage client',
            'manage schedules',
            'manage authors',
            'manage keypoints',
        ];

        // Create permissions if they do not exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define permissions for author role
        $authorPermissions = [
            'manage blogs',
            'manage categories'
        ];

        // Create super admin role
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        // Create author role
        $authorRole = Role::firstOrCreate(['name' => 'author']);

        // Assign permissions to author role
        foreach ($authorPermissions as $permission) {
            $authorRole->givePermissionTo($permission);
        }

        // Create super admin user
        $superAdminUser = User::create([
            'name' => 'super_admin',
            'email' => 'super@admin.com',
            'occupation' => 'Web Developer',
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt('12345'),
        ]);

        // Assign super admin role to super admin user
        $superAdminUser->assignRole($superAdminRole);

        // Create author user
        $authorUser = User::create([
            'name' => 'author',
            'email' => 'author@admin.com',
            'occupation' => 'Writer',
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt('12345'),
        ]);

        // Assign author role to author user
        $authorUser->assignRole($authorRole);
    }
}
