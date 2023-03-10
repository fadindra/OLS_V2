<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course():BelongsTo
    { 
    
        return $this->belongsTo(Course::class);
    }
    public function users():HasMany
    { 
    
        return $this->hasMany(User::class);
    }
}
