<?php

namespace App\GraphQL\Queries;
use App\Models\Order;
use Closure;
use Auth;
class OrderQuery
{
   public function buyerorders()
   {
       return Auth::guard('api')->user()->orders;

   }

   


}
