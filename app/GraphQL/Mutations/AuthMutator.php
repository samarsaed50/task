<?php

namespace App\GraphQL\Mutations;
use App\Models\Buyer;
use Closure;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class AuthMutator{
  
    public function login($root,array $args)
    {
        $credentials=Arr::only($args,['email','password']);
        if (auth()->attempt($credentials)) {
            $token = Str::random(60);
            $user = auth()->user();
            $user->api_token=$token ;
            $user->save();
            return $token;
            } 

           return 'invalid data';

    }
 


 }