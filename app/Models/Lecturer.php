<?php

namespace App\Models;

use \Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Lecturer extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    // protected $table = 'your_table';
    protected $fillable = [
        'code',
        'name',
        'email',
        'phone',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public function theses()
    {
        return $this->hasMany(Theses::class);
    }

    /**
     * hàm lấy ký tự đầu tiền của từng từ trong chuỗi (Dương Tuấn -> DT)
     * @return string
     */
    public function getFormatNameAttribute()
    {
        $str = '';
        foreach (explode(' ', $this->name) as $word) {
            $str .= mb_strtoupper($word[0],'UTF-8');
        }
        return $str;
    }
}

