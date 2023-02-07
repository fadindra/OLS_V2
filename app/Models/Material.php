<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'status',
        'files',
        'file_extension',
    ];
    protected $guarded = [];
    
    public function course()
    {
      return $this->belongsTo(Course::class);
    }
    public function comments()
    { 
    
        return $this->hasMany(Comment::class);
    }
    
}
