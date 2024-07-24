<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleSeeder::class,
        ]);

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
