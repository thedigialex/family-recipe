<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Family extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'head_id'];

    public function head()
    {
        return $this->belongsTo(User::class, 'head_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class)->withPivot('approved');
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
