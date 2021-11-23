<?php

namespace App\Http\Lib\Repository\File;

use App\Http\Lib\Interfaces\File\FileListInterface;
use Illuminate\Support\Facades\Storage;

class FileListRepository implements FileListInterface
{
    public function getFiles($directory)
    {
        if(Storage::exists($directory)){
            $files = Storage::allFiles($directory);
            $response = [
                'status'=>true,
                'message'=>'getting files in directory was successful',
                'data'=>$files

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
