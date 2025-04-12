<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Benefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'feature_id',
        'name',
    ];

    /**
     * Get the feature that owns the benefit.
     */
    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }
}