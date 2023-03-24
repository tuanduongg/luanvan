<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicResearchLecturer extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'lecturer_id',
        'basic_research_id',
        'isLeader',
    ];
    use HasFactory;
}
