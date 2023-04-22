<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'material_id',
        'instructor_id',
        'learner_id',
        'comment_text',
        'status',
    ];
    
    protected $guarded = [];
    
    public function course()
    {
      return $this->hasMany(Course::class);
    }
    public function materials()
    {
      return $this->hasMany(Material::class);
    }
    public function user()
    {
      return $this->hasMany(User::class);
    }
}
