<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie','img_src','description'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
