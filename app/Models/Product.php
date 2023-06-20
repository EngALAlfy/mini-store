<?php
/*******************************************************************************
 * Copyright (c) Alalfy 2023.
 * This project made with Love by Islam Alalfy
 * https://alalfy.com
 * islam@alalfy.com
 * alalfydev@gmail.com
 ******************************************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'image',
        'color',
        'category_id',
        'sub_category_id',
        'price',
    ];

    public function getImageAttribute($image){
        return $image == null ? asset("assets/img/file-input-placeholder.png") : asset("/storage/photos") . "/" . $image ;
    }

    function category(){
        return $this->belongsTo(Category::class);
    }

    function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    function getPrice()
    {
        return $this->price > 0 ? __("all.price_with_currency" , ["price" => $this->price]) : "";
    }
}
