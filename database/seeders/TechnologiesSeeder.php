<?php

namespace Database\Seeders;

use App\Models\Technologies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Technologies::create(['name' => 'Laravel']);
        Technologies::create(['name' => 'SQLite']);
        Technologies::create(['name' => 'TailwindCSS']);
        Technologies::create(['name' => 'MySQL']);
        Technologies::create(['name' => 'Vue.js']);
        Technologies::create(['name' => 'React']);
        Technologies::create(['name' => 'TypeScript']);
    }
}
