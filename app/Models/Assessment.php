<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assessment extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'status',
        'files',
        'file_extension',
        'mark',
    ];
    protected $guarded = [];
    
    public function material()
    {
      return $this->belongsTo(Material::class);
    }
    public function users():HasMany
    { 
    
        return $this->hasMany(Order::class);
    }
    public function course()
    {
      return $this->belongsTo(Course::class);
    }
}
