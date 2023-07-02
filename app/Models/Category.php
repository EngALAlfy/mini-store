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

    protected $appends = [
        'imageName',
        'imageUrl',
    ];

    public function getImageUrlAttribute(){
        return $this->image == null ? asset("assets/img/file-input-placeholder.png") : asset("/storage/photos") . "/" . $this->image ;
    }

    public function getImageNameAttribute(){
        return $this->image;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
