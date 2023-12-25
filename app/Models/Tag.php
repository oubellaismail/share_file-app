<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    public function files(){
        return $this->belongsToMany(File::class);
    }
}
