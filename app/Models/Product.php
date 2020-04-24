<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;

class Product extends Model
{
   
    protected $fillable = [
        'name',
    ];


    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }

     




}
