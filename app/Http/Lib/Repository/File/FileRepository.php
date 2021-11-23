<?php

namespace App\Http\Lib\Repository\File;

use App\Http\Lib\Interfaces\File\FileInterface;
use Illuminate\Support\Facades\Storage;

class FileRepository implements FileInterface
{

    public function createFile($username, $fileName)
    {
        $path = $username."/".$fileName;
        if (Storage::exists($path)) {
            $response = [
                'status'=>false,
                'message'=>'file exists !',
                'data'=>[]
            ];
            return response($response,401);
        }else{
            Storage::put($path,'');
            $response = [
                'status'=>true,
                'message'=>'file created !',
                'data'=>[
                    'path'=>config('filesystems.disks.myProgram.root').$path
                ]
            ];
            return response($response,200);
        }
    }
}
