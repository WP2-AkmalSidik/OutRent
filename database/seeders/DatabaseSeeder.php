<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Outrent',
            'email' => 'admin@outrent.com',
            'password' => '1234',
        ]);
        User::factory()->create([
            'name' => 'Shop1',
            'email' => 'shop1@outrent.com',
            'password' => '1234',
        ]);
        User::factory()->create([
            'name' => 'Shop2',
            'email' => 'shop2@outrent.com',
            'password' => '1234',
        ]);
        User::factory()->create([
            'name' => 'Shop3',
            'email' => 'shop3@outrent.com',
            'password' => '1234',
        ]);
    }
}
