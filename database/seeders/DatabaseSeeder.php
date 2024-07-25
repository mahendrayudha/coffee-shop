<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            ['id' => '1', 'name' => 'Super Admin'],
            ['id' => '2', 'name' => 'Customer'],
            ['id' => '3', 'name' => 'Employee'],
        ];

        foreach ($roles as $role) {
            \App\Models\Role::updateOrCreate(['id' => $role['id']], $role);
        }

        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'id_role' => '1',
            'email' => 'superadmin@coffeeshop.com',
            'password' => Hash::make('password'),
        ]);
    }
}
