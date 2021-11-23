<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Lib\Interfaces\File\FileInterface;
use App\Http\Requests\api\CreateFileRequest;
use Illuminate\Http\Request;

class FileController extends Controller
{
    protected $file ;
    public function __construct(FileInterface $file)
    {
        $this->file = $file;
    }
    public function createFile(CreateFileRequest $request){
        return $this->file->createFile(auth()->user()->username,$request->file);
    }
}
