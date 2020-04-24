<?php

namespace App\GraphQL\Mutations;
use App\Models\Buyer;
use Closure;
use Illuminate\Support\Arr;

class AuthMutator{
  
    public function login($root,array $args)
    {
        $credentials=Arr::only($args,['email','password']);
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            return $token;
            } 

           return 'invalid data';

    }
 


 }