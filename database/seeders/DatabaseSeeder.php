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
        // \App\Models\User::factory(10)->create();

        \App\Models\Role::create([
            'id' => '1',
            'name' => 'Super Admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'id_role' => '1',
            'email' => 'superadmin@coffeeshop.com',
            'password' => Hash::make('password'),
        ]);
    }
}
