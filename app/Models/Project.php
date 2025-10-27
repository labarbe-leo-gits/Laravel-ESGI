<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function getAll()
    {
        return [
            1 => [
                'title' => 'Développement web app',
                'technologies' => ['Laravel', 'Blade', 'Tailwind CSS', 'Alpine JS']
            ],
            2 => [
                'title' => 'To Do List',
                'technologies' => ['Laravel', 'Livewire', 'Alpine JS', 'SQLite']
            ]
        ];
    }

    public function retrieve($id)
    {
        $projects = $this->getAll();

        return Arr::get($projects, $id, [
            'title' => 'Projet non trouvé',
            'technologies' => [],
            'description' => ''
        ]);
    }
}
