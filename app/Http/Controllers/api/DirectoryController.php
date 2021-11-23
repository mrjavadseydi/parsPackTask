<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Lib\Interfaces\File\DirectoryInterface;
use App\Http\Requests\api\CreateDirectoryRequest;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    protected $directory;
    public function __construct(DirectoryInterface $directory)
    {
        $this->directory = $directory;
    }
    public function createDirectory(CreateDirectoryRequest $request){
        return $this->directory->createFolder(auth()->user()->username,$request->path);
    }
}
