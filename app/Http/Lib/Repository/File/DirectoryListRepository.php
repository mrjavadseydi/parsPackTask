<?php

namespace App\Http\Lib\Repository\File;

use App\Http\Lib\Interfaces\File\DirectoryListInterface;
use Illuminate\Support\Facades\Storage;

class DirectoryListRepository implements DirectoryListInterface
{

    public function getDirectory($path)
    {
        if(Storage::exists($path)){
            $directories = Storage::allDirectories($path);
            $response = [
                'status'=>true,
                'message'=>'getting directory was successful',
                'data'=>$directories

            ];
            return response($response,200);
        }else{
            $response = [
                'status'=>false,
                'message'=>'there is no such directory',
                'data'=>[]
            ];
            return response($response,401);
        }
    }
}
