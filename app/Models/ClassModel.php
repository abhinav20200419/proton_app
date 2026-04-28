<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes'; // IMPORTANT (reserved word conflict)

    protected $fillable = ['name'];
}
