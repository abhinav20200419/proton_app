<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyFee extends Model
{
    protected $fillable = [
        'student_id',
        'month',
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
        'discount_amount' => 'decimal:2',
        'final_amount' => 'decimal:2',
        'paid_amount' => 'decimal:2'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
