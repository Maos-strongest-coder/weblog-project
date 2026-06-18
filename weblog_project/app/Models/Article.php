<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    public function categories(): BelongsToMany 
    {
    return $this->belongsToMany(Category::class);
    }

    public function comments(): HasMany 
    {
    return $this->hasMany(Comment::class);
    }

    public function users(): BelongsTo
    {
    return $this->belongsTo(User::class);
    }
}
