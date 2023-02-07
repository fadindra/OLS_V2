<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'description',
        'image',
        'instructor_id',
        'status',
        'price',
    ];
    
    protected $guarded = [];
    
    public function materials()
    { 
    
        return $this->hasMany(Material::class);
    }
    public function comments()
    { 
    
        return $this->hasMany(Comment::class);
    }
}
