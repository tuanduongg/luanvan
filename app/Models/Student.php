<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_code',
        'student_name',
        'student_class',
        'student_school_year',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
