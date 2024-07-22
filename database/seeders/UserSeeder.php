<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => 'Password!321',
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'user',
            'username' => 'User',
            'email' => 'user@ehb.be',
            'password' => 'User!321',
            'is_admin' => false,
        ]);
    }
}
