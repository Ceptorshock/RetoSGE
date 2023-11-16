<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;

    public function incident(): BelongsTo{
        return $this->belongsTo(Incident::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'text',
        'used_time',
        'user_id',
        'incident_id',
    ];
}