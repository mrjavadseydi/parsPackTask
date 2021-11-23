<?php

namespace App\Http\Lib\classes;

use App\Http\Lib\Interfaces\File\ZipInterface;
use Illuminate\Support\Facades\Storage;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

class ZipDirectory implements ZipInterface
{

    public function zip($path,$name,$directory)
    {
        if(!Storage::exists($path)){
            return false;
        }
        $rootPath =Storage::path($path);
        $zip = new ZipArchive();
        $zip->open(Storage::path($directory).'/'.$name . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );
        foreach ($files as $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return true;
    }
}
