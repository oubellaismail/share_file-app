<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;
    
    public function tags(){

        return $this->belongsToMany(Tag::class);
    }
    
}
