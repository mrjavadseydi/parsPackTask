<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Lib\Interfaces\Auth\LoginInterface;
use App\Http\Lib\Interfaces\Auth\LogOutInterface;
use App\Http\Lib\Interfaces\Auth\RegisterInterface;
use App\Http\Requests\api\LoginRequest;
use App\Http\Requests\api\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $login,$register,$logout;
    public function __construct(RegisterInterface $register,LoginInterface $login,LogOutInterface $logout)
    {
        $this->login=$login;
        $this->register=$register;
        $this->logout =$logout;
    }

    public function login(LoginRequest $request){
        return $this->login->login($request->username,$request->password);
    }

    public function register(RegisterRequest $request){
        return $this->register->Register($request->name,$request->username,$request->password);
    }

    public function logout(){
        return $this->logout->logout();
    }


}
