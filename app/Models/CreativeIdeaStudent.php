<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreativeIdeaStudent extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = [
        'student_id',
        'creative_idea_id',
    ];
}
