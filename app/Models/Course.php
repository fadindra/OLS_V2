<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    
    public function materials():HasMany
    { 
    
        return $this->hasMany(Material::class);
    }
    public function comments():HasMany
    { 
    
        return $this->hasMany(Comment::class);
    }
    public function orders():HasMany
    { 
    
        return $this->hasMany(Order::class);
    }
    public function users():HasMany
    { 
    
        return $this->hasMany(Order::class);
    }
}
