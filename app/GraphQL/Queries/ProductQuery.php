<?php

namespace App\GraphQL\Queries;
use App\Models\Product;
use Closure;

class ProductQuery
{
   public function all()
   {
       return Product::all();
   }


}
