<?php

namespace App\Http\Lib\Interfaces\Auth;

interface RegisterInterface
{
    public function Register($name,$username,$password);
}
