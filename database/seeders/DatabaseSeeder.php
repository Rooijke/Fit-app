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
         \App\Models\User::factory(8)->create();

         \App\Models\User::factory()->create([
             'name' => 'Torben',
             'email' => 'torbenderooij@gmail.com',
             'password' => '$2y$10$1HPKLVcV4jJJlN8xQuU7RuOaAS.2W0Io1MEcN36gyvWiMemmUDW2u' //password
         ]);

        \App\Models\User::factory()->create([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'password' => '$2y$10$1HPKLVcV4jJJlN8xQuU7RuOaAS.2W0Io1MEcN36gyvWiMemmUDW2u' //password
        ]);
    }
}
