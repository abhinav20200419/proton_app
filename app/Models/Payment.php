<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'student_id',
        'amount',
        'payment_date',
        'payment_mode',
        'reference_no',
        'created_by',
        'remarks'
    ];

    protected $casts = [
        'payment_date' => 'date',
        'amount' => 'decimal:2'
    ];

    public function allocations()
    {
        return $this->hasMany(PaymentAllocation::class);
    }
}
