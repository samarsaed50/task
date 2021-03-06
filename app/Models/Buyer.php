<?php

namespace App\Models;

use App\Models\Order;
use App\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
//use Laravel\Passport\HasApiTokens;

class Buyer extends Authenticatable
{
    
    protected $table="buyers";

   protected $fillable = [
        'name','auth_token','remember_token','email','password','api_token',
    ];


    public function orders(){

        return $this->hasMany(Order::class,'buyer_id');
    }


}
