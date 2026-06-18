<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    public function articles(): HasMany 
    {
    return $this->hasMany(Article::class);
    }

    public function comments(): HasMany 
    {
    return $this->hasMany(Comment::class);
    }

}
