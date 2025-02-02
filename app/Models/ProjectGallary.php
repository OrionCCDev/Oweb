<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGallary extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'project_id'
    ];

    public $timestamps = false;

    protected $table = 'project_gallaries';

    public function project()
    {
        return $this->belongsTo(Project::class , 'project_id');
    }
}
