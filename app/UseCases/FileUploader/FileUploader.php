<?php


namespace App\UseCases\FileUploader;


use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileUploader
{
    public function uploadImg($img)
    {
        $file = Storage::disk('public')->putFile('upload/Category', new File($img));
        return $file;
    }
}