<?php

namespace App\Http\Lib\Repository\Auth;

use App\Http\Lib\Interfaces\Auth\LogOutInterface;

class LogOutRepository implements LogOutInterface
{
    public function logout(){
        auth()->user()->tokens()->delete();
        $response = [
            'status'=>true,
            'message'=>'Logout successfully',
        ];
        return response($response,201);
    }
}
