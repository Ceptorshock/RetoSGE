<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }

    public function incidents(): HasMany {
        return $this->hasMany(Incident::class);
    }
}
