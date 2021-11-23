<?php

namespace App\Http\Lib\Repository\File;

use App\Http\Lib\Interfaces\File\DirectoryInterface;
use Illuminate\Support\Facades\Storage;

class DirectoryRepository implements DirectoryInterface
{

    public function createFolder($username, $sub = null)
    {
        $sub ?  $path = $username."/".$sub : $path = $username;
        if (Storage::exists($path)) {
            $response = [
                'status'=>false,
                'message'=>'directory exists !',
                'data'=>[]
            ];
            return response($response,401);
        }else{
            Storage::makeDirectory($path);
            $response = [
                'status'=>true,
                'message'=>'directory created !',
                'data'=>[
                    'path'=>config('filesystems.disks.myProgram.root').$path
                ]
            ];
            return response($response,200);
        }


    }
}
