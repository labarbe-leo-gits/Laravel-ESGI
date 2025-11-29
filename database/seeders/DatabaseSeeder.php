<?php

namespace Database\Seeders;

use App\Models\Technologies;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create admin
        User::updateOrCreate(
        ['email' => 'labarbe.leo2308@gmail.com'],  // Condition unique
        [
            'name' => 'Léo Labarbe',
            'password' => Hash::make('password123'),
        ]
    );

        // Seed projects
        $this->call(ProjectsSeeder::class, TechnologiesSeeder::class);
    }
}
