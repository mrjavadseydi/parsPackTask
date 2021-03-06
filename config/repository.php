<?php
return [
    \App\Http\Lib\Interfaces\Auth\LoginInterface::class => \App\Http\Lib\Repository\Auth\LoginRepository::class,
    \App\Http\Lib\Interfaces\Auth\RegisterInterface::class => \App\Http\Lib\Repository\Auth\RegisterRepository::class,
    \App\Http\Lib\Interfaces\Auth\LogOutInterface::class => \App\Http\Lib\Repository\Auth\LogOutRepository::class,
    \App\Http\Lib\Interfaces\System\ProcessesInterface::class=>\App\Http\Lib\Repository\System\ProcessesRepository::class,
    \App\Http\Lib\Interfaces\File\DirectoryInterface::class=>\App\Http\Lib\Repository\File\DirectoryRepository::class,
    \App\Http\Lib\Interfaces\File\DirectoryListInterface::class=>\App\Http\Lib\Repository\File\DirectoryListRepository::class,
    \App\Http\Lib\Interfaces\File\FileInterface::class=>\App\Http\Lib\Repository\File\FileRepository::class,
    \App\Http\Lib\Interfaces\File\FileListInterface::class=>\App\Http\Lib\Repository\File\FileListRepository::class,
];
