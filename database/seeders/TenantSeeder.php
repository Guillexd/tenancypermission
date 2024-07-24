<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create([
            'name' => 'admin',
        ]);
        $manager = Role::create([
            'name' => 'manager',
        ]);
        $developer = Role::create([
            'name' => 'developer',
        ]);

        Permission::create([
            'name' => 'dashboard',
        ])->syncRoles([$admin, $manager, $developer]);
        Permission::create([
            'name' => 'users.index',
        ])->syncRoles([$admin, $manager]);
        Permission::create([
            'name' => 'users.show',
        ])->syncRoles([$admin, $manager]);
        Permission::create([
            'name' => 'users.create',
        ])->syncRoles([$admin]);
        Permission::create([
            'name' => 'users.store',
        ])->syncRoles([$admin]);
        Permission::create([
            'name' => 'users.edit',
        ])->syncRoles([$admin]);
        Permission::create([
            'name' => 'users.update',
        ])->syncRoles([$admin]);
        Permission::create([
            'name' => 'users.destroy',
        ])->syncRoles([$admin]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ])->assignRole('admin');

        \App\Models\User::factory()->create([
            'name' => 'Developer',
            'email' => 'dev@gmail.com',
        ])->assignRole('developer');

        \App\Models\User::factory()->create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
        ])->assignRole('manager');
    }
}
