<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create permissions based on routes in web.php
        $permissions = [
            'manage statistics',
            'manage teams',
            'manage programs',
            'manage blogs',
            'manage hero sections',
            'manage abouts',
            'manage keypoints',
            'manage events',
            'manage categories',
            'manage authors',
            'manage clients',
            'manage schedules',
            'manage faqs',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $authorRole = Role::firstOrCreate(['name' => 'author']);

        // Assign permissions to roles
        $superAdminRole->givePermissionTo(Permission::all());

        $authorPermissions = [
            'manage blogs',
            'manage categories',
        ];

        $authorRole->syncPermissions($authorPermissions);

        // Create author user
        $authorUser = User::create([
            'name' => 'author',
            'email' => 'author@admin.com',
            'occupation' => 'Writer',
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt(12345),
        ]);
        $authorUser->assignRole('author');

        // Create super admin user
        $superAdminUser = User::create([
            'name' => 'super_admin',
            'email' => 'super@admin.com',
            'occupation' => 'Web Developer',
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt(12345),
        ]);
        $superAdminUser->assignRole('super_admin');
    }
}
