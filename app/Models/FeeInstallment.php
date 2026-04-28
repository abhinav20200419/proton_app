<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeInstallment extends Model
{
    protected $fillable = [
        'student_id',
        'installment_no',
        'due_date',
        'amount',
        'discount_amount',
        'final_amount',
        'paid_amount',
        'status',
        'paid_on'
    ];

    protected $casts = [
        'due_date' => 'date',
        'paid_on' => 'datetime',
        'amount' => 'decimal:2',
        'final_amount' => 'decimal:2'
    ];
}