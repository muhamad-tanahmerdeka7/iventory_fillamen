<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cache permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /*
        |--------------------------------------------------------------------------
        | Permissions
        |--------------------------------------------------------------------------
        */

        $permissions = [
            'view_master_data',
            'manage_master_data',
            'manage_production',
            'manage_qc',
            'manage_logistics',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */

        $admin = Role::firstOrCreate([
            'name' => 'Administrator',
            'guard_name' => 'web',
        ]);

        $production = Role::firstOrCreate([
            'name' => 'Production',
            'guard_name' => 'web',
        ]);

        $qc = Role::firstOrCreate([
            'name' => 'Quality Control',
            'guard_name' => 'web',
        ]);

        $logistics = Role::firstOrCreate([
            'name' => 'Logistics',
            'guard_name' => 'web',
        ]);

        $viewer = Role::firstOrCreate([
            'name' => 'Viewer',
            'guard_name' => 'web',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Assign Permission to Roles
        |--------------------------------------------------------------------------
        */

        $admin->syncPermissions(Permission::all());

        $production->syncPermissions([
            'manage_production',
            'view_master_data',
        ]);

        $qc->syncPermissions([
            'manage_qc',
            'view_master_data',
        ]);

        $logistics->syncPermissions([
            'manage_logistics',
            'view_master_data',
        ]);

        $viewer->syncPermissions([]);

        /*
        |--------------------------------------------------------------------------
        | Users Generation (Akun Default)
        |--------------------------------------------------------------------------
        */

        // 1. Akun Super Admin (Role: Administrator)
        $userAdmin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );
        $userAdmin->syncRoles('Administrator');

        // 2. Akun User Produksi (Role: Production)
        $userProduction = User::firstOrCreate(
            ['email' => 'production@admin.com'],
            [
                'name' => 'User Production',
                'password' => Hash::make('password'),
            ]
        );
        $userProduction->syncRoles('Production');

        // 3. Akun User Quality Control (Role: Quality Control)
        $userQc = User::firstOrCreate(
            ['email' => 'qc@admin.com'],
            [
                'name' => 'User Quality Control',
                'password' => Hash::make('password'),
            ]
        );
        $userQc->syncRoles('Quality Control');

        // 4. Akun User Logistik (Role: Logistics)
        $userLogistics = User::firstOrCreate(
            ['email' => 'logistics@admin.com'],
            [
                'name' => 'User Logistics',
                'password' => Hash::make('password'),
            ]
        );
        $userLogistics->syncRoles('Logistics');

        // 5. Akun User Viewer (Role: Viewer)
        $userViewer = User::firstOrCreate(
            ['email' => 'viewer@admin.com'],
            [
                'name' => 'User Viewer',
                'password' => Hash::make('password'),
            ]
        );
        $userViewer->syncRoles('Viewer');
    }
}