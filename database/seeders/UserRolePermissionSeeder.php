<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create General Permissions
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'view analytics']);

        // Create Superuser Permissions
        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);
        Permission::create(['name' => 'view permission']);
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        // Create Admin Permissions
        Permission::create(['name' => 'view job']);
        Permission::create(['name' => 'create job']);
        Permission::create(['name' => 'update job']);

        // Create Employer Permissions
        Permission::create(['name' => 'create job posting']);

        // Create Alumni Permissions
        Permission::create(['name' => 'create portfolio']);
        Permission::create(['name' => 'publish projects']);
        Permission::create(['name' => 'edit projects']);
        Permission::create(['name' => 'delete projects']);
        Permission::create(['name' => 'view job postings']);
        Permission::create(['name' => 'apply for jobs']);
        Permission::create(['name' => 'view own profile']);
        Permission::create(['name' => 'edit profile']);
        Permission::create(['name' => 'view own applications']);

        // Create Roles
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);
        $alumniRole = Role::create(['name' => 'alumni']);
        $employerRole = Role::create(['name' => 'employer']);

        // Assign all permissions to super-admin role
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign specific permissions to admin role
        $adminRole->givePermissionTo([
            'view role', 'create role', 'update role',
            'view permission', 'create permission',
            'view user', 'create user', 'update user',
            'view job', 'create job', 'update job'
        ]);

        // Assign specific permissions to employer role
        $employerRole->givePermissionTo(['create job posting']);

        // Assign specific permissions to alumni role
        $alumniRole->givePermissionTo([
            'create portfolio', 'publish projects', 'edit projects', 'delete projects',
            'view job postings', 'apply for jobs',
            'view own profile', 'edit profile', 'view own applications'
        ]);

        // Create and assign roles to users
        $superAdminUser = User::firstOrCreate([
            'email' => 'skiragu18@gmail.com',
        ], [
            'name' => 'Samuel Kiragu',
            'email' => 'skiragu18@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $superAdminUser->assignRole($superAdminRole);

        $adminUser = User::firstOrCreate([
            'email' => 'admin@gmail.com'
        ], [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $adminUser->assignRole($adminRole);

        $employerUser = User::firstOrCreate([
            'email' => 'employer@gmail.com',
        ], [
            'name' => 'Employer',
            'email' => 'employer@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $employerUser->assignRole($employerRole);

        $alumniUser = User::firstOrCreate([
            'email' => 'alumni@gmail.com',
        ], [
            'name' => 'Alumni',
            'email' => 'alumni@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $alumniUser->assignRole($alumniRole);
    }
}
