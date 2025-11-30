<?php

namespace Database\Seeders;

use App\Models\Tasks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tasks::create([
            'name' => 'Configurer le projet Laravel',
            'description' => 'Installer Laravel et configurer la base de données SQLite.',
            'status' => false,
            'due_date' => now()->addDays(7),
            'project_id' => 1
        ]);

        Tasks::create([
            'name' => 'Créer les modèles Eloquent',
            'description' => 'Créer les modèles pour les projets et les tâches.',
            'status' => false,
            'due_date' => now()->addDays(10),
            'project_id' => 1
        ]);

        Tasks::create([
            'name' => 'Développer l\'interface utilisateur',
            'description' => 'Utiliser TailwindCSS pour créer une interface utilisateur réactive.',
            'status' => false,
            'due_date' => now()->addDays(14),
            'project_id' => 1
        ]);

        Tasks::create([
            'name' => 'Mettre en place le panier d\'achat',
            'description' => 'Développer les fonctionnalités du panier d\'achat pour le site e-commerce.',
            'status' => false,
            'due_date' => now()->addDays(12),
            'project_id' => 2
        ]);

        Tasks::create([
            'name' => 'Intégrer Vue.js',
            'description' => 'Utiliser Vue.js pour améliorer l\'expérience utilisateur sur le site e-commerce.',
            'status' => false,
            'due_date' => now()->addDays(15),
            'project_id' => 2
        ]);

        Tasks::create([
            'name' => 'Créer les composants React',
            'description' => 'Développer les composants React pour le portfolio.',
            'status' => false,
            'due_date' => now()->addDays(8),
            'project_id' => 3
        ]);
    }
}
