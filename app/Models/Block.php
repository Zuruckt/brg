<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Block extends Model
{
    use HasRecursiveRelationships;
    protected $fillable = [
        'name',
        'previous_expression_operator'
    ];

    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class);
    }

    public function expressions(): HasMany
    {
        return $this->hasMany(Expression::class);
    }
}
