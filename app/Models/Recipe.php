<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'serving_size', 
        'cook_time', 
        'instructions', 
        'ingredients',
        'image_path', 
        'user_id', 
        'description', 
        'family_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
