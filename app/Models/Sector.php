<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Projects()
    {
        return $this->hasMany(Project::class , 'sector_id' , 'id');
    }
}
