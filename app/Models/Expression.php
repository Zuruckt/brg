<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Expression extends Model
{
    protected $fillable = [
        'name',
        'block_id',
        'field',
        'operator',
        'value',
        'previous_expression_operator',
    ];

    public function block(): BelongsTo
    {
        return $this->belongsTo(Block::class);
    }
}
