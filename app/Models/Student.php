<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'father_name',
        'phone',
        'admission_no',
        'admission_date',
        'session_id',
        'batch_id',
        'fee_type',
        'fee_start_date',
        'status'
    ];

    protected $casts = [
        'admission_date' => 'date',
        'fee_start_date' => 'date',
        'status' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function monthlyFees()
    {
        return $this->hasMany(MonthlyFee::class);
    }

    public function installments()
    {
        return $this->hasMany(FeeInstallment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function session()
    {
        return $this->belongsTo(UserSession::class, 'session_id');
    }
}