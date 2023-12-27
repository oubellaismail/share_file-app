<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'downloads_count', 'url', 'category_id', 'user_id'];

    public function scopeFilter($query, array $filters){
        if ($filters['category'] ?? false) {
            $category_id = "%" . request('category') . "%";
            $query->where('category_id', 'like', $category_id);
        }
    }    

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
    
}
