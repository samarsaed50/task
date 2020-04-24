<?php

namespace App\Models;

use App\Models\Buyer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['buyer_id', 'product_id', 'quantity'];


    public function buyer()
    {
        return $this->belongsTo(Buyer::class,'buyer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }



}
