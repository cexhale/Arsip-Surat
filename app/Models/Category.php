<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    public function archives()
    {
        return $this->hasMany(Archive::class);
    }
}
