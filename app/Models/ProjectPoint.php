<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'point',
        'project_id'
    ];

    protected $table = 'project_points';

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
