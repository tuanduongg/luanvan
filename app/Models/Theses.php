<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SplFileInfo;

class Theses extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'tittle',
        'content',
        'start_date',
        'end_date',
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

    public function getExtensionFileAttribute()
    {
        // return explode('.',$this->file)[1]
        return (new SplFileInfo($this->file))->getExtension();
    }

    public function getFormatSchoolYearAttribute()
    {
        $yearStart = (int)$this->school_year + 2006; //năm thành lập 2007
        for ($i = 0; $i < 5; $i++) {
            $yearYear[] = $yearStart + $i;
        }
        return $yearYear;
    }
}
