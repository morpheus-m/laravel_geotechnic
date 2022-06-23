<?php


namespace App\Traits;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait Uploder
{
    public function uploadFile($path,$filename,UploadedFile $uploadedFile)
    {
        Storage::disk('local')->putFileAs(
            $path.'/'.$filename,
            $uploadedFile,
            $filename
        );
    }
}
