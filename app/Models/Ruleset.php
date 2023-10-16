<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruleset extends Model
{
    protected $fillable = [
        'name'
    ];

    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class);
    }
}
