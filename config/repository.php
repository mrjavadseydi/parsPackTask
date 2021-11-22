<?php
return [
    \App\Http\Lib\Interfaces\Auth\LoginInterface::class => \App\Http\Lib\Repository\Auth\LoginRepository::class,
    \App\Http\Lib\Interfaces\Auth\RegisterInterface::class => \App\Http\Lib\Repository\Auth\RegisterRepository::class,
    \App\Http\Lib\Interfaces\Auth\LogOutInterface::class => \App\Http\Lib\Repository\Auth\LogOutRepository::class
];
