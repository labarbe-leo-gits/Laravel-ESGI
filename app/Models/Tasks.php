<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
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
            'description' => 'string',
            'status' => 'boolean',
            'due_date' => 'datetime',       // Timestamp → Carbon DateTime
            'created_at' => 'datetime',     // Timestamp → Carbon DateTime
            'updated_at' => 'datetime',     // Timestamp → Carbon DateTime
            'project_id' => 'integer'
        ];
    }

    protected $fillable = ['name', 'description', 'status', 'due_date', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
