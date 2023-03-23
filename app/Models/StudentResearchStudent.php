<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResearchStudent extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'student_id',
        'student_research_id',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}


