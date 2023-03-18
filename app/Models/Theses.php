<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theses extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'tittle',
        'content',
        'start_date',
        'end_date',
        'student_id',
        'lecturer_code',
        'school_year',
        'archivist',
        'storage_location',
        'file',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
    
}
