<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentFeeAssignment extends Model
{
    protected $fillable = [
        'student_id',
        'fee_structure_id',
        'start_date',
        'end_date',
        'discount_type',
        'discount_value',
        'discount_reason',
        'final_amount'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'discount_value' => 'decimal:2',
        'final_amount' => 'decimal:2'
    ];
}