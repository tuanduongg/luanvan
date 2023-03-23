<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreativeIdea extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tittle',
        'content',
        'start_date',
        'lecturer_id',
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
