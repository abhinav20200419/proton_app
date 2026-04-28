<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
        'class_id',
        'teacher_id',
        'session_id',
        'name'
    ];

    public function session()
    {
        return $this->belongsTo(UserSession::class, 'session_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}