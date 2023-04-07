<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SplFileInfo;

class Dispatche extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'tittle',
        'content',
        'type_id',
        'receiver',
        'signer',
        'sign_date',
        'issued_date',
        'published_place',
        'effective_date',
        'expiration_date',
        'archivist',
        'storage_location',
        'role',//1 đến 2 đi
        'file',
    ];

    public function dispatch_type()
    {
        return $this->belongsTo(DispatchType::class);
    }

    public function getExtensionFileAttribute() {
        // return explode('.',$this->file)[1]
        return (new SplFileInfo($this->file))->getExtension();
    }
}
