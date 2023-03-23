<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThesesStudent extends Model
{
    use HasFactory;
    public $timestamps = false;

    public $fillable = [
        'student_id',
        'theses_id',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
