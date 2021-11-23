<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Lib\Interfaces\File\DirectoryInterface;
use App\Http\Lib\Interfaces\File\DirectoryListInterface;
use App\Http\Requests\api\CreateDirectoryRequest;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    protected $directory,$directoryList;
    public function __construct(DirectoryInterface $directory,DirectoryListInterface $directoryList)
    {
        $this->directory = $directory;
        $this->directoryList = $directoryList;
    }
    public function createDirectory(CreateDirectoryRequest $request){
        return $this->directory->createFolder(auth()->user()->username,$request->path);
    }
    public function directoryList(){
        return $this->directoryList->getDirectory(auth()->user()->username);
    }
}
