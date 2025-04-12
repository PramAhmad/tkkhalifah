<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'name',
        'desc',
        'images',
    ];

    /**
     * Get the benefits for the feature.
     */
    public function benefits(): HasMany
    {
        return $this->hasMany(Benefit::class);
    }
}