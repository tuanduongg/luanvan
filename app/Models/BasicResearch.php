<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SplFileInfo;

class BasicResearch extends Model
{
    use HasFactory;

    public function getExtensionFileAttribute() {
        return (new SplFileInfo($this->file))->getExtension();
    }
}
