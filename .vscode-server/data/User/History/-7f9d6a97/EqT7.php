<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Incident;

class Comment extends Model
{
    use HasFactory;

    public function incident(): BelongsTo{
        return $this->belongsTo(Incident::class);
    }

    protected $fillable = [
        'text',
        'used_time',
        'user_id',
        'incident_id',
    ];
}