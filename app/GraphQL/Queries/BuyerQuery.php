<?php

namespace App\GraphQL\Queries;
use App\Models\Buyer;
use Closure;

class BuyerQuery
{
   public function all()
   {
       return Buyer::all();
   }


}
