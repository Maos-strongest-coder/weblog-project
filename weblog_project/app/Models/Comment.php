<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    public function articles(): BelongsTo 
    {
    return $this->belongsTo(Article::class);
    }

    public function users(): BelongsTo 
    {
    return $this->belongsTo(User::class);
    }
}
