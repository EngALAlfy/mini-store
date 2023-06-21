<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'client_name',
        'client_phone',
        'client_email',
        'client_address',
        'message',
    ];

    function product(){
        return $this->belongsTo(Product::class);
    }
}
