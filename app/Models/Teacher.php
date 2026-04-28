<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {
    protected $fillable = ['user_id','phone','specialization','status'];

    protected $casts = [
        'status' => 'boolean'
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function batches() {
        return $this->hasMany(Batch::class);
    }
}
