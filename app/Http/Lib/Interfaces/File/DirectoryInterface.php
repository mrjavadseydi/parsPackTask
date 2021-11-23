<?php

namespace App\Http\Lib\Interfaces\File;

interface DirectoryInterface
{
    public function createFolder($username,$sub=null);
}
