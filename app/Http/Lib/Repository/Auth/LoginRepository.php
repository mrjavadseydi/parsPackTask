<?php

namespace App\Http\Lib\Repository\Auth;

use App\Http\Lib\Interfaces\Auth\LoginInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginRepository implements LoginInterface
{

    public function Login($username, $password)
    {
        $user = User::where([['username',$username],['password',$password]])->first();
        if(!$user || !Hash::check($password,$user->password)){
            return response([
                'status'=>false,
                'message'=>'invalid email or password'
            ],401);
        }else{
            $token = $user->createToken('appToken')->plainTextToken;
            $response = [
                'status'=>true,
                'message'=>'Login successful!',
                'data' =>[
                    'user'=>$user,
                    'token'=>$token
                ]
            ];
            return response($response,201);
        }
    }
}
