<?php

namespace App\GraphQL\Queries;
use App\Models\Order;
use Closure;

class OrderQuery
{
   public function buyerorders()
   {
       return auth()->user()->orders;
   }

   


}
