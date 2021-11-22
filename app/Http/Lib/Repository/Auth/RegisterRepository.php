<?php

namespace App\Http\Lib\Repository\Auth;

use App\Http\Lib\Interfaces\Auth\RegisterInterface;
use App\Models\User;

class RegisterRepository implements RegisterInterface
{
    public function Register($name,$username,$password){
        $user = User::create([
            'name'=>$name,
            'username'=>$username,
            'password'=>bcrypt($password)
        ]);
        $token = $user->createToken("appToken")->plainTextToken;
        $response = [
            'status'=>true,
            'message'=>'registered successfully!',
            'data' =>[
                'user'=>$user,
                'token'=>$token
            ]
        ];
        return response($response,201);
    }

}
