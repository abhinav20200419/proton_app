<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    protected $fillable = [
        'class_id',
        'name',
        'fee_type',
        'total_amount',
        'monthly_amount'
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'monthly_amount' => 'decimal:2'
    ];
}