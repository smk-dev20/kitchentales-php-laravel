<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
       use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'ingredients',
        'instructions',
        'image',
    ];

    // Recipe belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
