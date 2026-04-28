<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'module',
        'action',
        'reference_id',
        'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];
}