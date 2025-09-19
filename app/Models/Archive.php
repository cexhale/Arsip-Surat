<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = ['title','category_id','file_path','notes'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
