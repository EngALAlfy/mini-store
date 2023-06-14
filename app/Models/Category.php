<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'image',
        'color',
    ];

    public function getImageAttribute($image){
        return $image == null ? asset("assets/img/file-input-placeholder.png") : asset("/storage/photos") . "/" . $image ;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
