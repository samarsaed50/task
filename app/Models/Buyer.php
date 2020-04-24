<?php

namespace App\Models;

use App\Models\Order;
use App\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Buyer extends Authenticatable
{
    use HasApiTokens;
    
    protected $table="buyers";

   protected $fillable = [
        'name','auth_token','remember_token','email','password'
    ];


    public function orders(){

        return $this->hasMany(Order::class,'buyer_id');
    }


}
