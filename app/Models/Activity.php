<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //

    // add fillable
    protected $fillable = [
        'title',
        'activity_date',
        'image',
        'description',
        'category',
        'created_by',
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
}
