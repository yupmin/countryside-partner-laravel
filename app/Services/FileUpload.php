<?php


namespace App\Services;
use Storage;

abstract class FileUpload
{

    abstract public function configurationPath(object $file);

    protected function upload(string $path, object $file){

        $filePath = $path ."/". time().$file->getClientOriginalName();
        Storage::disk('ncloud')->put($filePath, file_get_contents($file));
        return $filePath;
    }
}
