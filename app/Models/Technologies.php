<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'name' => 'string',
            'created_at' => 'datetime',     // Timestamp → Carbon DateTime
            'updated_at' => 'datetime',     // Timestamp → Carbon DateTime
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'projects_technologies', 'technology_id', 'project_id');
    }

}
