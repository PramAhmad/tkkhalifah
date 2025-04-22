<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';
    
    protected $fillable = [
        'features_id',
        'nama',
        'nowa',
        'email',
        'alamat',
    ];

    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class, 'features_id');
    }
}