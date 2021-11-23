<?php

namespace App\Http\Lib\Interfaces\File;

interface ZipInterface
{
    public function zip($path,$name,$directory);
}
