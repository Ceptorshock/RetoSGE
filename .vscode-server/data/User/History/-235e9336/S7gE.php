<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo {
        return $this->belongsTo(Department::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
