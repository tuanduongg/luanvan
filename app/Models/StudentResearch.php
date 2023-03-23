<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SplFileInfo;

class StudentResearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'tittle',
        'content',
        'lecturer_id',
        'year',
        'result',
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
    public function getExtensionFileAttribute() {
        // return explode('.',$this->file)[1]
        return (new SplFileInfo($this->file))->getExtension();
    }
}
