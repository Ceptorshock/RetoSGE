<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;


class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'text',
        'user_id',
    ];

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
}
