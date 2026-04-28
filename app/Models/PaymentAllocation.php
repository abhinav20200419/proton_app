<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentAllocation extends Model
{
    protected $fillable = [
        'payment_id',
        'monthly_fee_id',
        'installment_id',
        'amount'
    ];

    protected $casts = [
        'amount' => 'decimal:2'
    ];
}