<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Lib\Interfaces\File\FileInterface;
use App\Http\Lib\Interfaces\File\FileListInterface;
use App\Http\Requests\api\CreateFileRequest;
use Illuminate\Http\Request;

class FileController extends Controller
{
    protected $file ,$fileList;

    public function __construct(FileInterface $file,FileListInterface $fileList)
    {
        $this->file = $file;
        $this->fileList = $fileList;
    }
    public function createFile(CreateFileRequest $request){
        return $this->file->createFile(auth()->user()->username,$request->file);
    }
    public function fileList(){
        return $this->fileList->getFiles(auth()->user()->username);
    }
}
